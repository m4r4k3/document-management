@extends('layouts.master')
@section('title')
    Utilisateurs
@endsection

@section('css')
    {{ asset('css/panelutlisateur.css') }}
@endsection
@section('section')
    <div class="container">
        <x-panelnav></x-panelnav>
        <div class="sub-container">
            <div class="title-sub">Gérer Votre Documents</div>
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
                        <td>ID order</td>
                        <td>Numero client</td>
                        <td>Nom complet</td>
                        <td>ajouter Par</td>
                        <td>type document</td>
                        <td>taille (mb)</td>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td><a href="/storage/{{$item->path}}">{{$item->image_id}}</td>
                            <td><a href="/storage/{{$item->path}}">{{$item->order_id}}</td>
                            <td><a href="/storage/{{$item->path}}">{{$item->client_id}}</td>
                            <td><a href="/storage/{{$item->path}}">{{$item->prenom }} {{$item->nom}}</td>
                            <td><a href="/storage/{{$item->path}}">{{$item->creator->prenom }} {{$item->creator->nom}}</td>
                            <td><a href="/storage/{{$item->path}}">{{$item->type}}</td>
                            <td><a href="/storage/{{$item->path}}"{{number_format($item->size *0.0000001192,2)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

