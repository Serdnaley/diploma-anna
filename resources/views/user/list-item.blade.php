<a
    class="d-flex mb-4"
    href="{{ route('user.show', ['user' => $user]) }}"
    style="width: 400px;"
>
    <div
        class="user-avatar user-avatar--{{ $user->color }}"
        style="font-size: 24px;"
    >
        <div class="user-avatar__initials">
            {{ $user->initials }}
        </div>
    </div>
    <div class="user-avatar__name">
        <h2 class="color-{{ $user->color }}">
            {{ $user->name }}
        </h2>
        @yield('after-name')
    </div>
</a>
