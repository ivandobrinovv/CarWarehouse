@extends('layouts.layout')

@section('title', 'Details')

@section('menuItem', 'brands')

@section('content')
    <div class="card-body">
        <h5 class="card-title">{{$brand->name}}</h5>
        <p class="card-text">Year of creation: {{$brand->year_of_creation}}</p>
    </div>
@endsection