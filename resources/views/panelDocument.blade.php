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
                        <td>Id</td>
                        <td>Id order</td>
                        <td>Numero client</td>
                        <td>Nom complet</td>
                        <td>ajouter Par</td>
                        <td>type document</td>
                        <td>taille</td>
                    </thead>
                    <tbody>
                        <tr>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

