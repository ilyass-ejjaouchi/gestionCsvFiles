<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Avis;
use App\Commerce;

class SupprimerAvis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SupprimerAvis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commande pour supprimer les avis ayant un etat regles est une date > 3 jours';

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
      $date = Carbon::now()->addDays(-3);
      $avis = Avis::whereNotNull('date_regulation')->where('date_regulation','<',$date)->get();
      foreach ($avis as $var) {
         $var->delete();
      }
    }
}
