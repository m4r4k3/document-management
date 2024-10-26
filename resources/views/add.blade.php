@extends('layouts.master')
@section("title")
    ajouter
@endsection

@section("css")
{{ asset('css/add.css') }}
@endsection

@section("section")

<x-nav return={{false}}></x-nav>
  @error('authError')
          <div class="error"> {{$message}} </div>
        @enderror
<div class="box-container">
 <form action="{{route("add")}}" class="ajoute-form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-title">Ajouter un order</div>
    <div><label>Prenom :</label><input type="text" name="prenom"/></div>
    <div><label>Nom :</label><input type="text" name="nom"/></div>
    <div><label>Numero de cin :</label><input type="text" name="cin"/></div>
    <div><label>Permis de conduire :</label><input type="file" accept="application/pdf,application/vnd.ms-excel" class="file-input" name="PC" /></div>
    <div><label>Attestation :</label><input type="file"  accept="application/pdf,application/vnd.ms-excel" class="file-input" name="attestation" /></div>
    <div><label>CIN :</label><input type="file" name="docCin" accept="application/pdf,application/vnd.ms-excel" class="file-input"  /></div>
    <div><label>Carte Grise :</label><input type="file" name="CG"  accept="application/pdf,application/vnd.ms-excel" class="file-input" /></div>
    <div><label>Contrat :</label><input type="file" name="contrat" accept="application/pdf,application/vnd.ms-excel" class="file-input"  /></div>
    <button type="submit" class="ajoute-button">Ajouter</button>
 </form>
<div>
@endsection