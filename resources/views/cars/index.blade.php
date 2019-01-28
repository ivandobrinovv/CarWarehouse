@extends('layouts.layout')

@section('title', 'Cars')

@section('menuItem', 'cars')

@section('content')
    <div class="mt-3 ml-2">
        <a class="col-md-4" href="/cars/create">Create</a>
        @if($cars->count())
            <div class="row ml-4">
                @foreach($cars as $car)
                    <div class="col-lg-2 mt-4 ml-2">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><a href="/cars/{{$car->id}}"> {{$brands->where('id', $car->brand_id)->first()->name}} </a></h3>
                                <h5 class="card-title">{{$brandModels->where('id', $car->brand_model_id)->first()->name}}</h5>
                                <p class="card-text">Year of production: {{$car->year_of_production}}</p>
                                <p class="card-text">Mileage: {{$car->mileage}}</p>
                                <div class="row">
                                    <a class="btn btn-primary ml-3" href="/cars/{{$car->id}}/edit">Edit</a>
                                    <form method="post" action="cars/{{$car->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger ml-2" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="col-md-4">
                There are no cars, but you can create a new one.
            </div>
    </div>
    @endif

@endsection