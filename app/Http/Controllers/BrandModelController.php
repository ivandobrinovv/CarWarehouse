<?php

namespace App\Http\Controllers;

use App\BrandModel;
use App\Brand;
use Illuminate\Http\Request;

class BrandModelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function create($brand)
    {
        return view('brandModels.create', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $brand)
    {
        $request->validate([
            'name' => 'required|min:2|max:20'
        ]);

        BrandModel::create([
           'name' => $request[('name')],
           'brand_id' => $brand
        ]);

        return redirect('/brands');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandModel $brandModel)
    {
        return view('brandModels.edit', compact('brandModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandModel $brandModel)
    {
        $request->validate([
            'name' => 'required|min:2|max:20',
        ]);

        $brandModel->update(request(['name']));

        return redirect("/brands");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrandModel  $brandModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandModel $brandModel)
    {
        $brandModel->delete();

        return redirect("/brands");
    }
}
