<div class="comment">
    <a
        class="comment__avatar"
        href="{{ route('user.show', ['user' => $comment->author]) }}"
    >
        <div class="user-avatar user-avatar--{{ $comment->author->color }} mt-1">
            <div class="user-avatar__initials">
                {{ $comment->author->initials }}
            </div>
        </div>
    </a>

    <div class="comment__body">
        <div class="comment__title">
            <div>
                <a
                    class="comment__author color-{{ $comment->author->color }}"
                    href="{{ route('user.show', ['user' => $comment->author]) }}"
                >
                    {{ $comment->author->name }}
                </a>
            </div>
            <div class="comment__actions">
                @can('update', $comment)
                    <a href="{{ route('comment.edit', ['comment' => $comment]) }}">
                        Редагувати
                    </a>
                @endcan
                @can('delete', $comment)
                    <span class="text-secondary mx-2">&bull;</span>
                    <confirm-action
                        @confirm="function () {
                            $refs['form-topic-delete'].setAttribute(
                            'action',
                            '{{ route('comment.destroy', ['comment' => $comment]) }}'
                            );
                            $refs['form-topic-delete'].submit();
                            }"
                        title="Ви дійсно хочете видалити коментар від {{ $comment->author->name }}?"
                    >
                        <a href="#" class="text-danger" slot="reference">
                            Видалити
                        </a>
                    </confirm-action>
                @endcan
            </div>
        </div>
        <div class="comment__text">
            {{ $comment->text }}
        </div>
    </div>
</div>
