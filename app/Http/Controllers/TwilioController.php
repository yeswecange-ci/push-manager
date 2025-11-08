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
     * Affiche la page de configuration Twilio avec toutes les chaînes
     */
    public function config()
    {
        $configs = TwilioConfig::getAllConfigs();
        $activeConfig = TwilioConfig::getActive();

        return view('twilio-config', [
            'configs' => $configs,
            'activeConfig' => $activeConfig,
        ]);
    }

    /**
     * Enregistre une nouvelle configuration Twilio
     */
    public function saveConfig(Request $request)
    {
        $request->validate([
            'channel_name' => 'required|string|max:255|unique:twilio_configs,channel_name',
            'account_sid' => 'required|string',
            'auth_token'  => 'required|string',
            'content_sid' => 'required|string',
            'from_number' => 'required|string',
        ]);

        try {
            $config = TwilioConfig::create([
                'channel_name' => $request->channel_name,
                'account_sid' => $request->account_sid,
                'auth_token'  => $request->auth_token,
                'content_sid' => $request->content_sid,
                'from_number' => $request->from_number,
                'is_active'   => false, // Par défaut non active
            ]);

            return redirect()->route('twilio.config')
                ->with('success', 'Configuration de la chaîne "' . $request->channel_name . '" ajoutée avec succès!');
        } catch (\Exception $e) {
            Log::error('Erreur sauvegarde config Twilio: ' . $e->getMessage());

            return redirect()->route('twilio.config')
                ->with('error', 'Erreur lors de l\'enregistrement: ' . $e->getMessage());
        }
    }

    /**
     * Active une configuration spécifique
     */
    public function activateConfig($id)
    {
        try {
            $config = TwilioConfig::findOrFail($id);
            $config->setAsActive();

            return redirect()->route('twilio.config')
                ->with('success', 'La chaîne "' . $config->channel_name . '" est maintenant active!');
        } catch (\Exception $e) {
            Log::error('Erreur activation config: ' . $e->getMessage());

            return redirect()->route('twilio.config')
                ->with('error', 'Erreur lors de l\'activation: ' . $e->getMessage());
        }
    }

    /**
     * Supprime une configuration
     */
    public function deleteConfig($id)
    {
        try {
            $config = TwilioConfig::findOrFail($id);

            if ($config->is_active) {
                return redirect()->route('twilio.config')
                    ->with('error', 'Impossible de supprimer la configuration active. Veuillez d\'abord activer une autre chaîne.');
            }

            $channelName = $config->channel_name;
            $config->delete();

            return redirect()->route('twilio.config')
                ->with('success', 'La chaîne "' . $channelName . '" a été supprimée avec succès!');
        } catch (\Exception $e) {
            Log::error('Erreur suppression config: ' . $e->getMessage());

            return redirect()->route('twilio.config')
                ->with('error', 'Erreur lors de la suppression: ' . $e->getMessage());
        }
    }

    /**
     * Met à jour une configuration existante
     */
    public function updateConfig(Request $request, $id)
    {
        try {
            $config = TwilioConfig::findOrFail($id);

            $request->validate([
                'channel_name' => 'required|string|max:255|unique:twilio_configs,channel_name,' . $id,
                'account_sid' => 'required|string',
                'auth_token'  => 'nullable|string',
                'content_sid' => 'required|string',
                'from_number' => 'required|string',
            ]);

            $updateData = [
                'channel_name' => $request->channel_name,
                'account_sid' => $request->account_sid,
                'content_sid' => $request->content_sid,
                'from_number' => $request->from_number,
            ];

            // Ne mettre à jour l'auth_token que s'il est fourni
            if ($request->filled('auth_token')) {
                $updateData['auth_token'] = $request->auth_token;
            }

            $config->update($updateData);

            return redirect()->route('twilio.config')
                ->with('success', 'La chaîne "' . $request->channel_name . '" a été mise à jour avec succès!');
        } catch (\Exception $e) {
            Log::error('Erreur mise à jour config: ' . $e->getMessage());

            return redirect()->route('twilio.config')
                ->with('error', 'Erreur lors de la mise à jour: ' . $e->getMessage());
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
                    'message' => 'Aucune chaîne WhatsApp active. Veuillez activer une chaîne dans la configuration.',
                    'type'    => 'error',
                ], 400);
            }

            Log::info('Envoi message à un contact', [
                'contact_id' => $id,
                'numero'     => $message->numero_telephone,
                'campagne'   => $message->nom_campagne,
                'channel'    => $config->channel_name,
            ]);

            $startTime = microtime(true);
            $result = $this->sendWhatsAppMessage($message->numero_telephone, $config);
            $responseTime = round(microtime(true) - $startTime, 3);

            $pushLog = PushLog::create([
                'message_sid'      => $result['message_sid'] ?? null,
                'numero_telephone' => $message->numero_telephone,
                'nom_campagne'     => $message->nom_campagne,
                'campaign_id'      => $message->id,
                'status'           => $result['success'] ? 'success' : 'failed',
                'error_message'    => $result['success'] ? null : $result['error'],
                'response_time'    => $result['success'] ? $responseTime : null,
                'message_content'  => $result['message_content'] ?? null,
                'sent_at'          => now(),
            ]);

            if ($result['success']) {
                $message->update([
                    'id_twilio'  => $result['message_sid'],
                    'date_envoi' => now(),
                ]);

                Log::info('Message WhatsApp envoyé avec succès', [
                    'contact_id'    => $id,
                    'message_sid'   => $result['message_sid'],
                    'push_log_id'   => $pushLog->id,
                    'response_time' => $responseTime,
                    'channel'       => $config->channel_name,
                ]);

                return response()->json([
                    'success'     => true,
                    'title'       => 'Succès',
                    'message'     => 'Message WhatsApp envoyé avec succès via ' . $config->channel_name . '!',
                    'message_sid' => $result['message_sid'],
                    'push_log_id' => $pushLog->id,
                    'response_time' => $responseTime,
                    'channel'     => $config->channel_name,
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
                    'channel'     => $config->channel_name,
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
     * Envoie des messages WhatsApp à des contacts sélectionnés via API
     * NOUVELLE VERSION avec options de sélection
     */
    public function sendCampaign(Request $request)
    {
        $request->validate([
            'campagne' => 'required|string',
            'send_mode' => 'required|in:all,limit,range,selected',
            'limit' => 'nullable|integer|min:1',
            'range_start' => 'nullable|integer|min:1',
            'range_end' => 'nullable|integer|min:1',
            'selected_ids' => 'nullable|array',
            'selected_ids.*' => 'integer|exists:message_whatsapps,id',
            'filter_status' => 'nullable|in:all,not_sent,sent,failed',
        ]);

        try {
            $config = TwilioConfig::getActive();

            if (! $config) {
                return response()->json([
                    'success' => false,
                    'title'   => 'Erreur de Configuration',
                    'message' => 'Aucune chaîne WhatsApp active. Veuillez activer une chaîne dans la configuration.',
                    'type'    => 'error',
                ], 400);
            }

            // Construire la requête de base
            $query = MessageWhatsapp::where('nom_campagne', $request->campagne);

            // Appliquer les filtres de statut
            if ($request->filter_status && $request->filter_status !== 'all') {
                switch ($request->filter_status) {
                    case 'not_sent':
                        $query->whereNull('date_envoi');
                        break;
                    case 'sent':
                        $query->whereNotNull('date_envoi')->whereNotNull('id_twilio');
                        break;
                    case 'failed':
                        $query->whereNotNull('date_envoi')->whereNull('id_twilio');
                        break;
                }
            }

            // Appliquer le mode de sélection
            switch ($request->send_mode) {
                case 'limit':
                    $contacts = $query->limit($request->limit ?? 200)->get();
                    break;

                case 'range':
                    $rangeStart = ($request->range_start ?? 1) - 1;
                    $rangeEnd = $request->range_end ?? 200;
                    $limit = $rangeEnd - $rangeStart;
                    $contacts = $query->skip($rangeStart)->take($limit)->get();
                    break;

                case 'selected':
                    if (empty($request->selected_ids)) {
                        return response()->json([
                            'success' => false,
                            'title'   => 'Aucun Contact',
                            'message' => 'Aucun contact sélectionné.',
                            'type'    => 'warning',
                        ], 400);
                    }
                    $contacts = $query->whereIn('id', $request->selected_ids)->get();
                    break;

                case 'all':
                default:
                    $contacts = $query->get();
                    break;
            }

            if ($contacts->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'title'   => 'Aucun Contact',
                    'message' => 'Aucun contact trouvé avec les critères sélectionnés.',
                    'type'    => 'warning',
                ], 400);
            }

            Log::info('Début envoi campagne', [
                'campagne'        => $request->campagne,
                'mode'            => $request->send_mode,
                'nombre_contacts' => $contacts->count(),
                'filter_status'   => $request->filter_status ?? 'all',
                'channel'         => $config->channel_name,
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

                $pushLog = PushLog::create([
                    'message_sid'      => $result['message_sid'] ?? null,
                    'numero_telephone' => $contact->numero_telephone,
                    'nom_campagne'     => $contact->nom_campagne,
                    'campaign_id'      => $contact->id,
                    'status'           => $result['success'] ? 'success' : 'failed',
                    'error_message'    => $result['success'] ? null : $result['error'],
                    'response_time'    => $result['success'] ? $responseTime : null,
                    'message_content'  => $result['message_content'] ?? null,
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

                // Délai de 0.5s entre chaque envoi
                usleep(500000);
            }

            $avgResponseTime = $successCount > 0 ? round($totalResponseTime / $successCount, 3) : 0;
            $message = "Campagne terminée: {$successCount} messages envoyés, {$errorCount} erreurs.";

            Log::info('Campagne terminée', [
                'campagne'          => $request->campagne,
                'mode'              => $request->send_mode,
                'success'           => $successCount,
                'errors'            => $errorCount,
                'avg_response_time' => $avgResponseTime,
                'channel'           => $config->channel_name,
            ]);

            return response()->json([
                'success'    => true,
                'title'      => 'Campagne Terminée',
                'message'    => $message,
                'statistics' => [
                    'total'             => $contacts->count(),
                    'success'           => $successCount,
                    'errors'            => $errorCount,
                    'avg_response_time' => $avgResponseTime,
                    'channel'           => $config->channel_name,
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
                'channel'     => $config->channel_name,
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
                'channel'     => $config->channel_name,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                Log::info('Twilio API Success', [
                    'message_sid' => $data['sid'] ?? null,
                    'status'      => $data['status'] ?? null,
                    'channel'     => $config->channel_name,
                ]);

                return [
                    'success'         => true,
                    'message_sid'     => $data['sid'] ?? null,
                    'message_content' => $this->extractMessageContent($data),
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
                    'channel'       => $config->channel_name,
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
                'channel'   => $config->channel_name ?? 'Unknown',
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
            if (isset($twilioData['body'])) {
                return $twilioData['body'];
            }

            if (isset($twilioData['content'])) {
                return is_array($twilioData['content'])
                    ? json_encode($twilioData['content'])
                    : $twilioData['content'];
            }

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
