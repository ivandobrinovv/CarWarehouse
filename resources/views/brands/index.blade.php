@extends('layouts.layout')

@section('title', 'Brands')

@section('menuItem', 'brands')

@section('content')
    <div class="mt-3 ml-2">
<a class="col-md-4" href="/brands/create">Create</a>
@if($brands->count())
<div class="row ml-4">
@foreach($brands as $brand)
                <div class="col-lg-2 mt-4 ml-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/brands/{{$brand->id}}"> {{$brand->name}} </a></h5>
                            <p class="card-text">Year of creation: {{$brand->year_of_creation}}</p>
                            <div class="row">
                            <a class="btn btn-primary ml-3" href="/brands/{{$brand->id}}/edit">Edit</a>
                            <form method="post" action="brands/{{$brand->id}}">
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
        There are no car brands, but you can create a new one.
    </div>
    </div>
@endif

@endsection