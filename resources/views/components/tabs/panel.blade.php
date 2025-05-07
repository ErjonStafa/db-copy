<div
     {{ $attributes->merge(['class' => 'tab-panel '.(($active ?? false) ? 'active' : '')]) }}
>
    {{ $slot }}
</div>
