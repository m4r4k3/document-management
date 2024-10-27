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
    <form class="info" action="{{route("edit",$data->id)}}" method="POST" enctype="multipart/form-data">
        @method("put")
        @csrf
        <div class="info-title">
        <div> <span>Numero client </span>:<label>{{$data->client->id}}</label> </div>
        <div> <span>Nom complet</span>:<label>{{$data->client->nom}} {{$data->client->prenom}}</label> </div>
        <div> <span>Numero CIN </span>:<label>{{$data->client->cin}}</label> </div>
    </div>
    <div class="worker-info">
        <div><label> Crée au :</label> <span>  {{$data->created_at}} </span></div>
        <div><label> Modifier au :</label><span>   {{$data->updated_at}}</span></div>
        <div><label> Modifier par :</label> <span>  {{$data->modifier_par ?$data->modifier_par->nom:"Aucun"}} {{$data->modifier_par?$data->modifer_par->prenom:""}}</span></div>
        <div><label> Crée par :</label><span>    {{$data->creater->nom}} {{$data->creater->prenom}}</span></div>
    </div>
    <div class="documents">
        <div>
            <label>CIN :</label> 
            @if($data->cin)
            <div> 
                <a href= "/storage/{{$data->cin}}">Voir</a>
            </div> 
            @else
                <div>aucune</div>
            @endif
             <div class="modifier"><span>Modifer</span><input type="file" accept="application/pdf,application/vnd.ms-excel"  name="cin"/></div>
        </div>
        <div>
            <label>CG:</label>  
            @if($data->CG)
            <div>
                <a href= "/storage/{{$data->CG}}">Voir</a>
            </div> 
            @else
                <div>aucune</div>
            @endif
             <div class="modifier"><span>Modifer</span><input type="file" accept="application/pdf,application/vnd.ms-excel"  name="CG"/></div>
        </div>
        <div>
            <label>PC :</label>
            @if($data->PC)
            <div> 
                 <a href="/storage/{{$data->PC}}">Voir</a>
            </div>  
            @else
                <div>aucune</div>
            @endif
             <div class="modifier"><span>Modifer</span><input type="file" accept="application/pdf,application/vnd.ms-excel"  name="PC"/></div>
            </div>
         <div>
            <label>Attestation :</label>
            @if($data->attestation)
            <div>  
                <a href="/storage/{{$data->attestation}}" >Voir</a>
            </div>
            @else
                <div>aucune</div>
            @endif
            <div class="modifier"><span>Modifer</span><input type="file" accept="application/pdf,application/vnd.ms-excel"  name="attestation"/>  </div>
            </div>
            <div>
                <label>Contrat :</label>
                @if($data->contrat)
                <div>  
                    <a href="/storage/{{$data->contrat}}" >Voir</a>
                </div>
                @else
                <div>aucune</div>
                @endif
                <div class="modifier"><span>Modifer</span><input type="file" accept="application/pdf,application/vnd.ms-excel"  name="contrat"/>  </div>
            </div>
        </div>
        <button type="submit" class="submit">
            Modifer
        </button>
    </div>     
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