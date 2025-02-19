<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class NettoyageFichiersTemporaires implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Exécute le job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            // Récupérer tous les fichiers expirés
            $fichiersExpires = DB::table('temp_files')
                ->where('expires_at', '<', Carbon::now())
                ->get();

            $compteur = 0;
            foreach ($fichiersExpires as $fichier) {
                if (file_exists($fichier->path)) {
                    unlink($fichier->path);
                    $compteur++;
                }

                // Supprimer l'entrée de la base de données
                DB::table('temp_files')->where('id', $fichier->id)->delete();
            }

            Log::info("Nettoyage des fichiers temporaires : {$compteur} fichiers supprimés");
        } catch (\Exception $e) {
            Log::error('Erreur lors du nettoyage des fichiers temporaires : ' . $e->getMessage());
        }
    }
}
