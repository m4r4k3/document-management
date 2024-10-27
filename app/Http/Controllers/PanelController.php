<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Response;

class PanelController extends Controller
{
   public function index()
   {
      $data = Client::with(relations: "creater")->limit(2)->get();
      return view("panelIndex", compact(["data"]));
   }
   public function clients()
   {

      $data = Client::select(
         'client.*',
         DB::raw('
             COUNT(cin_image.path) + COUNT(attestation_image.path) + COUNT(CG_image.path) + COUNT(PC_image.path) + COUNT(contrat_image.path) as numDocs,
             COALESCE(SUM(cin_image.size), 0) + COALESCE(SUM(attestation_image.size), 0) + COALESCE(SUM(CG_image.size), 0) + COALESCE(SUM(PC_image.size), 0) + COALESCE(SUM(contrat_image.size), 0) as size
         ')
     )
     ->leftJoin('order', 'order.client_id', '=', 'client.id')
     ->leftJoin('image as cin_image', 'order.cin', '=', 'cin_image.id')
     ->leftJoin('image as attestation_image', 'order.attestation', '=', 'attestation_image.id')
     ->leftJoin('image as CG_image', 'order.CG', '=', 'CG_image.id')
     ->leftJoin('image as PC_image', 'order.PC', '=', 'PC_image.id')
     ->leftJoin('image as contrat_image', 'order.contrat', '=', 'contrat_image.id')
     ->groupBy('client.id') 
     ->with('creater') 
     ->withCount('order')
     ->get();
         
      return view("clientsPanel", compact("data"));
   }
   public function utilisateurs()
   {
      $data = User::select("*" ,"role.role as stringRole")->join("role" ,"role.id" , "=" , "user.role")->
      withCount([
         "actions as actions",
         "actions as created" => function ($query) {
            $query->where("action", "=", 1);
         }
         ,
         "actions as modified" => function ($query) {
            $query->where("action", "=", 2);
         },
         "actions as deleted" => function ($query) {
            $query->where("action", "=", 3);
         }
      ])->get();
      
      return view("panelUtilisateurs", compact("data"));
   }
   public function documents()
   {

      return view("panelDocument");
   }
   public function ajouterUtilisateurs()
   {
      return view("ajouterUtilisateurs");
   }
   public function historique()
   {
      $data = Historique::all() ;
      return view("panelHistorique" , compact("data"));
   }
}
