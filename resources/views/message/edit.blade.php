@extends('layouts.form')

@section('content')

    <div class="container layout-sidebar">

        <div class="my-4">
            <a href="{{ route('chat.show', ['chat' => $chat]) }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Повернутися до діалогу
            </a>
        </div>

        <div class="layout-title">
            <div class="col">
                <h1>Редагувати повідомлення</h1>
            </div>
        </div>

        <hr>

        <form action="{{ route('message.update', ['message' => $message]) }}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" name="chat_id" value="{{ $chat->id }}">

            <div class="form-group">
                <textarea
                    name="text"
                    class="form-control"
                    placeholder="Текст вашого повідомлення"
                    cols="10"
                    rows="3"
                    required
                >{{ $message->text }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Зберегти
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

    </div>

@endsection
