<div class="card">
    <div class="card__bg"></div>
    <div class="card__body">

        <div class="card__thumbnail">
            <img src="{{ $topic->thumbnail }}/200x200">
        </div>

        <div class="card__content">
            <a href="{{ route('topic.show', ['topic' => $topic]) }}"  class="card__title">
                {{ $topic->title }}
            </a>
            <span class="color-secondary">Автор:</span>
            <a href="{{ route('user.show', ['user' => $topic->author]) }}">
                {{ $topic->author->name }}
            </a>

            <div class="card__info">
                <span class="color-secondary">Створено </span>
                <span title="{{ $topic->created_at->isoFormat('Do MMMM YYYY') }}">
                    {{ $topic->created_at->ago() }}
                </span>
                <br>
                <span class="color-secondary">Категорія:</span>
                <a href="{{ route('category.show', ['category' => $topic->category]) }}">
                    {{ $topic->category->name }}
                </a>
            </div>
        </div>
    </div>
    <p class="card__actions">
        <a
            href="{{ route('topic.show', ['topic' => $topic]) }}"
            class="btn btn-primary"
        >
            Перейти до теми
        </a>
        @if(Gate::allows('update', $topic))
            <a
                href="{{ route('topic.edit', ['topic' => $topic]) }}"
                class="btn"
            >
                Редагувати тему
            </a>
        @endif
    </p>
</div>
