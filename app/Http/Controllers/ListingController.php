<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListingResource;
use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::all();
        return response(['listing' => ListingResource::collection($listings), 'message' => 'Retrieved successfully'], 200);
    }

    public function store(Request $req)
    {
        $validate =  $req->validate([
            'title' => ['required'],
            'delivery_type' => ['required'],
            'contact' => ['required'],
            'status' => ['required'],
            'price' => ['required']
        ]);
        $listing = Listing::create($validate);

        return response(['listing' => new ListingResource($listing), 'message' => 'Successfully created']);
    }

    public function show(Listing $listing)
    {
        return response(['listing' => new ListingResource($listing), 'message' => 'Retrieved successfully'], 200);
    }

    public function update(Request $req, Listing $listing)
    {
        $listing->update($req->all());

        return response(['listing' => new ListingResource($listing), 'message' => 'Edit successfully'], 200);
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return response(['message' => 'Deleted'], 200);
    }
}
