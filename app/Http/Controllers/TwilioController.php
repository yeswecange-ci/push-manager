<?php
namespace App\Http\Controllers;

use App\Models\MessageWhatsapp;
use App\Models\PushLog;
use App\Models\TwilioConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TwilioController extends Controller
{
    /**
     * Affiche la page de configuration Twilio
     */
    public function config()
    {
        $currentConfig = TwilioConfig::getActive();

        return view('twilio-config', [
            'config' => $currentConfig,
        ]);
    }

    /**
     * Enregistre la configuration Twilio
     */
    public function saveConfig(Request $request)
    {
        $request->validate([
            'account_sid' => 'required|string',
            'auth_token'  => 'required|string',
            'content_sid' => 'required|string',
            'from_number' => 'required|string',
        ]);

        try {
            // Créer ou mettre à jour la configuration
            $config = TwilioConfig::create([
                'account_sid' => $request->account_sid,
                'auth_token'  => $request->auth_token,
                'content_sid' => $request->content_sid,
                'from_number' => $request->from_number,
                'is_active'   => true,
            ]);

            // Désactiver les autres configurations
            $config->setAsActive();

            return redirect()->route('twilio.config')
                ->with('success', 'Configuration Twilio enregistrée avec succès!');

        } catch (\Exception $e) {
            Log::error('Erreur sauvegarde config Twilio: ' . $e->getMessage());

            return redirect()->route('twilio.config')
                ->with('error', 'Erreur lors de l\'enregistrement: ' . $e->getMessage());
        }
    }

    /**
     * Envoie un message WhatsApp à un contact spécifique via API
     */
    public function sendContact($id)
    {
        try {
            $message = MessageWhatsapp::findOrFail($id);
            $config  = TwilioConfig::getActive();

            if (! $config) {
                return response()->json([
                    'success' => false,
                    'title'   => 'Erreur de Configuration',
                    'message' => 'Configuration Twilio non trouvée. Veuillez configurer Twilio d\'abord.',
                    'type'    => 'error',
                ], 400);
            }

            Log::info('Envoi message à un contact', [
                'contact_id' => $id,
                'numero'     => $message->numero_telephone,
                'campagne'   => $message->nom_campagne,
            ]);

            $startTime = microtime(true);
            $result = $this->sendWhatsAppMessage($message->numero_telephone, $config);
            $responseTime = round(microtime(true) - $startTime, 3);

            // Créer un log du push avec les nouveaux champs
            $pushLog = PushLog::create([
                'message_sid'      => $result['message_sid'] ?? null,
                'numero_telephone' => $message->numero_telephone,
                'nom_campagne'     => $message->nom_campagne,
                'campaign_id'      => $message->id, // Nouveau champ
                'status'           => $result['success'] ? 'success' : 'failed',
                'error_message'    => $result['success'] ? null : $result['error'],
                'response_time'    => $result['success'] ? $responseTime : null, // Nouveau champ
                'message_content'  => $result['message_content'] ?? null, // Nouveau champ
                'sent_at'          => now(),
            ]);

            if ($result['success']) {
                // Mettre à jour le message avec l'ID Twilio et la date d'envoi
                $message->update([
                    'id_twilio'  => $result['message_sid'],
                    'date_envoi' => now(),
                ]);

                Log::info('Message WhatsApp envoyé avec succès', [
                    'contact_id'    => $id,
                    'message_sid'   => $result['message_sid'],
                    'push_log_id'   => $pushLog->id,
                    'response_time' => $responseTime,
                ]);

                return response()->json([
                    'success'     => true,
                    'title'       => 'Succès',
                    'message'     => 'Message WhatsApp envoyé avec succès!',
                    'message_sid' => $result['message_sid'],
                    'push_log_id' => $pushLog->id,
                    'response_time' => $responseTime,
                    'contact'     => [
                        'id'       => $message->id,
                        'numero'   => $message->numero_telephone,
                        'campagne' => $message->nom_campagne,
                    ],
                    'type'        => 'success',
                ]);
            } else {
                Log::error('Erreur envoi message contact', [
                    'contact_id'  => $id,
                    'error'       => $result['error'],
                    'push_log_id' => $pushLog->id,
                ]);

                return response()->json([
                    'success' => false,
                    'title'   => 'Erreur d\'Envoi',
                    'message' => 'Erreur lors de l\'envoi: ' . $result['error'],
                    'type'    => 'error',
                ], 500);
            }

        } catch (\Exception $e) {
            Log::error('Erreur envoi message contact: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'title'   => 'Erreur',
                'message' => 'Erreur: ' . $e->getMessage(),
                'type'    => 'error',
            ], 500);
        }
    }

    /**
     * Envoie des messages WhatsApp à tous les contacts d'une campagne via API
     */
    public function sendCampaign(Request $request)
    {
        $request->validate([
            'campagne' => 'required|string',
        ]);

        try {
            $config = TwilioConfig::getActive();

            if (! $config) {
                return response()->json([
                    'success' => false,
                    'title'   => 'Erreur de Configuration',
                    'message' => 'Configuration Twilio non trouvée. Veuillez configurer Twilio d\'abord.',
                    'type'    => 'error',
                ], 400);
            }

            $contacts = MessageWhatsapp::where('nom_campagne', $request->campagne)->get();

            if ($contacts->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'title'   => 'Aucun Contact',
                    'message' => 'Aucun contact trouvé pour cette campagne.',
                    'type'    => 'warning',
                ], 400);
            }

            Log::info('Début envoi campagne', [
                'campagne'        => $request->campagne,
                'nombre_contacts' => $contacts->count(),
            ]);

            $successCount = 0;
            $errorCount   = 0;
            $errors       = [];
            $results      = [];
            $totalResponseTime = 0;

            foreach ($contacts as $index => $contact) {
                Log::info('Envoi au contact', [
                    'index'  => $index + 1,
                    'total'  => $contacts->count(),
                    'numero' => $contact->numero_telephone,
                ]);

                $startTime = microtime(true);
                $result = $this->sendWhatsAppMessage($contact->numero_telephone, $config);
                $responseTime = round(microtime(true) - $startTime, 3);

                // Créer un log du push pour chaque contact avec les nouveaux champs
                $pushLog = PushLog::create([
                    'message_sid'      => $result['message_sid'] ?? null,
                    'numero_telephone' => $contact->numero_telephone,
                    'nom_campagne'     => $contact->nom_campagne,
                    'campaign_id'      => $contact->id, // Nouveau champ
                    'status'           => $result['success'] ? 'success' : 'failed',
                    'error_message'    => $result['success'] ? null : $result['error'],
                    'response_time'    => $result['success'] ? $responseTime : null, // Nouveau champ
                    'message_content'  => $result['message_content'] ?? null, // Nouveau champ
                    'sent_at'          => now(),
                ]);

                if ($result['success']) {
                    $contact->update([
                        'id_twilio'  => $result['message_sid'],
                        'date_envoi' => now(),
                    ]);
                    $successCount++;
                    $totalResponseTime += $responseTime;

                    $results[] = [
                        'contact_id'    => $contact->id,
                        'push_log_id'   => $pushLog->id,
                        'numero'        => $contact->numero_telephone,
                        'status'        => 'success',
                        'message_sid'   => $result['message_sid'],
                        'response_time' => $responseTime,
                    ];

                    Log::info('Contact traité avec succès', [
                        'numero'        => $contact->numero_telephone,
                        'message_sid'   => $result['message_sid'],
                        'push_log_id'   => $pushLog->id,
                        'response_time' => $responseTime,
                    ]);
                } else {
                    $errorCount++;
                    $errors[] = "{$contact->numero_telephone}: {$result['error']}";

                    $results[] = [
                        'contact_id'  => $contact->id,
                        'push_log_id' => $pushLog->id,
                        'numero'      => $contact->numero_telephone,
                        'status'      => 'error',
                        'error'       => $result['error'],
                    ];

                    Log::error('Erreur envoi contact', [
                        'numero'      => $contact->numero_telephone,
                        'error'       => $result['error'],
                        'push_log_id' => $pushLog->id,
                    ]);
                }

                // Délai de 0.5s entre chaque envoi pour éviter le rate limiting
                usleep(500000);
            }

            $avgResponseTime = $successCount > 0 ? round($totalResponseTime / $successCount, 3) : 0;
            $message = "Campagne terminée: {$successCount} messages envoyés, {$errorCount} erreurs.";

            Log::info('Campagne terminée', [
                'campagne'         => $request->campagne,
                'success'          => $successCount,
                'errors'           => $errorCount,
                'avg_response_time' => $avgResponseTime,
            ]);

            return response()->json([
                'success'    => true,
                'title'      => 'Campagne Terminée',
                'message'    => $message,
                'statistics' => [
                    'total'           => $contacts->count(),
                    'success'         => $successCount,
                    'errors'          => $errorCount,
                    'avg_response_time' => $avgResponseTime,
                ],
                'results'    => $results,
                'errors'     => $errors,
                'type'       => 'success',
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur envoi campagne: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'title'   => 'Erreur Campagne',
                'message' => 'Erreur lors de l\'envoi de la campagne: ' . $e->getMessage(),
                'type'    => 'error',
            ], 500);
        }
    }

    /**
     * Fonction privée pour envoyer un message WhatsApp via l'API Twilio
     */
    private function sendWhatsAppMessage($toNumber, $config)
    {
        try {
            // Nettoyer le numéro (supprimer les espaces)
            $cleanNumber = trim($toNumber);
            $cleanNumber = preg_replace('/\s+/', '', $cleanNumber);

            $url = "https://api.twilio.com/2010-04-01/Accounts/{$config->account_sid}/Messages.json";

            $payload = [
                'ContentSid' => $config->content_sid,
                'To'         => "whatsapp:{$cleanNumber}",
                'From'       => $config->from_number,
            ];

            Log::info('Twilio API Request Preparation', [
                'url'         => $url,
                'payload'     => $payload,
                'account_sid' => substr($config->account_sid, 0, 10) . '...',
                'content_sid' => $config->content_sid,
                'from_number' => $config->from_number,
                'to_number'   => $cleanNumber,
            ]);

            $response = Http::withOptions([
                'verify' => false,
            ])->withBasicAuth($config->account_sid, $config->auth_token)
                ->timeout(30)
                ->asForm()
                ->post($url, $payload);

            Log::info('Twilio API Response', [
                'status_code' => $response->status(),
                'body'        => $response->body(),
            ]);

            if ($response->successful()) {
                $data = $response->json();

                Log::info('Twilio API Success', [
                    'message_sid' => $data['sid'] ?? null,
                    'status'      => $data['status'] ?? null,
                ]);

                return [
                    'success'        => true,
                    'message_sid'    => $data['sid'] ?? null,
                    'message_content' => $this->extractMessageContent($data), // Nouveau
                ];
            } else {
                $errorData    = $response->json();
                $errorMessage = $errorData['message'] ?? 'Erreur API Twilio sans message';
                $errorCode    = $errorData['code'] ?? $response->status();

                Log::error('Twilio API Error', [
                    'status_code'   => $response->status(),
                    'error_code'    => $errorCode,
                    'error_message' => $errorMessage,
                    'full_response' => $response->body(),
                ]);

                return [
                    'success' => false,
                    'error'   => "{$errorMessage} (Code: {$errorCode})",
                ];
            }

        } catch (\Exception $e) {
            Log::error('Twilio API Exception', [
                'exception' => $e->getMessage(),
                'file'      => $e->getFile(),
                'line'      => $e->getLine(),
                'to_number' => $toNumber,
            ]);

            return [
                'success' => false,
                'error'   => 'Exception: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Extrait le contenu du message de la réponse Twilio
     */
    private function extractMessageContent($twilioData)
    {
        try {
            // Essayer d'extraire le contenu du message de différentes manières
            if (isset($twilioData['body'])) {
                return $twilioData['body'];
            }

            if (isset($twilioData['content'])) {
                return is_array($twilioData['content'])
                    ? json_encode($twilioData['content'])
                    : $twilioData['content'];
            }

            // Si on utilise ContentSid, on peut stocker l'ID du template
            if (isset($twilioData['content_sid'])) {
                return "Template: " . $twilioData['content_sid'];
            }

            return "Message envoyé via Twilio";

        } catch (\Exception $e) {
            Log::warning('Erreur extraction contenu message', [
                'error' => $e->getMessage(),
            ]);
            return "Contenu non disponible";
        }
    }
}
