<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ImportColoniasTierraBlanca extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:colonias-tierra-blanca';
    protected $description = 'Importa colonias de Tierra Blanca desde la API de Copomex';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $token = config('copomex.token');
        if (!$token) {
            $this->error('Token de API no configurado. Por favor, verifica tu archivo .env.');
            return;
        }
        $url = "https://api.copomex.com/query/get_colonia_por_municipio/Tierra%20Blanca?token=$token";

        $response = Http::get($url);
        $this->info('Consultando API de colonias...');
        $this->info('URL: ' . $url);
        $this->info('Respuesta: ' . $response->body());
        $this->info('Código de estado: ' . $response->status());

        if ($response->successful() && !$response['error']) {
            $colonias = $response['response']['colonia'];

            foreach ($colonias as $nombre) {
                DB::table('colonias')->updateOrInsert(
                    ['nombre' => $nombre],
                    ['municipio' => 'Tierra Blanca', 'estado' => 'Veracruz', 'created_at' => now(), 'updated_at' => now()]
                );
            }

            $this->info('Colonias importadas correctamente.');
        } else {
            $this->error('Error al consultar la API: ' . $response['error_message']);
        }
    }
}
