<div
    {{ $attributes->merge(['class' => 'card']) }}
>
    @isset($imageUrl)
        <img class="card-image" src="{{ $imageUrl }}" alt="{{ $imageAlt??'Card Image' }}">
    @endisset
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
