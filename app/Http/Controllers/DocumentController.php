<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Historique;
use App\Models\Order;
use App\Models\Image;
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

        $q = $request->filled("q") ? $request->input("q") : "";
        $order = $request->filled("order") ? $request->input("order") : "desc";

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
            default:
                $sort = "order.created_at";
        }

        $date = $request->input("date");
        $data = Order::with([
            "client"
        ])
            ->where(
                "order.id",
                "LIKE",
                "%$q%"
            )
            ->orWhereHas("client", function ($query) use ($q) {
                $query->where("cin", "LIKE", "%$q%")
                    ->orWhere("nom", "LIKE", "%$q%")
                    ->orWhere("prenom", "LIKE", "%$q%");
            })
            ->when($date, function ($query) use ($date) {
                $query->whereDate("order.created_at", "=", $date);
            })->orderBy($sort, $order)
            ->get();

        return view("index", compact(["data", "order", "q", "date"]));
    }
    public function editShow(Order $order)
    {
        $data = $order->load(["client", "creater", "modifier_par" , "cinDoc" , "attestationDoc" ,"cgDoc", "pcDoc", "contratDoc"]);
        return view("edit", compact(["data"]));
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
        unset($form["cin"]) ;

        foreach ($request->files as $key => $file) {
            $form[$key] = Image::create([
                "path"  =>$request->file($key)->store($key,"public"),
                "size"  =>$request->file($key)->getSize() ,
                "type"  =>$key ,
            ])->id ;
        }

        $form["client_id"] = $id;

        $order = Order::create($form);

        foreach ($form as $key => $value) {
            Historique::create([
                "order" => $order->id,
                "by" => Auth::id(),
                "from" => "",
                "to" => $value,
                "case" => $key,
                "action" => 1
            ]);
        }

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

        foreach ($form->post() as $item) {
            print ($item);
        }
        $form["PC"] = $request->has("PC") ? $request->file("PC")->store("pc", "public") : null;
        $form["cin"] = $request->has("cin") ? $request->file("cin")->store("cin", "public") : null;
        $form["CG"] = $request->has("CG") ? $request->file("CG")->store("cg", "public") : null;
        $form["attestation"] = $request->has("attestation") ? $request->file("attestation")->store("attestation", "public") : null;
        $form["contrat"] = $request->has("contrat") ? $request->file("contrat")->store("contrat", "public") : null;

        $form = collect($form)->filter(function ($elm) {
            return $elm != null;
        });

        $form["modifier_par"] = User::find(Auth::id())->id;

        $order->update($form->toArray());
        return to_route("editShow", $order->id);
    }
    public function showDoc(String $type, String $id)
    {
        
        $path = storage_path("app/public/" . $type . "/" . $id);
        $file = File::get($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", File::mimeType($path));

        return $response;
    }
}
