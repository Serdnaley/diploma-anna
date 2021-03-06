@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="layout-title">

            <h1>Усі категорії</h1>

            <div class="layout-title__actions">
                @if(Gate::allows('create', 'App\TopicCategory'))
                    <a href="{{ route('category.create') }}">
                        Створити категорію
                    </a>
                @endif
            </div>
        </div>

        <hr>

        <div class="list">
            @foreach($categories as $category)
                @include('category.list-item', ['category' => $category])
            @endforeach
        </div>

        <hr>

        {{ $categories->links() }}

    </div>

@endsection
