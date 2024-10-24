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
    <form class="info" action="{{route("edit",$order->id)}}" method="POST" enctype="multipart/form-data">
        @method("put")
        @csrf
        <div class="info-title">
        <div> <span>Numero client </span>:<label>{{$client->id}}</label> </div>
        <div> <span>Nom complet</span>:<label>{{$client->nom_client}}</label> </div>
        <div> <span>Numero CIN </span>:<label>{{$client->numero_cin}}</label> </div>
    </div>
    <div class="worker-info">
        <div><label> Crée au :</label> <span>  {{$order->created_at}} </span></div>
        <div><label> Modifier au :</label><span>   {{$order->updated_at}}</span></div>
        <div><label> Modifier par :</label> <span>  {{$modifier_par}}</span></div>
        <div><label> Crée par :</label><span>   {{$creer_par}}</span></div>
    </div>
    <div class="documents">
        <div>
            <label>CIN :</label> 
            @if($order->cin)
            <div> 
                <a href= "/storage/{{$order->cin}}">Voir</a>
            </div> 
            @else
                <div>aucune</div>
            @endif
             <div class="modifier"><span>Modifer</span><input type="file" accept="application/pdf,application/vnd.ms-excel"  name="cin"/></div>
        </div>
        <div>
            <label>CG:</label>  
            @if($order->CG)
            <div>
                <a href= "/storage/{{$order->CG}}">Voir</a>
            </div> 
            @else
                <div>aucune</div>
            @endif
             <div class="modifier"><span>Modifer</span><input type="file" accept="application/pdf,application/vnd.ms-excel"  name="CG"/></div>
        </div>
        <div>
            <label>PC :</label>
            @if($order->PC)
            <div> 
                 <a href="/storage/{{$order->PC}}">Voir</a>
            </div>  
            @else
                <div>aucune</div>
            @endif
             <div class="modifier"><span>Modifer</span><input type="file" accept="application/pdf,application/vnd.ms-excel"  name="PC"/></div>
            </div>
         <div>
            <label>Attestation :</label>
            @if($order->attestation)
            <div>  
                <a href="/storage/{{$order->attestation}}" >Voir</a>
            </div>
            @else
                <div>aucune</div>
            @endif
            <div class="modifier"><span>Modifer</span><input type="file" accept="application/pdf,application/vnd.ms-excel"  name="attestation"/>  </div>
            </div>
            <div>
                <label>Contrat :</label>
                @if($order->contrat)
                <div>  
                    <a href="/storage/{{$order->contrat}}" >Voir</a>
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