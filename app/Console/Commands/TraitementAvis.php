<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Commerce;
use App\Avis;
use Illuminate\Database\Eloquent\Model;

class TraitementAvis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TraitementAvis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'commande pour traiter les avis d\'un commercial ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $this->info('traitement en cours.............');
      $Files = Storage::disk('sftp')->allFiles('/pub/avis/erreurs');
      $avis_array = array();
        foreach ($Files as $file) { // get the last file in each part
          $ref_part = substr($file,47,9);
          $avis_array[$ref_part] = $file;
        }

        foreach ($avis_array as $file) {
            $data = Storage::disk('sftp')->get($file);
            $lines = explode("\n", $data);
            array_pop($lines);
              $step = false;
                foreach ($lines as $line)
                {
                  if (!$step) {
                    $step = true;
                  }
                  else {
                          $avisData = str_getcsv($line, ";");
                            //inserer un avis
                          $ref_part = $avisData[7];
                          // pour avoir une format Y-m-d  au lieu de Y/m/d
                          $date_experience = date("Y-m-d", strtotime(str_replace('/', '-', $avisData[2])));
                          $date_avis = date("Y-m-d", strtotime(str_replace('/', '-', $avisData[3])));
                          $commerce = Commerce::find($ref_part);
                          if ($avisData[9]=='') {
                            $avisData[9] = NULL;
                          }
                          $avis = Avis::updateOrCreate(
                          ['uid_avis' => $avisData[6]],
                          ['nom' => $avisData[1],
                            'date_experience' => $date_experience,
                            'date_avis' => $date_avis ,
                            'note' => $avisData[4],
                            'avis' => $avisData[5],
                            'prenom' => $avisData[0],
                            'commerce_ref_part' => $avisData[7],
                            'uid_reponse' => $avisData[8],
                            'date_reponse' => $avisData[9],
                            'reponse' => $avisData[10],
                            'etat' => "erreur"]);
                            //laison entre avis est commerce
                            $commerce->avis()->save($avis);
                            $avis->commerce()->associate($commerce)->save();
                  }
                }
              }
    }
}
