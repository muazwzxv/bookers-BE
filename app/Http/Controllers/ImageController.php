<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Image;
use App\Http\Resources\ImageResource;
use Images;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    function index()
    {
        $data = Image::latest()->paginate(5);
        return response(['images' => $data]);
    }

    function store(Request $req)
    {
        $validate = $req->validate([
            'file' => ['required', 'mimes:png,jpg', 'max:2048']
        ]);

        $fileName = $req->file('file')->getClientOriginalName();
        $path = $req->file('file')->store('public/files');

        $image = new Image();
        $image->name = $fileName;
        $image->path = $path;

        $image->save();

        return response(['message' => 'Data inserted successfully', 'image' => $image], 200);
    }

    public function show($id)
    {
        $image = Image::findOrFail($id);
        $path = public_path() . '/../storage/app/' . $image->path;

        return response()->file($path);
    }

    public function update(Request $req, $id)
    {
        $validate = $req->validate([
            'file' => ['required', 'mimes:png,jpg', 'max:2048']
        ]);

        $data = Image::findOrFail($id);
        $filePath = $data->path;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        } else {
            return response(['message' => 'something went wrong'], 404);
        }

        $fileName = $req->file('file')->getClientOriginalName();
        $newPath = $req->file('file')->store('public/files');

        $data->update([
            'name' => $fileName,
            'path' => $newPath
        ]);

        return response(['image' => new ImageResource($data), 'message' => 'Update successfully'], 200);
    }

    public function destroy($id)
    {
        $data = Image::findOrFail($id);
        $path = $data->path;
        if (Storage::exists($path)) {
            Storage::delete($path);
        } else {
            return response(['message' => 'something wrong happened'], 400);
        }
        return response(['message' => 'Deleted'], 200);
    }
}
