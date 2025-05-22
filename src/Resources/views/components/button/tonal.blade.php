<button
    {{ $attributes->merge(['class' => 'button-borderless bg-light-cyan-300 text-light-cyan-700 font-medium']) }}
>
    {{ $slot }}
</button>
