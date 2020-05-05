@extends('layouts.form')

@section('content')

    <div class="container">

        <div class="my-4">
            <a href="{{ route('topic.index') }}" class="btn-link">
                <i class="fas fa-arrow-left"></i>
                Повернутися до списку
            </a>
        </div>

        <div class="layout-title">
            <h1>Редагувати тему</h1>

            <div class="layout-title__actions">
                @can('delete', $topic)
                    <confirm-action
                        @confirm="$refs['form-topic-delete'].submit()"
                        title="Ви дійсно хочете видалити '{{ $topic->title }}'?"
                    >
                        <div class="btn btn-link text-danger" slot="reference">
                            Видалити тему
                        </div>
                    </confirm-action>
                @endcan
                <a href="{{ route('topic.show', ['topic' => $topic]) }}" class="btn btn-primary">
                    Перейти до теми
                </a>
            </div>
        </div>

        <hr>

        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('topic.update', ['topic' => $topic]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="topic-create-title">Заголовок</label>
                        <input
                            type="text"
                            class="form-control"
                            id="topic-create-title"
                            name="title"
                            value="{{ $topic->title }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="topic-create-category">Категорія</label>
                        <select
                            class="form-control"
                            id="topic-create-category"
                            name="category_id"
                            required
                        >
                            @foreach($topic_categories as $category)
                                <option
                                    value="{{ $category->id }}" {{ $topic->category_id === $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
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

                    <button type="submit" class="btn btn-primary">
                        Зберегти
                    </button>
                </form>
            </div>
        </div>

        <form
            action="{{ route('topic.destroy', ['topic' => $topic]) }}"
            method="POST"
            class="d-none"
            ref="form-topic-delete"
        >
            @csrf
            @method('DELETE')
        </form>

    </div>

@endsection
