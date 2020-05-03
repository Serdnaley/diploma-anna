@if($disable_link)
    <div class="d-flex mb-3">
@else
    <a
        class="d-flex mb-3"
        href="{{ route('user.show', ['user' => $user]) }}"
    >
@endif
    <div class="user-avatar user-avatar--{{ $user->color }}">
        <div class="user-avatar__initials">
            {{ $user->initials }}
        </div>
    </div>
    <div class="user-avatar__name">
        <div class="color-{{ $user->color }}">
            {{ $user->name }}
        </div>
        @yield('after-name')
    </div>
@if($disable_link)</div>@else</a>@endif
