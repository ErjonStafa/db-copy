<div {{ $attributes->merge(['class' => 'relative']) }}>
    <ul class="tab-list">
        {{ $tabs }}
    </ul>

    <div class="p-5">
        {{ $slot }}
    </div>
</div>
