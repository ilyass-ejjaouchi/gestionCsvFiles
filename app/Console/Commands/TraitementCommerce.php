<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Commerce;
use App\etat;
use Illuminate\Database\Eloquent\Model;

class TraitementCommerce extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TraitementCommerce';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'commande pour traiter les fichiers csv pub et douteux';

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
      $Files = Storage::disk('sftp')->allFiles('/pub/rapprochement/rapports_rapprochement');
      $date = date('Ymd');
          foreach ($Files as $file) {
          $filename = str_replace('pub/rapprochement/rapports_rapprochement/','',$file);
            if (preg_match("/^EG04_Pub\.+$date+[0-9]{6}+\.csv/", $filename)) { // le fichier Pub d'aujourd'hui
                $file_date = substr($filename,9,8);
                $data = Storage::disk('sftp')->get($file);
                $lines = explode("\n", $data);
                array_pop($lines);
                $step = false;
                foreach ($lines as $line) {
                  if (!$step) {
                    $step = true;
                  }
                  else {
                        $commerceData = str_getcsv($line, ";");
                        //inserer un commerce
                        $commerce = Commerce::updateOrCreate(
                      ['ref_part' => $commerceData[0]],
                      ['code_epj' => $commerceData[2],
                        'rs_epj' => utf8_encode($commerceData[3]),
                        'adresse_epj' => utf8_encode($commerceData[4]),
                        'denom_part' => utf8_encode($commerceData[12]),
                        'adresse_part' => utf8_encode($commerceData[13]) ,
                        'cp_part' => $commerceData[14],
                        'ville_part' => utf8_encode($commerceData[15]),
                        'etat' => "réglé"]);
                        //inserer un etat
                      $etat = new Etat;
                      $etat->statut_parution = "réglé";
                      $etat->raison_technique = "";
                      $etat->file_date= $file_date;
                      $commerce->etat()->save($etat);
                      $etat->commerce()->associate($commerce)->save();
                  }
                }
            }
          }
            foreach ($Files as $file) {
              $filename = str_replace('pub/rapprochement/rapports_rapprochement/','',$file);
              if (preg_match("/^EG04_douteux\.+$date+[0-9]{6}+\.csv/", $filename)) { // le fichier douteux d'aujourd'hui
                $file_date = substr($filename,13,8);
                $data = Storage::disk('sftp')->get($file);
                $lines = explode("\n", $data);
                array_pop($lines);
                $step = false;
                foreach ($lines as $line) {
                  if (!$step) {
                    $step = true;
                  }
                  else {
                        $avisData = str_getcsv($line, ";");
                        //inserer un commerce
                        $commerce = Commerce::updateOrCreate(
                          ['ref_part' => $avisData[8]],
                          ['code_epj' => $avisData[10],
                          'rs_epj' => utf8_encode($avisData[11]),
                          'adresse_epj' => utf8_encode($avisData[12]),
                          'denom_part' => utf8_encode($avisData[2]),
                          'adresse_part' => utf8_encode($avisData[3]),
                          'cp_part' => $avisData[4],
                          'ville_part' => utf8_encode($avisData[5]),
                          'etat' =>"n'est pas réglé"]
                      );
                          //inserer une etat
                          $etat = new Etat;
                          $etat->statut_parution = utf8_encode($avisData[19]);
                          $etat->raison_technique = utf8_encode($avisData[20]);
                          $etat->file_date = $file_date;
                          $commerce->etat()->save($etat);
                          $etat->commerce()->associate($commerce)->save();
                  }
                }
          }
            }
      }
    }
