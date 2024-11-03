<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\Order;
use App\Models\Image;
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
             COUNT(image.path) as numDocs,
             COALESCE(SUM(image.size), 0) as size
         ')
     )
     ->leftJoin('order', 'order.client_id', '=', 'client.id')
     ->leftJoin('imageOrder', 'order.id', '=', 'imageOrder.order_id')
     ->leftJoin('image', 'imageOrder.image_id', '=', 'image.id')
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
      $data = Image::with("creator")->
      leftJoin('imageOrder', 'imageOrder.image_id', '=', 'image.id')
      ->leftJoin('order', 'order.id', '=', 'imageOrder.order_id')
      ->leftJoin('client', 'order.client_id', '=', 'client.id')
      ->get() ;
      
      return view("panelDocument" , compact("data"));
   }
   public function ajouterUtilisateurs()
   {
      return view("ajouterUtilisateurs");
   }
   public function historique()
   {
      $data = Historique::with(["byName" , "actionName"])->get() ;
      return view("panelHistorique" , compact("data"));
   }
}
