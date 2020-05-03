<div class="media mb-3">
    <div class="user-avatar user-avatar--{{ $message->author->color }} mt-1">
        <div class="user-avatar__initials">
            {{ $message->author->initials }}
        </div>
    </div>
    <div class="media-body ml-3">
        <div class="card">
            <div class="card-body pt-3">
                <div class="row">
                    <div class="col">
                        <h6 class="card-title color-{{ $message->author->color }}">
                            {{ $message->author->name }}
                        </h6>
                    </div>
                    <div class="col-auto">
                        @can('update', $message)
                            <a href="{{ route('message.edit', ['message' => $message]) }}">
                                Edit
                            </a>
                        @endcan
                        @can('delete', $message)
                            <span class="text-secondary mx-2">&bull;</span>
                            <confirm-action
                                @confirm="function () {
                                    $refs['form-chat-delete'].setAttribute(
                                        'action',
                                        '{{ route('message.destroy', ['message' => $message]) }}'
                                    );
                                    $refs['form-chat-delete'].submit();
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
                {{ $message->text }}
            </div>
        </div>
    </div>
</div>
