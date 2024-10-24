@extends('layouts.master')
@section("title")
    home
@endsection
@section("css")
{{ asset('css/index.css') }}
@endsection

@section("section")
<x-nav return={{true}}></x-nav>
<form class="year" >
<label>
selectioner par date : 
</label>
<input type="hidden" name="q" class="hiddenQ"/>
<input 
    type="date"
    class="yearInput"
    name="date"
    max="2100"
/>
</form>
<table class="box-container">
    <thead class="header">
        <td>Id order</td>
        <td>Numero client</td>
        <td>Nom complet</td>
        <td>Créer au</td>
        <td>Numero cin</td>
    </thead>
    @foreach ($data as $item)
    <x-box 
    id="{{$item->id_order}}"
    nom_complet="{{$item->nom_client}}"
    numero_client="{{$item->client}}"
    created_at="{{$item->date_order}}" 
    numero_cin="{{$item->numero_cin}}">
</x-box>
    @endforeach
</table>
@endsection
<script>
    window.onload = ()=>{
        let url = new URL(window.location.href);

        document.querySelector(".hiddenQ").value=url.searchParams.get("q");
        document.querySelector(".q").value=url.searchParams.get("q");
        document.querySelector(".yearInput").value=url.searchParams.get("date") ? url.searchParams.get("date"):new Date().toLocaleDateString('en-CA');
        document.querySelector(".yearInput").addEventListener("input",(e)=>{
            document.querySelector(".hiddenYear").value = e.target.value 
        } )
        document.querySelector(".hiddenYear").value=url.searchParams.get("date");

    }
</script>