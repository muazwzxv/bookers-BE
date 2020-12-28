<?php

namespace App\Http\Controllers;

use App\Http\Resources\TopicResource;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    //
    public function index()
    {
        $topic = Topic::all();
        return response(['topic' => new TopicResource($topic), 'message' => 'Retrieved successfully'], 204);
    }

    public function store(Request $req)
    {
        $validate = $req->validate([
            'name' => ['required'],
        ]);

        $topic = Topic::create($validate);
        return response(['topic' => new TopicResource($topic), 'message' => 'Created successfully'], 200);
    }

    public function show(Topic $topic)
    {
        return response(['topic' => new TopicResource($topic), 'message' => 'Retrieved successfully'], 204);
    }

    public function update(Request $req, Topic $topic)
    {
        $topic->update($req->all());

        return response(['topic' => new TopicResource($topic), 'message' => 'Deleted'], 200);
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return response(['message' => 'Deleted'], 200);
    }
}
