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
        <td><a href="/?sort=orderId&order={{$order == "asc" ?"desc":"asc"}}">order</a></td>
        <td><a href="/?sort=nClient&order={{$order == "asc" ?"desc":"asc"}}">Numero client</a></td>
        <td><a href="/?sort=nom&order={{$order == "asc" ?"desc":"asc"}}"> Nom</a></td>
        <td><a href="/?sort=prenom&order={{$order == "asc" ?"desc":"asc"}}"> Prenom</a></td>
        <td><a href="/order={{$order == "asc" ?"desc":"asc"}}"> Créer au</a></td>
        <td><a href="/?sort=cin&order={{$order == "asc" ?"desc":"asc"}}"> Numero cin</a></td>
    </thead>
    @foreach ($data as $item)
    <x-box 
    id="{{$item->id}}"
    prenom="{{$item->client->prenom}}"
    nom="{{$item->client->nom}}"
    numero_client="{{$item->client->id}}"
    created_at="{{$item->created_at}}" 
    numero_cin="{{$item->client->cin}}">
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