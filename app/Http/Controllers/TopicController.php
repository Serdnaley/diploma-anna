<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Topic;
use App\TopicCategory;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Topic::class, 'topic');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $topics = Topic::with(['category', 'author'])
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('topic.index', [
            'topics' => $topics,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $topic_categories = TopicCategory::all();

        return view('topic.create', [
            'topic_categories' => $topic_categories,
        ]);
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
            'title' => 'required|string|max:255',
            'category_id' => 'required|int',
        ]);

        $request['author_id'] = \Auth::id();

        $topic = Topic::create($request->only([
            'title',
            'author_id',
            'category_id',
        ]));

        return redirect()
            ->route('topic.show', ['topic' => $topic])
            ->withSuccess(['Topic successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Topic $topic)
    {
        $topic->load(['author', 'category']);
        $comments = Comment::with(['author'])->where('topic_id', $topic->id)->get();

        $users = collect();

        foreach ($comments as $comment) {
            $users[] = $comment->author;
        };

        $users = $users->unique();

        return view('topic.show', [
            'topic' => $topic,
            'users' => $users,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Topic $topic)
    {

        $topic_categories = TopicCategory::all();

        return view('topic.edit', [
            'topic' => $topic,
            'topic_categories' => $topic_categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Topic $topic
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Topic $topic)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'category_id' => 'required|int',
        ]);

        $topic->update($request->only([
            'title',
            'category_id',
        ]));

        return redirect()
            ->route('topic.show', ['topic' => $topic])
            ->withSuccess(['Topic successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Topic $topic
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()
            ->route('topic.index')
            ->withSuccess(['Topic successfully deleted!']);
    }
}
