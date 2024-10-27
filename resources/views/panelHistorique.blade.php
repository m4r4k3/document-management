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
            <div class="title-sub">Votre Historique</div>
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
                       <td> iD Order</td>
                       <td>  by</td>
                      <td>    from</td>
                       <td>    to</td>
                       <td>    case</td>
                        <td>   action</td>
                    </thead>
                    <tbody>
                        <tr>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                            <td>placeholder</td>
                        </tr>
                        <tr>
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
