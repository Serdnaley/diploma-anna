@extends('chat.index')

@section('chat')

    <div class="container">

        <div class="message-list mt-3">

            @if($messages->isEmpty())
                <p class="color-secondary my-5" style="margin-left: 55px;">Your message will be first :)</p>
            @endif

            @foreach($messages as $message)
                @include('message.list-item', ['message' => $message])
            @endforeach

        </div>

        <form action="{{ route('message.store') }}" method="POST" style="margin-left: 55px;">
            @csrf
            @method('POST')

            <input type="hidden" name="chat_id" value="{{ $current_chat->id }}">

            <div class="form-group">
                <textarea
                    name="text"
                    class="form-control"
                    placeholder="Message..."
                    cols="10"
                    rows="3"
                    required
                ></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Submit
                <i class="fas fa-arrow-up"></i>
            </button>

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

        <form
            method="POST"
            style="display:none"
            ref="form-message-delete"
        >
            @csrf
            @method('DELETE')
        </form>

        <form
            action="{{ route('chat.destroy', ['chat' => $current_chat]) }}"
            method="POST"
            style="display:none"
            ref="form-chat-delete"
        >
            @csrf
            @method('DELETE')
        </form>

    </div>

@endsection
