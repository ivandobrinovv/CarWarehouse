@extends('layouts.layout')

@section('title', 'Edit a brand')

@section('menuItem', 'brands')

@section('content')
    <form method="post" action="/brands/{{$brand->id}}">
        @csrf
        @method('PATCH')
        @if($errors->any())
            <div class="alert alert-danger col-md-4 ml-4 mt-3">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item-danger ml-1 mb-1" style="background: none">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-2 ml-2 mt-3">
            <div class="form-group">
                <label for="name">Name</label>

                <input type="text" class="form-control {{$errors->has('name') ? 'border-danger' : ''}}" name="name" placeholder="Name" value = "{{$brand->name}}" required>
            </div>

            <div class="form-group">
                <label for="year_of_creation">Year of creation</label>

                <input type="number" class="form-control {{$errors->has('year_of_creation') ? 'border-danger' : ''}}" name="year_of_creation" placeholder="Year of creation" value = "{{$brand->year_of_creation}}" required>
            </div>
            <button class="btn btn-primary" type="submit">Edit</button>
        </div>
    </form>
@endsection