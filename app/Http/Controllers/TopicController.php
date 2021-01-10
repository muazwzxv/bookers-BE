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
        return response(['Topic' => new TopicResource($topic), 'Message' => 'Retrieved Successfully'], 200);
    }

    public function store(Request $req)
    {
        $validate = $req->validate([
            'name' => ['required'],
            'category_id' => ['required']
        ]);

        $topic = Topic::create($validate);
        return response(['Topic' => new TopicResource($topic), 'Message' => 'Created successfully'], 200);
    }

    public function show(Topic $topic)
    {
        return response(['Topic' => new TopicResource($topic), 'Message' => 'Retrieved Successfully'], 200);
    }

    public function update(Request $req, Topic $topic)
    {
        $topic->update($req->all());

        return response(['Topic' => new TopicResource($topic), 'Message' => 'Deleted'], 200);
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return response(['message' => 'Deleted'], 200);
    }
}
