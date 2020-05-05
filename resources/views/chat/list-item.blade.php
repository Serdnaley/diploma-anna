<a
    href="{{ route('chat.show', ['chat' => $chat]) }}"
    class="d-block p-3 mt-3 {{ isset($current_chat) && $current_chat->id === $chat->id ? 'bg-light' : '' }}"
>
    <h3 class="my-1">
        {{ $chat->title }}
    </h3>
    <span class="color-secondary"></span>
    <span title="{{ $chat->created_at->format('d.m.Y H:i:s') }}">
        {{ $chat->created_at->format('j F, Y') }}
    </span>
    by {{ $chat->author->name }}
</a>
