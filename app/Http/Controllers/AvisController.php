<?php

namespace App\Http\Controllers;
use App\Avis;
use App\Commerce;
use Illuminate\Http\Request;
Use Redirect;

class AvisController extends Controller
{
  public function index(){
    $Avis = Avis::all();
    return view('indexAvis',['Avis' => $Avis]);
    }

   public function show($uid_avis){
      $Avis = Avis::find($uid_avis);
      return view('showAvis',['Avis' => $Avis]);
      }

   public function regler($uid_avis){
     $date = date("Y-m-d h:i:s");
     $Avis = Avis::find($uid_avis);
     $Avis->etat = "réglé";
     $Avis->date_regulation = $date;
     $Avis->save();
     return Redirect::back();
   }
}
