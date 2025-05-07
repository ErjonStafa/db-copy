<div class="mt-5 @if(! $show) hidden @endif">
    <x-dbcopy::tabs.list>
        <x-slot:tabs>
            <x-dbcopy::tabs.tab :active="$showArray" wire:click="showDataAsArray">
                Array
            </x-dbcopy::tabs.tab>
            <x-dbcopy::tabs.tab :active="$showJson" wire:click="showDataAsJson">
                JSON
            </x-dbcopy::tabs.tab>
        </x-slot:tabs>

        <x-dbcopy::tabs.panel :active="$showArray">
            <x-array-highlight :array="$dataAsArray"/>
        </x-dbcopy::tabs.panel>
        <x-dbcopy::tabs.panel :active="$showJson">
            <x-json-highlight :json-data="$dataAsJson"/>
        </x-dbcopy::tabs.panel>
    </x-dbcopy::tabs.list>
</div>
