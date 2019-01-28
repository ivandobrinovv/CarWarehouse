@extends('layouts.layout')

@section('title', 'Details')

@section('menuItem', 'brands')

@section('content')
    <div class="card-body">
        <h5 class="card-title">{{$brand->name}}</h5>
        <p class="card-text">Year of creation: {{$brand->year_of_creation}}</p>
    </div>

    <div class="ml-3">
        <a href="/brands/{{$brand->id}}/brandModels">Create a model</a>

        @if($brand->brandModels->count())
            <div class="list-group col-md-2 ml-2 mt-2">
            @foreach($brand->brandModels as $brandModel)
                <a href="/brandModels/{{$brandModel->id}}/edit" class="list-group-item">{{$brandModel->name}}</a>
            @endforeach
            </div>
        @endif
    </div>
@endsection