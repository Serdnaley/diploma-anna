<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <a href="{{ route('chat.show', ['chat' => $chat]) }}">
                    <h5 class="card-title">
                        {{ $chat->title }}
                    </h5>
                </a>
                <p class="card-text">
                    <span title="{{ $chat->created_at->format('d.m.Y H:i:s') }}">
                        {{ $chat->created_at->format('j F, Y') }}
                    </span>
                    <span class="text-muted">by</span>
                    <a href="{{ route('user.show', ['user' => $chat->author]) }}">
                        {{ $chat->author->name }}
                    </a>
                </p>
            </div>
            <div>
                @if(Gate::allows('update', $chat))
                    <a href="{{ route('chat.edit', ['chat' => $chat]) }}" class="btn btn-link">
                        Edit chat
                    </a>
                @endif
                <a href="{{ route('chat.show', ['chat' => $chat]) }}" class="btn btn-primary">
                    View chat
                </a>
            </div>
        </div>
    </div>
</div>
