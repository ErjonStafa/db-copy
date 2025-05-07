<div class="bg-gray-300 max-w-full overflow-x-auto p-2 rounded-lg relative" id="json-data">
    <div class="absolute right-2 top-2">
        <x-dbcopy::clipboard id="copy-array-data" target="json-data" class="relative"/>
    </div>
    {!! $html !!}
</div>
