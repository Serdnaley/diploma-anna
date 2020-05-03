<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Message::class, 'message');
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
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
            'chat_id' => 'required|int',
        ]);

        $request['author_id'] = \Auth::id();

        $message = Message::create($request->only([
            'text',
            'author_id',
            'chat_id',
        ]));

        return redirect()
            ->route('chat.show', ['chat' => $message->chat_id])
            ->withSuccess(['Message successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function show(Message $message)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Message $message)
    {
        $message->loadMissing(['chat']);

        return view('message.edit', [
            'message' => $message,
            'chat' => $message->chat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Message $message
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Message $message)
    {
        $this->validate($request, [
            'text' => 'required|string|max:255',
            'chat_id' => 'required|int',
        ]);

        $request['author_id'] = \Auth::id();

        $message->update($request->only([
            'text',
            'author_id',
            'chat_id',
        ]));

        return redirect()
            ->route('chat.show', ['chat' => $message->chat_id])
            ->withSuccess(['Message successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Message $message
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()
            ->route('chat.show', ['chat' => $message->chat_id])
            ->withSuccess(['Message successfully deleted!']);
    }
}
