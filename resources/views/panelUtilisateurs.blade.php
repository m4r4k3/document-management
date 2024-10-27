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
            <div class="title-sub">Gérer Votre Utilisateurs</div>
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
                        <td>user</td>
                        <td>nom</td>
                        <td>prenom</td>
                        <td>role</td>
                         <td>cin</td>
                         <td>ajouter</td>
                         <td>Modifier</td>
                         <td>Supprimer</td>
                         <td>Actions</td>
                   </thead>
                    <tbody>
                       @foreach($data as $item)  
                        <td>{{$item->user}}</td>
                        <td>{{$item->nom}}</td>
                        <td>{{$item->prenom}}</td>
                        <td>{{$item->stringRole}}</td>
                        <td>{{$item->cin}}</td>
                        <td>{{$item->created}}</td>
                        <td>{{$item->modified}}</td>
                        <td>{{$item->deleted}}</td>
                        <td>{{$item->actions}}</td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
