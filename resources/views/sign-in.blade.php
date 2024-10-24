@extends("layouts.master")
@section("css")
{{ asset('css/sign-in.css') }}
@endsection
@section("title")
Authentification
@endsection
@section("section")
<div class="container">
    <form action="{{route("authentifier")}}" method="POST">
        <div class="form-title">Authentification</div>
        <div><label>Utilisateur :</label><input  name="user" type="text" /></div>
        <div><label>Mot de passe :</label><input name="password"  type="password" /></div>
        @csrf
        @method("POST")
        <button>Authentifier</button>
    </form>
    @error('authError')
          <div class="error"> {{$message}} </div>
        @enderror
</div>
    @endsection