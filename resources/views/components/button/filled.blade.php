<button
    {{ $attributes->merge(['class' => 'button-borderless bg-light-cyan-700 text-white']) }}
>
    {{ $slot }}
</button>
