<button
    id="{{ $id }}"
    {{ $attributes->merge(['class' => 'button-clipboard']) }}
    data-clipboard-target="#{{ $target }}"
    data-clipboard-action="copy"
    data-toggle="tooltip"
>
    <svg class="size-4 group-hover:rotate-6 transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <rect width="8" height="4" x="8" y="2" rx="1" ry="1"></rect>
        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
    </svg>

    <svg class="js-clipboard-success hidden size-4 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="20 6 9 17 4 12"></polyline>
    </svg>
    <span class="tooltip">Copied</span>
</button>

@script
    <script>
        new ClipboardJS('#{{ $id }}').on('success', function(e) {
            e.clearSelection();
            e.trigger.classList.add('tooltip-shown');
            setTimeout(() => {
                e.trigger.classList.remove('tooltip-shown');
            }, 500)
        });
    </script>
@endscript
