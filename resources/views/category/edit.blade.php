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
                <h1>Edit category</h1>
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
                        Are you sure want to delete "{{ $category->title }}"?
                    </confirm-action>
                @endcan
                <a href="{{ route('category.show', ['category' => $category]) }}" class="btn btn-primary">
                    View category
                </a>
            </div>
        </div>

        <hr>

        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('category.update', ['category' => $category]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="category-create-name">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="category-create-name"
                            name="name"
                            value="{{ $category->name }}"
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
