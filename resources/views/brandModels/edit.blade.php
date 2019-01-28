@extends('layouts.layout')

@section('title', 'Edit model')

@section('content')
    <form method="post" id="editBrandModel" action="/brandModels/{{$brandModel->id}}">
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

                <input type="text" class="form-control {{$errors->has('name') ? 'border-danger' : ''}}" name="name" placeholder="Name" value = "{{$brandModel->name}}" required>
            </div>

        </div>
    </form>
    <div class="row ml-4">

        <button class="btn btn-primary" type="submit" form="editBrandModel">Edit</button>
    <form method="post" action="/brandModels/{{$brandModel->id}}">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger ml-2" type="submit">Delete</button>
    </form>

    </div>
@endsection