@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="my-4">
            <a href="{{ route('chat.show', ['chat' => $chat]) }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to chat
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <h1>Edit message</h1>
            </div>
        </div>

        <hr>

        <form action="{{ route('message.update', ['message' => $message]) }}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" name="chat_id" value="{{ $chat->id }}">

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <textarea
                            name="text"
                            class="form-control"
                            placeholder="Write your message here..."
                            cols="10"
                            rows="5"
                            required
                        >{{ $message->text }}</textarea>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check"></i>
                        Save
                    </button>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 pl-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>

    </div>

@endsection
