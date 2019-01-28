<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }

    public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'imageDescription' => 'required|min:3|max:128'
        ]);
        $path = $request->file('customImage')->store('public/sample-images');

        $image = new Image([
            'fileName' =>basename($path),
            'imageDescription' => $request->get('imageDescription')
        ]);
        $image->save();

        return redirect('/images');
    }

    public function destroy($id)
    {
        $image = Image::find($id);
        Storage::delete('public/sample-images' . $image->fileName);
        $image->delete();

        return redirect('images')->with('delete', 'Image was deleted!');
    }
}
