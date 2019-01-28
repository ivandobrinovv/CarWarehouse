@extends('layouts.layout')

@section('title', 'Images')

@section('menuItem', 'images')

@section('content')

<div class="container; ml-4">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="/images/create" class="btn btn-primary mt-2 mb-2">Add Image</a>
                    </div>

                    <div class="panel-body">


                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Image</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->imageDescription }}</td>
                                    <td><img style="width: 800px; height: 400px" src="<?php echo asset('storage/sample-images/' . $value->fileName);?>" alt="image" /></td>
                                        <td>
                                            <form action="/images/{{$value->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection