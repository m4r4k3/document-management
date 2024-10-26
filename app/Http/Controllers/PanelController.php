<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Response;

class PanelController extends Controller
{
   public function index() {
      $data = Client::with("creater")->limit(2)->get();
      return view("panelIndex" , compact(["data"])) ;
   }
   public function utilisateurs(){
      return view("panelUtilisateurs") ;
   }
   public function documents(){
      return view ("panelDocument") ;
   }
   public function ajouterUtilisateurs(){
      return view("ajouterUtilisateurs") ;
   }
   public function historique(){
      return view("panelHistorique") ;
   }
}
