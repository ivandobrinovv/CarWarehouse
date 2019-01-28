@extends('layouts.layout')

@section('title', 'Create image')

@section('menuItem', 'images')

@section('content')
    <div class="ml-4 mt-3 col-md-10">
        <form method="post" action="{{url('images')}}" enctype="multipart/form-data">
            <div class="form-group row">
                {{csrf_field()}}
                <label  class="col-sm-2 col-form-label col-form-label-lg">Image Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"
                           placeholder="imageDescription" name="imageDescription">
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label col-form-label-lg" for="customImage">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control form-control-lg" id="customImage"
                           placeholder="customImage" name="customImage">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                </div>
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection