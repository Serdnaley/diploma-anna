<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Chat::class, 'chat');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $chats = Chat::with(['author'])
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('chat.index', [
            'chats' => $chats,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $users = User::where('id', '!=', \Auth::user()->id)->get();

        return view('chat.create', [
            'users' => $users,
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
            'user_ids' => 'required|array',
            'user_ids.*' => 'required|int',
        ]);

        $request['author_id'] = \Auth::id();

        $chat = Chat::create($request->only([
            'title',
            'author_id',
            'user_ids',
        ]));

        return redirect()
            ->route('chat.show', ['chat' => $chat])
            ->withSuccess(['Chat successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Chat $chat)
    {
        $chat->load(['author']);
        $messages = Message::with(['author'])->where('chat_id', $chat->id)->get();

        return view('chat.show', [
            'chat' => $chat,
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Chat $chat)
    {

        $users = User::where('id', '!=', \Auth::user()->id)->get();

        return view('chat.edit', [
            'chat' => $chat,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Chat $chat
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Chat $chat)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'user_ids' => 'required|int',
        ]);

        $chat->update($request->only([
            'title',
            'user_ids',
        ]));

        return redirect()
            ->route('chat.show', ['chat' => $chat])
            ->withSuccess(['Chat successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Chat $chat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();

        return redirect()
            ->route('chat.index')
            ->withSuccess(['Chat successfully deleted!']);
    }
}
