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
                       <td>ID Order</td>
                       <td>Order</td>
                       <td>action</td>
                       <td>Acteur</td>
                      <td>from</td>
                       <td>to</td>
                       <td>case</td>
                    </thead>
                    <tbody>
                        @foreach($data as $item) 
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->order}}</td>
                                <td>{{$item->actionName->action}}</td>
                                <td>{{$item->byName->nom}} {{$item->byName->prenom}}</td>
                                <td>{{$item->from}}</td>
                                <td>{{$item->to}}</td>
                                <td>{{$item->case}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
