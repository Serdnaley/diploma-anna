<div class="media mb-3">
    <div class="user-avatar user-avatar--{{ $comment->author->color }} mt-1">
        <div class="user-avatar__initials">
            {{ $comment->author->initials }}
        </div>
    </div>
    <div class="media-body ml-3">
        <div class="card">
            <div class="card-body pt-3">
                <div class="row">
                    <div class="col">
                        <h6 class="card-title color-{{ $comment->author->color }}">
                            {{ $comment->author->name }}
                        </h6>
                    </div>
                    <div class="col-auto">
                        @can('update', $comment)
                            <a href="{{ route('comment.edit', ['comment' => $comment]) }}">
                                Edit
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
                                confirm-button-text="Delete"
                                confirm-button-class="btn btn-danger"
                            >
                                <a href="#" class="text-danger" slot="reference">
                                    Delete
                                </a>
                                Are you sure want to delete comment of {{ $comment->author->name }}?
                            </confirm-action>
                        @endcan
                    </div>
                </div>
                {{ $comment->text }}
            </div>
        </div>
    </div>
</div>
