<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Commerce;
use App\Etat;
use App\Avis;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CommerceController extends Controller
{

    public function index(Request $request){
      $critere = $request->select;
      $CommercesPub=Commerce::where('etat','=','regle')->count();
      $CommercesDouteux=Commerce::where('etat','<>','regle')->count();
      $Commerces = Commerce::has('etat');
        if ($critere == "Reglés") {
              $Commerces->where('etat','=','regle');
        }
        elseif ($critere == "Douteux") {
            $Commerces->where('etat','<>','regle');
        }
            $Commerces = $Commerces->paginate(100);
            return view('indexCommerce',['Commerces' => $Commerces,
                              'CommercesPub' => $CommercesPub,
                              'CommercesDouteux' => $CommercesDouteux]);
      }

    public function show($ref_part){
          $commerce = Commerce::find($ref_part);
          $etat = Etat::where('commerce_ref_part', '=', $ref_part)
          ->orderBy('created_at', 'DESC')->take(10)->get();
          $avis = Avis::where('commerce_ref_part', '=', $ref_part)->get();
           return view('ShowCommerce',['commerce'=>$commerce,'etat'=>$etat,'avis'=>$avis]);
        }

    public function showAll($ref_part){
              $commerce = Commerce::find($ref_part);
              $etat = Etat::where('commerce_ref_part', '=', $ref_part)
              ->orderBy('created_at', 'DESC')->paginate(10);
               return view('allHistory',['etat'=>$etat]);
            }

    public function find(Request $request){
        $ref_part = $request->FindCommerce;
        $commerce = Commerce::find($ref_part);
            if ($commerce) {
              $avis = Avis::where('commerce_ref_part', '=', $ref_part)->get();
              $etat = Etat::where('commerce_ref_part', '=', $ref_part)->orderBy('created_at', 'DESC')->get();
              return view('ShowCommerce',['commerce'=>$commerce,'etat'=>$etat, 'avis'=>$avis]);
            }
            else {
              return view('NoCommerce');
            }
          }
        }
