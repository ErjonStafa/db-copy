<div class="bg-slate-200 max-w-full overflow-x-auto p-2 rounded-b-lg relative" id="{{ $type }}-data">
    <div class="absolute right-2 top-2">
        <x-dbcopy::clipboard id="copy-{{ $type }}-data" target="{{ $type }}-data" class="relative"/>
    </div>
    {!! $html !!}
</div>
