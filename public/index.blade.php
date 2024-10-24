@extends('layouts.master')
@section("title")
    home
@endsection
@section("css")
{{ asset('css/index.css') }}
@endsection

@section("section")

<x-nav return={{true}}></x-nav>
<div class="box-container">
    @foreach ($data as $item)
    <x-box id="{{$item->id}}" nom_complet="{{$item->nom_client}}" numero_client="{{$item->n_client}}"></x-box>
    @endforeach
<div>
@endsection