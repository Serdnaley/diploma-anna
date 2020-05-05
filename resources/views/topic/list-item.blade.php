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
            <span class="color-secondary">Author:</span>
            <a href="{{ route('user.show', ['user' => $topic->author]) }}">
                {{ $topic->author->name }}
            </a>

            <div class="card__info">
                <span class="color-secondary">Created at:</span>
                <span title="{{ $topic->created_at->format('d.m.Y H:i:s') }}">
                    {{ $topic->created_at->format('j F, Y') }}
                </span>
                <br>
                <span class="color-secondary">Category:</span>
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
            View topic
        </a>
        @if(Gate::allows('update', $topic))
            <a
                href="{{ route('topic.edit', ['topic' => $topic]) }}"
                class="btn"
            >
                Edit topic
            </a>
        @endif
    </p>
</div>
