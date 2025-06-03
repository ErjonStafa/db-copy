<div class="bg-slate-200 p-2 rounded-b-lg relative" id="{{ $type }}-data">
    <div class="absolute right-8 top-2">
        <x-dbcopy::clipboard id="copy-{{ $type }}-data" target="{{ $type }}-data" class="relative"/>
    </div>
    <div class="max-h-[40rem] overflow-y-auto max-w-full overflow-x-auto">
        {!! $html !!}
    </div>
</div>
