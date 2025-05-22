<button
    {{ $attributes->merge(['class' => 'button-borderless bg-transparent text-light-cyan-700 font-medium hover:bg-light-cyan-200']) }}
>
    {{ $slot }}
</button>
