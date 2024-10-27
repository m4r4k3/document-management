<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Response;

class PanelController extends Controller
{
   public function index() {
      $data = Client::with(relations: "creater")->limit(2)->get();
      return view("panelIndex" , compact(["data"])) ;
   }
   public function clients(){
      $data = Client::with(relations: "creater")->withCount("order")->get();
      return view("clientsPanel" , compact("data")) ;
   }
   public function utilisateurs(){
      $data = User::all() ;
      return view("panelUtilisateurs" , compact("data")) ;
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
