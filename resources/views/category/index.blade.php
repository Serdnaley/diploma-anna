@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row align-items-center mt-5">
            <div class="col">
                <h1>All categories</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('category.create') }}" class="btn btn-link">
                    Create category
                </a>
            </div>
        </div>

        <hr>

        @foreach($categories as $category)

            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{ route('category.show', ['category' => $category]) }}">
                                <h5 class="card-title">
                                    {{ $category->name }}
                                </h5>
                            </a>
                        </div>
                        <div>
                            @if(Gate::allows('update', $category))
                                <a href="{{ route('category.edit', ['category' => $category]) }}" class="btn btn-link">
                                    Edit category
                                </a>
                            @endif
                            <a href="{{ route('category.show', ['category' => $category]) }}" class="btn btn-primary">
                                View category
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        <hr>

        {{ $categories->links() }}

    </div>

@endsection
