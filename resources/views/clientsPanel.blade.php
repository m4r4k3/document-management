@extends('layouts.master')
@section('title')
   Clients 
@endsection

@section('css')
    {{ asset('css/panelutlisateur.css') }}
@endsection
@section('section')
    <div class="container">
        <x-panelnav></x-panelnav>
        <div class="sub-container">
            <div class="title-sub">Gérer Votre Clients</div>
            <form class="search">
                <div>
                    <input type="text" name="search" />
                    <button type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
            <div class="sub-sub-container">
                <table>
                        <thead>
                        <td>ID</td>
                        <td>Nom</td>
                        <td>Prenom</td>
                        <td>CIN</td>
                        <td>Creer par</td>
                        <td>Date d'ajout</td>
                        <td>Nombre de documents</td>
                        <td>Nombre d'ordres</td>
                        <td>Stockage reservé (mb)</td>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                             <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->nom}}</td>
                                <td>{{$item->prenom}}</td>
                                <td>{{$item->cin}}</td>
                                <td>{{$item->creater->nom}} {{$item->creater->prenom}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->numDocs}}</td>
                                <td>{{$item->order_count}}</td>
                                <td>{{number_format((float)($item->size*0.0000001192), 2, '.', '')}}</td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table></div>
        </div>
    </div>
@endsection
