<?php

namespace App\Http\Controllers;

use Auth ;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function show(){
        return view('sign-in');
    }
    public function auth(Request $request){
        $values = ["user"=>$request->post()["user"] ,"password"=>$request->post()["password"] ];
        if(Auth::attempt($values)){
            $request->session()->regenerate() ; 
            return \Redirect::to("/",301) ;
        }else{
            return to_route("auth_show")->withErrors(["authError"=>"Utilisateur ou mot de passe invalid"]);
        }
        ;
    }
    public function createUser(Request $request){
        dd("test") ;
        $form = $request->validate(
            [
                "nom"=>"required|string|max:20",
                "prenom"=>"required|string|max:20",
                "cin"=>"required|string|max:20|unique:client",
                "role"=>"required|integer",
                "user"=>"required|string|min:5|max:20",
                "password"=>"required|string|min:5|max:20|confirmed",
         ]
         );
         User::create($form) ;
    }
    public function logout(Request $request){
        Auth::logout();
        \Session::flush();
        return to_route("auth_show") ;
    }
}
