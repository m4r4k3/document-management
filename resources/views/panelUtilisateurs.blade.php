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
                         <td>Actions</td>
                         <td>Supprimer</td>
                         <td>Modifier</td>
                         <td>ajouter</td>
                   </thead>
                    <tbody>
                       @foreach($data as $item)  
                        <td>{{$item->user}}</td>
                        <td>{{$item->nom}}</td>
                        <td>{{$item->prenom}}</td>
                        <td>{{$item->role}}</td>
                        <td>{{$item->cin}}</td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
