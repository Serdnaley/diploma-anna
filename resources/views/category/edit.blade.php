@extends('layouts.form')

@section('content')

    <div class="container layout-sidebar">

        <div class="my-4">
            <a href="{{ route('category.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Повернутися до списку
            </a>
        </div>

        <div class="layout-title">

            <h1>Редагувати</h1>

            <div class="layout-title__actions">
                @can('delete', $category)
                    <confirm-action
                        @confirm="$refs['form-category-delete'].submit()"
                        title="Ви дійсно хочете видалити '{{ $category->title }}'?"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Видалити
                        </div>
                    </confirm-action>
                @endcan
                <a href="{{ route('category.show', ['category' => $category]) }}" class="btn btn-primary">
                    Перейти
                </a>
            </div>
        </div>

        <hr>

        <form
            action="{{ route('category.update', ['category' => $category]) }}"
            method="post"
            class="mt-4"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="category-create-name">Ім'я</label>
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

            <button
                type="submit"
                class="btn btn-primary"
            >
                Зберегти
            </button>
        </form>

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
