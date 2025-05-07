<a
    {{ $attributes->merge(['class' => 'tab '.(($active ?? false) ? 'active' : '')]) }}
>
    {{ $slot }}
</a>
