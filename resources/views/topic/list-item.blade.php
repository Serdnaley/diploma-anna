<div class="topic-list-item">
    <div class="topic-list-item__bg"></div>
    <div class="topic-list-item__content">
        <a href="{{ route('topic.show', ['topic' => $topic]) }}"  class="topic-list-item__title">
            {{ $topic->title }}
        </a>
        <span class="text-muted">by</span>
        <a href="{{ route('user.show', ['user' => $topic->author]) }}">
            {{ $topic->author->name }}
        </a>
        <p class="topic-list-item__actions">
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
    <div class="topic-list-item__info">
        <span title="{{ $topic->created_at->format('d.m.Y H:i:s') }}">
            {{ $topic->created_at->format('j F, Y') }}
        </span>
        <span class="color-secondary">&bull;</span>
        <a href="{{ route('category.show', ['category' => $topic->category]) }}">
            {{ $topic->category->name }}
        </a>
    </div>
</div>
