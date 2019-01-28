@extends('layouts.layout')

@section('title', 'Edit a car')

@section('menuItem', 'cars')

@section('content')
    <form method="post" action="/cars/{{$car->id}}">
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

                @if($brands->count())
                    <label for="brand">Brand</label>
                    <select id="brand_select" name="brand_id" class="form-control">
                        @foreach($brands as $brand)
                            @if($car->brand_id == $brand->id)
                                <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                            @else
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endif
                        @endforeach
                    </select>
                @else
                    There are no brands, please create some!
                @endif
            </div>

            <div class="form-group">
                @if($brandModels->count())
                    <label for="brand_model">Brand model</label>
                    <select id="brand_model_select" name="brand_model_id" class="form-control">
                    </select>
                @else
                    There are no models, please create some!
                @endif
            </div>

            <div class="form-group">
                <label for="year_of_production">Year of production</label>

                <input type="number" class="form-control {{$errors->has('year_of_production') ? 'border-danger' : ''}}" name="year_of_production" placeholder="Year of production" value = "{{$car->year_of_production}}" required>
            </div>

            <div class="form-group">
                <label for="mileage">Mileage</label>

                <input type="number" class="form-control {{$errors->has('mileage') ? 'border-danger' : ''}}" name="mileage" placeholder="Mileage" value = "{{$car->mileage}}" required>
            </div>
            <button class="btn btn-primary" type="submit">Edit</button>
        </div>
    </form>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script>
    $(document).ready(function () {
        $('#brand_select').change(function () {
            let brand_id = $('#brand_select').val();

            $('#brand_model_select').empty();
            @foreach($brandModels as $brandModel)
            if('{{$brandModel->brand_id}}' == brand_id)
            {
                if('{{$brandModel->id}}' == '{{$car->brand_model_id}}')
                {
                    $('#brand_model_select').append("<option value='" + "{{$brandModel->id}}" + "'selected>" + "{{$brandModel->name}}" +  "</option>");
                }
                else {
                    $('#brand_model_select').append("<option value='" + "{{$brandModel->id}}" + "'>" + "{{$brandModel->name}}" +  "</option>");
                }
            }
            @endforeach
        });

        $('#brand_select').trigger('change');

    });

</script>