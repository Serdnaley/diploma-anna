<div class="card">
    <div class="card__bg"></div>
    <div class="card__content">
        <a href="{{ route('topic.show', ['topic' => $topic]) }}"  class="card__title">
            {{ $topic->title }}
        </a>
        <span class="text-muted">by</span>
        <a href="{{ route('user.show', ['user' => $topic->author]) }}">
            {{ $topic->author->name }}
        </a>
        <p class="card__actions">
            @if(Gate::allows('update', $topic))
                <a href="{{ route('topic.edit', ['topic' => $topic]) }}" class="btn btn-link">
                    Edit topic
                </a>
                <span class="color-secondary">&bull;</span>
            @endif
            <a href="{{ route('topic.show', ['topic' => $topic]) }}" class="btn btn-primary">
                View topic
            </a>
        </p>
    </div>
    <div class="card__info">
        <span title="{{ $topic->created_at->format('d.m.Y H:i:s') }}">
            {{ $topic->created_at->format('j F, Y') }}
        </span>
        <span class="color-secondary">&bull;</span>
        <a href="{{ route('category.show', ['category' => $topic->category]) }}">
            {{ $topic->category->name }}
        </a>
    </div>
</div>
