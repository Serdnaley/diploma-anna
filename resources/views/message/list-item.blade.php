<div class="comment">
    <a
        class="comment__avatar"
        href="{{ route('user.show', ['user' => $message->author]) }}"
    >
        <div class="user-avatar user-avatar--{{ $message->author->color }} mt-1">
            <div class="user-avatar__initials">
                {{ $message->author->initials }}
            </div>
        </div>
    </a>

    <div class="comment__body">
        <div class="comment__title">
            <a
                class="comment__author color-{{ $message->author->color }}"
                href="{{ route('user.show', ['user' => $message->author]) }}"
            >
                {{ $message->author->name }}
            </a>
            <div class="comment__actions">
                @can('update', $message)
                    <a href="{{ route('message.edit', ['message' => $message]) }}">
                        Edit
                    </a>
                @endcan
                @can('delete', $message)
                    <span class="text-secondary mx-2">&bull;</span>
                    <confirm-action
                        @confirm="function () {
                            $refs['form-topic-delete'].setAttribute(
                            'action',
                            '{{ route('message.destroy', ['message' => $message]) }}'
                            );
                            $refs['form-topic-delete'].submit();
                            }"
                        title="Are you sure want to delete message of {{ $message->author->name }}?"
                    >
                        <a href="#" class="text-danger" slot="reference">
                            Delete
                        </a>
                    </confirm-action>
                @endcan
            </div>
        </div>
        <div class="comment__text">
            {{ $message->text }}
        </div>
    </div>
</div>
