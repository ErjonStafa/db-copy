<a
    {{ $attributes->merge(['class' => 'tab '.(($active ?? false) ? 'active' : '')]) }}
    tabindex="0"
    role="button"
    onkeydown="event.key === 'Enter'? document.activeElement.click():null"
>
    {{ $slot }}
</a>
