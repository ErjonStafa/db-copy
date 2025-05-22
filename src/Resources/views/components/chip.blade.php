<button
    {{ $attributes->merge(['class' => 'chip']) }}
>
    <span class="chip-icon"></span>
    {{ $slot }}
</button>
