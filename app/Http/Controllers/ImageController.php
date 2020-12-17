<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Image;
use App\Http\Resources\ImageResource;
use ImageHandler;

class ImageController extends Controller
{
    function index()
    {
        $data = Image::latest()->paginate(5);
        return response(['images' => $data]);
    }

    function store(Request $req)
    {
        $req->validate([
            'binary' => ['required', 'image']
        ]);

        $image = Image::make($req->binary);

        return response(['image' => $image, 'message' => 'Successful'], 200);
    }

    public function show(Image $img)
    {
        return response(['image' => new ImageResource($img), 'message' => 'Retrieved successfully'], 204);
    }

    public function update(Request $req, Image $img)
    {
        $img->update($req->all());

        return response(['image' => new ImageResource($img), 'message' => 'Update successfully'], 200);
    }

    public function destroy(Image $img)
    {
        $img->delete();

        return response(['message' => 'Deleted']);
    }
}
