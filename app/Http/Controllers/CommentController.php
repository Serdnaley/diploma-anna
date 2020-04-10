<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|string|max:255',
            'topic_id' => 'required|int',
        ]);

        $request['author_id'] = \Auth::id();

        $comment = Comment::create($request->only([
            'text',
            'author_id',
            'topic_id',
        ]));

        return redirect()
            ->route('topic.show', ['topic' => $comment->topic_id])
            ->withSuccess(['Comment successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $comment->loadMissing(['topic']);

        return view('comment.edit', [
            'comment' => $comment,
            'topic' => $comment->topic,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'text' => 'required|string|max:255',
            'topic_id' => 'required|int',
        ]);

        $request['author_id'] = \Auth::id();

        $comment->update($request->only([
            'text',
            'author_id',
            'topic_id',
        ]));

        return redirect()
            ->route('topic.show', ['topic' => $comment->topic_id])
            ->withSuccess(['Comment successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()
            ->route('topic.show', ['topic' => $comment->topic_id])
            ->withSuccess(['Comment successfully deleted!']);
    }
}
