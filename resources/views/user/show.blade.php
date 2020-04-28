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
                <h1>{{ $user->name }}</h1>
            </div>
            <div class="col-auto">
                @can('delete', $user)
                    <confirm-action
                        @confirm="$refs['form-user-delete'].submit()"
                        confirm-button-text="Delete"
                        confirm-button-class="btn btn-danger"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Delete user
                        </div>
                        Are you sure want to delete "{{ $user->name }}"?
                    </confirm-action>
                @endcan
                @can('update', $user)
                    <a href="{{ route('user.edit', ['user' => $user]) }}" class="btn btn-primary">
                        Edit user
                    </a>
                @endcan
            </div>
        </div>

        <hr>

        <div class="card-text d-flex align-items-center">
            <div class="d-flex">
                <div class="user-avatar user-avatar--{{ $user->color }}">
                    <div class="user-avatar__initials">
                        {{ $user->initials }}
                    </div>
                </div>
                <div class="user-avatar__name">
                    <div class="color-{{ $user->color }}">
                        {{ $user->name }}
                    </div>
                    <small class="mt-1">at {{ $user->created_at->format('j F, Y') }}</small>
                </div>
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
