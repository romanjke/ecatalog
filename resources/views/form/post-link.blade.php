{{ Form::open(['route' => $route, 'method' => $method, 'onsubmit' => 'return confirm("Вы уверены?")']) }}
    <button type="submit" class="{{ join(' ', $attributes) }}">
    @if ($fa_icon)
        <i class="fa {{ $fa_icon }}"></i>
    @endif
        {{ $text }}
    </button>
{{ Form::close() }}