@extends('layouts.form')

@section('content')

    <div class="container layout-sidebar">

        <div class="my-4">
            <a href="{{ route('chat.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to list
            </a>
        </div>

        <div class="layout-title">
            <h1>Create chat</h1>
        </div>

        <hr>

        <form action="{{ route('chat.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="mr-3">
                <div class="form-group">
                    <label for="chat-create-title">Title</label>
                    <input
                        type="text"
                        class="form-control"
                        id="chat-create-title"
                        name="title"
                        required
                    >
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

                <div class="form-group">
                    <label>User</label>
                    <div class="select-users-list">
                        <div class="wrapper">
                            @foreach($users as $user)
                                <label class="d-flex">
                                    <input
                                        type="checkbox"
                                        name="user_ids[]"
                                        value="{{ $user->id }}"
                                    >
                                    @include('user.list-item', ['user' => $user, 'disable_link' => true])
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </form>

    </div>

@endsection
