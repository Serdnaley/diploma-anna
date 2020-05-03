@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="my-4">
            <a href="{{ route('chat.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to list
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <h1>Create chat</h1>
            </div>
        </div>

        <hr>

        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('chat.store') }}" method="post">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col">

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

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>User</label>
                                <div class="select-users-list">
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
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
