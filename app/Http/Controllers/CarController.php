<?php

namespace App\Http\Controllers;

use App\Brand;
use App\BrandModel;
use App\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();

        $brands = Brand::all();

        $brandModels = BrandModel::all();

        return view('cars.index', compact(['cars', 'brands', 'brandModels']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $brandModels = BrandModel::all();
        return view('cars.create', ['brands' => $brands, 'brandModels' => $brandModels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'mileage' => 'required|min:1|max:7',
            'year_of_production' => 'required|min:3|max:4',
            'brand_id' => 'required',
            'brand_model_id' => 'required'
        ]);

        Car::create($attributes);

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return redirect()->action(
            'CarController@edit', ['car' => $car]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();

        $brandModels = BrandModel::all();

        return view('cars.edit', compact(['car', 'brands', 'brandModels']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $attributes = $request->validate([
            'mileage' => 'required|min:1|max:7',
            'year_of_production' => 'required|min:3|max:4',
            'brand_id' => 'required',
            'brand_model_id' => 'required'
        ]);

        $car->update($attributes);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect('/cars');
    }
}
