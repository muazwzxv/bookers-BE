<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResources;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::all();
        return response(['Comment' => new CommentResources($comment)], 200);
    }

    public function indexWithReference()
    {
        $comments = DB::table('comments')
            ->join('topics', 'comments.topic_id', '=', 'topics.id')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'topics.name as topicName', 'users.name as publisherName')
            ->get();

        return response(['Comment' => new CommentResources($comments)], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validate = $req->validate([
            'descriptions' => ['required'],
            'user_id' => ['required'],
            'topic_id' => ['required']
        ]);

        $comment = Comment::create($validate);

        return response(['Comment' => new CommentResources($comment), 'Message' => 'Created Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return response(['Comment' => new CommentResources($comment), 'Message' => 'Created Successfully'], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
