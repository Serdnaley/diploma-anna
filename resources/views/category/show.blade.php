@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="my-4">
            <a href="{{ route('category.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Повернутися до списку
            </a>
        </div>

        <div class="layout-title">

            <h1>Категорія: {{ $category->name }}</h1>

            <div class="layout-title__actions">
                @can('delete', $category)
                    <confirm-action
                        @confirm="$refs['form-category-delete'].submit()"
                        title="Ви дійсно хочете видалити '{{ $category->name }}'?"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Видалити категорію
                        </div>
                    </confirm-action>
                @endcan
                @can('update', $category)
                    <a
                        href="{{ route('category.edit', ['category' => $category]) }}"
                        class="btn btn-primary ml-3"
                    >
                        Редагувати категорію
                    </a>
                @endcan
            </div>

        </div>

        <hr>

        <div class="list">
            @foreach($topics as $topic)
                @include('topic.list-item', ['topic' => $topic])
            @endforeach
        </div>

        <hr>

        {{ $topics->links() }}

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
