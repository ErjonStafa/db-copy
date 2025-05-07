<div {{ $attributes->merge(['class' => 'relative']) }}>
    <ul class="tab-list">
        {{ $tabs }}
    </ul>

    <div>
        {{ $slot }}
    </div>
</div>
