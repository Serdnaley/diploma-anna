@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="my-4">
            <a href="{{ route('user.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to list
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <h1>Edit user</h1>
            </div>
            <div class="col-auto">
                @can('delete', $user)
                    <confirm-action
                        @confirm="$refs['form-user-delete'].submit()"
                        title="Are you sure want to delete '{{ $user->title }}'?"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Delete user
                        </div>
                    </confirm-action>
                @endcan
                <a href="{{ route('user.show', ['user' => $user]) }}" class="btn btn-primary">
                    View user
                </a>
            </div>
        </div>

        <hr>

        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('user.update', ['user' => $user]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="user-create-name">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="user-create-name"
                            name="name"
                            value="{{ $user->name }}"
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
                </form>
            </div>
        </div>

        <form
            action="{{ route('user.destroy', ['user' => $user]) }}"
            method="POST"
            class="d-none"
            ref="form-user-delete"
        >
            @csrf
            @method('DELETE')
        </form>

    </div>

@endsection
