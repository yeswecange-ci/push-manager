<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncWhatsappResponses extends Command
{
    /**
     * The name and signature of the console command.<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\TwilioConfig;
use App\Models\WhatsappResponse;
use App\Models\MessageWhatsapp;

class SyncWhatsappResponses extends Command
{
    protected $signature = 'whatsapp:sync-responses {--days=1 : Nombre de jours à synchroniser}';
    protected $description = 'Synchronise les réponses WhatsApp depuis l\'API Twilio';

    public function handle()
    {
        $this->info('🔄 Synchronisation des réponses WhatsApp...');

        $config = TwilioConfig::getActive();

        if (!$config) {
            $this->error('❌ Configuration Twilio non trouvée');
            return 1;
        }

        $days = $this->option('days');
        $dateStart = now()->subDays($days)->format('Y-m-d');
        $dateEnd = now()->format('Y-m-d');

        $this->info("📅 Période: du {$dateStart} au {$dateEnd}");

        $url = "https://api.twilio.com/2010-04-01/Accounts/{$config->account_sid}/Messages.json";

        try {
            $response = Http::withBasicAuth($config->account_sid, $config->auth_token)
                ->get($url, [
                    'DateSent>=' => $dateStart,
                    'DateSent<=' => $dateEnd,
                    'To' => $config->from_number,
                ]);

            if (!$response->successful()) {
                throw new \Exception('Erreur API: ' . $response->body());
            }

            $messages = $response->json()['messages'] ?? [];
            $syncCount = 0;

            $this->info("📨 " . count($messages) . " messages trouvés");

            $progressBar = $this->output->createProgressBar(count($messages));
            $progressBar->start();

            foreach ($messages as $msg) {
                if ($msg['direction'] !== 'inbound') {
                    $progressBar->advance();
                    continue;
                }

                $fromNumber = str_replace('whatsapp:', '', $msg['from']);
                $messageInitial = MessageWhatsapp::where('numero_telephone', $fromNumber)->first();

                WhatsappResponse::updateOrCreate(
                    ['message_sid' => $msg['sid']],
                    [
                        'from_number' => $fromNumber,
                        'to_number' => str_replace('whatsapp:', '', $msg['to']),
                        'body' => $msg['body'],
                        'media_url' => $msg['media_url'] ?? null,
                        'status' => 'received',
                        'nom_campagne' => $messageInitial?->nom_campagne,
                        'content_sid' => $messageInitial?->id_twilio,
                        'message_whatsapp_id' => $messageInitial?->id,
                        'received_at' => $msg['date_sent'],
                    ]
                );

                $syncCount++;
                $progressBar->advance();
            }

            $progressBar->finish();
            $this->newLine(2);
            $this->info("✅ {$syncCount} réponses synchronisées avec succès!");

            return 0;

        } catch (\Exception $e) {
            $this->error("❌ Erreur: {$e->getMessage()}");
            return 1;
        }
    }
}
     *
     * @var string
     */
    protected $signature = 'app:sync-whatsapp-responses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
