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
            <h1>Створити категорію</h1>
        </div>

        <hr>

        <form
            action="{{ route('category.store') }}"
            method="post"
        >
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="category-create-name">Ім'я</label>
                <input
                    type="text"
                    class="form-control"
                    id="category-create-name"
                    placeholder="Назва категорії"
                    name="name"
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
                Створити категорію
            </button>
        </form>

    </div>

@endsection
