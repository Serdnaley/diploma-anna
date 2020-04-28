@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="my-4">
            <a href="{{ route('category.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Back to list
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <h1>Category: {{ $category->name }}</h1>
            </div>
            <div class="col-auto">
                @can('delete', $category)
                    <confirm-action
                        @confirm="$refs['form-category-delete'].submit()"
                        confirm-button-text="Delete"
                        confirm-button-class="btn btn-danger"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Delete category
                        </div>
                        Are you sure want to delete "{{ $category->name }}"?
                    </confirm-action>
                @endcan
                @can('update', $category)
                    <a href="{{ route('category.edit', ['category' => $category]) }}" class="btn btn-primary">
                        Edit category
                    </a>
                @endcan
            </div>
        </div>

        <hr>

        @foreach($topics as $topic)
            @include('topic.list-item', ['topic' => $topic])
        @endforeach

        <form
            action="{{ route('category.destroy', ['category' => $category]) }}"
            method="POST"
            class="d-none"
            ref="form-category-delete"
        >
            @csrf
            @method('DELETE')
        </form>

    </div>

@endsection
