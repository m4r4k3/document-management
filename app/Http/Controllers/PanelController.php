<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
   public function index() {
    return view("panelIndex") ;
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
