<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use File ;
use Response ;
use DB;

class DocumentController extends Controller
{
    public function show(Request $request)
    {
        $search = "%" . $request->input("q") . "%";
        $year = $request->input("date") ;
        
        $data = DB::table("order")
        ->join("client", "order.client", "=", "client.id")
        ->select("order.client", "order.id as id_order", "client.nom_client", "order.created_at as date_order", "client.numero_cin")
        ->where(function($query) use ($search) {
            $query->where("client.numero_cin", "LIKE", $search)
            ->orWhere("client.nom_client", "LIKE", $search)
            ->orWhere("order.id", "LIKE", $search);
        })
        ->where(function ($query) use ($year){
        if($year){
            $query->whereDate("order.created_at", "=",$year)   ;
        }
        })
        ->orderBy("order.created_at")
        ->get();
        return view("index", compact(["data"]));
    }
    public function editShow(Order $order)
    {
        return view("edit", ["order" => $order , "client"=>Client::find($order->client) , "creer_par"=>User::find($order->creer_par)->nom_complet, "modifier_par"=>$order->modifier_par !="aucun"?User::find($order->modifier_par)->nom_complet:"aucun"]);
    }
    public function addShow()
    {
        return view("add");
    }
    public function add(Request $request)
    {
        $form = $request->validate([
            "nom_client"=>"required",
            "numero_cin"=>"required",
            'PC' => 'file|mimes:pdf,xls|max:5048',
            'attestation' => 'file|mimes:pdf,xls|max:5048',
            'cin' => 'file|mimes:pdf,xls|max:5048',
            'CG' => 'file|mimes:pdf,xls|max:5048',
            'contrat' => 'file|mimes:pdf,xls|max:5048',
                ]);
        $client = Client::where("numero_cin", "=", $form["numero_cin"]);
        $form["creer_par"] = Auth::id();
        $form["PC"] = $request->has("PC") ? $request->file("PC")->store("pc", "public") : null;
        $form["attestation"] = $request->has("attestation") ? $request->file("attestation")->store("attestation", "public") : null;
        $form["cin"] = $request->has("cin") ? $request->file("cin")->store("cin", "public") : null;
        $form["CG"] = $request->has("CG") ? $request->file("CG")->store("cg", "public") : null;
        $form["contrat"] = $request->has("contrat") ? $request->file("contrat")->store("contrat", "public") : null;
        
        if (!$client->exists()) {
            $id = Client::create($form)->id;
        } else {
            $id = $client->get()[0]->id;
        }

        $form["client"] = $id;
        $order = Order::create($form);
        return to_route("home");
    }
    public function edit(Order $order, Request $request)
    {
        $form = $request->validate([
            'PC' => 'file|mimes:pdf,xls|max:5048',
            'attestation' => 'file|mimes:pdf,xls|max:5048',
            'cin' => 'file|mimes:pdf,xls|max:5048',
            'CG' => 'file|mimes:pdf,xls|max:5048',
            'contrat' => 'file|mimes:pdf,xls|max:5048',
        ]);

        $form["PC"] = $request->has("PC") ? $request->file("PC")->store("pc", "public") : null;
        $form["cin"] = $request->has("cin") ? $request->file("cin")->store("cin", "public") : null;
        $form["CG"] = $request->has("CG") ? $request->file("CG")->store("cg", "public") : null;
        $form["attestation"] = $request->has("attestation") ? $request->file("attestation")->store("attestation", "public") : null;
        $form["contrat"] = $request->has("contrat") ? $request->file("contrat")->store("contrat", "public") : null;
        $form =collect($form)->filter(function ($elm) {
            return $elm != null;
        });
        $form["modifier_par"] = User::find(Auth::id())->id;
        $order->update($form->toArray());
        return to_route("editShow", $order->id);
    }
    public function showDoc($type , $id){
        $path = storage_path("app/public/".$type."/".$id);
        $file = File::get($path);
        
        $response = Response::make($file, 200);
        $response->header("Content-Type",File::mimeType($path));
    
        return $response;
    }
}
