@extends('layouts.master')
@section("title")
    Modifier
@endsection

@section("css")
{{ asset('css/modifer.css') }}
@endsection

@section("section")

<x-nav return={{false}}></x-nav>

<div class="box-container">
    <form class="info" action="{{route("edit",$client->id)}}" method="POST" enctype="multipart/form-data">
        @method("put")
        @csrf
        <div class="info-title">
        <div> <span class="n_client">  {{$client->n_client}} </span></div>
        <div> <span>  {{$client->nom_client}} </span></div>
    </div>
    <div class="worker-info">
        <div><label>Crée au :</label> <span>  {{$client->created_at}} </span></div>
        <div><label>Modifier au :</label><span>   {{$client->updated_at}}</span></div>
        <div><label>Modifier par :</label> <span>  {{$modifier_par}}</span></div>
        <div><label>Crée par :</label><span>   {{$creer_par}}</span></div>
    </div>
    <div class="documents">
        <div>
            <label>CIN :</label> 
            @if($client->cin)
            <div> 
                <a href= "/storage/{{$client->cin}}">Voir</a>
            </div> 
            @else
                <div>aucune</div>
            @endif
             <div class="modifier"><span>Modifer</span><input type="file" name="cin"/storage/></div>
        </div>
        <div>
            <label>CG:</label>  
            @if($client->CG)
            <div>
                <a href= "/storage/{{$client->CG}}">Voir</a>
            </div> 
            @else
                <div>aucune</div>
            @endif
             <div class="modifier"><span>Modifer</span><input type="file" name="CG"/storage/></div>
        </div>
        <div>
            <label>PC :</label>
            @if($client->PC)
            <div> 
                 <a href="/storage/{{$client->PC}}">Voir</a>
            </div>  
            @else
                <div>aucune</div>
            @endif
             <div class="modifier"><span>Modifer</span><input type="file" name="PC"/storage/></div>
            </div>
        <div>
            <label>Contrat :</label>
            @if($client->contrat)
            <div>  
                <a href="/storage/{{$client->contrat}}" >Voir</a>
            </div>
            @else
                <div>aucune</div>
            @endif
            <div class="modifier"><span>Modifer</span><input type="file" name="contrat"/storage/>  </div>
            </div>
         </div>
        <button type="submit" class="submit">
            Modifer
        </button>
        </form>
</div>
<script>
    document.querySelectorAll(".modifier").forEach(elm=>
    elm.addEventListener( "click" ,(e)=>{
    e.target.parentElement.childNodes[0].style =" display:none";
    e.target.parentElement.childNodes[1].style =" display:block";
    document.querySelector(".submit").style ="display:block"
    })
)
</script>
@endsection