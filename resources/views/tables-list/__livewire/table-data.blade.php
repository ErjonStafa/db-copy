<div class="mt-5 @if(! $show) hidden @endif">
    <x-array-highlight :array="$dataAsArray"/>

    <x-json-highlight :data="$data"/>
</div>
