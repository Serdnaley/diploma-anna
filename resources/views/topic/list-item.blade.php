<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <a href="{{ route('topic.show', ['topic' => $topic]) }}">
                    <h5 class="card-title">
                        {{ $topic->title }}
                    </h5>
                </a>
                <p class="card-text">
                    <span title="{{ $topic->created_at->format('d.m.Y H:i:s') }}">
                        {{ $topic->created_at->format('j F, Y') }}
                    </span>
                    <span class="text-muted">by</span>
                    <a href="{{ route('user.show', ['user' => $topic->author]) }}">
                        {{ $topic->author->name }}
                    </a>
                    <span class="text-muted mx-2">&bull;</span>
                    <span class="text-muted">Category:</span>
                    <a href="{{ route('category.show', ['category' => $topic->category]) }}">
                        {{ $topic->category->name }}
                    </a>
                </p>
            </div>
            <div>
                @if(Gate::allows('update', $topic))
                    <a href="{{ route('topic.edit', ['topic' => $topic]) }}" class="btn btn-link">
                        Edit topic
                    </a>
                @endif
                <a href="{{ route('topic.show', ['topic' => $topic]) }}" class="btn btn-primary">
                    View topic
                </a>
            </div>
        </div>
    </div>
</div>
