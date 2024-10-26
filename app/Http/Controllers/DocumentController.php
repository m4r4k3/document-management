<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use File;
use Response;
use DB;

class DocumentController extends Controller
{
    public function show(Request $request)
    {
        $search = "%" . $request->input("q") . "%";
        $order = $request->filled("order") ?$request->input("order") :"desc";

        switch ($request->input("sort")) {
            case "orderId":
                $sort = "order.id";
                break;
            case "nClient":
                $sort = "client.id";
                break;
            case "nom":
                $sort = "client.nom";
                break;
            case "prenom":
                $sort = "client.prenom";
                break;
            case "cin":
                $sort = "client.cin";
                break;
            default :
                $sort  = "order.created_at" ;
        }
        $year = $request->input("date");

        $data = Order::with([
            "client"
        ]) ->join('client', 'order.client_id', '=', 'client.id')
            ->where(
                "order.id",
                "LIKE",
                $search
            )
            ->orWhereHas("client", function ($query) use ($search) {
                $query->where("cin", "LIKE", $search)
                    ->orWhere("nom", "LIKE", $search)
                    ->orWhere("prenom", "LIKE", $search);
            })
            ->when($year, function ($query) use ($year) {
                $query->whereDate("order.created_at", "=", $year);
            })->orderBy($sort , $order)
            ->get();

            return view("index", compact(["data" , "order"]));
    }
    public function editShow(Order $sort)
    {
        return view("edit", ["order" => $sort, "client" => Client::find($sort->client), "creer_par" => User::find($sort->creer_par)->nom_complet, "modifier_par" => $sort->modifier_par != "aucun" ? User::find($sort->modifier_par)->nom_complet : "aucun"]);
    }
    public function addShow()
    {
        return view("add");
    }
    public function add(Request $request)
    {
        $form = $request->validate([
            "prenom" => "required",
            "nom" => "required",
            "cin" => "required",
            'PC' => 'file|mimes:pdf,xls|max:5048',
            'attestation' => 'file|mimes:pdf,xls|max:5048',
            'docCin' => 'file|mimes:pdf,xls|max:5048',
            'CG' => 'file|mimes:pdf,xls|max:5048',
            'contrat' => 'file|mimes:pdf,xls|max:5048',
        ]);

        $client = Client::where("cin", "=", $form["cin"])->first();

        $form["creer_par"] = Auth::id();

        $id = !$client ? Client::create($form)->id
            : $client->id;

        $form["creer_par"] = Auth::id();
        $form["PC"] = $request->has("PC") ? $request->file("PC")->store("pc", "public") : null;
        $form["attestation"] = $request->has("attestation") ? $request->file("attestation")->store("attestation", "public") : null;
        $form["cin"] = $request->has("docCin") ? $request->file("docCin")->store("cin", "public") : null;
        $form["CG"] = $request->has("CG") ? $request->file("CG")->store("cg", "public") : null;
        $form["contrat"] = $request->has("contrat") ? $request->file("contrat")->store("contrat", "public") : null;
        $form["client_id"] = $id;

        $sort = Order::create($form);
        return to_route("home");
    }
    public function edit(Order $sort, Request $request)
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
        $form = collect($form)->filter(function ($elm) {
            return $elm != null;
        });
        $form["modifier_par"] = User::find(Auth::id())->id;
        $sort->update($form->toArray());
        return to_route("editShow", $sort->id);
    }
    public function showDoc($type, $id)
    {
        $path = storage_path("app/public/" . $type . "/" . $id);
        $file = File::get($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", File::mimeType($path));

        return $response;
    }
}
