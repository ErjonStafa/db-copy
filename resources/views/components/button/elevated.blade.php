<button
    {{ $attributes->merge(['class' => 'button-borderless shadow-equal bg-light-cyan-50 text-light-cyan-700']) }}
>
    {{ $slot }}
</button>
