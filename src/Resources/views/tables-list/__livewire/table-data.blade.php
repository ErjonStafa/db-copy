<div>
    <div id="unique-id" class="mt-5 @if(! $show) hidden @endif">
        <x-dbcopy::tabs.list>
            <x-slot:tabs> <!-- Data format selector start -->
                <x-dbcopy::tabs.tab :active="$showArray" wire:click="showDataAsArray">
                    Array
                </x-dbcopy::tabs.tab>
                <x-dbcopy::tabs.tab :active="$showJson" wire:click="showDataAsJson">
                    JSON
                </x-dbcopy::tabs.tab>
            </x-slot:tabs> <!-- Data format selector end -->

            <x-dbcopy::tabs.panel :active="$showArray">
                <x-array-highlight :array="$dataAsArray"/>
            </x-dbcopy::tabs.panel>
            <x-dbcopy::tabs.panel :active="$showJson">
                <x-json-highlight :json-data="$dataAsJson"/>
            </x-dbcopy::tabs.panel>
        </x-dbcopy::tabs.list>

        <div class="mt-2">
            @if(method_exists($tableData, 'links'))
                {{ $tableData->links('dbcopy::pagination.tailwind', data: ['scrollTo' => false]) }}
            @endif
        </div>
    </div>
</div>

@script
<script>
    Livewire.on('scroll-to-view', () => {
        setTimeout(() => {
            document.querySelector('#unique-id')?.scrollIntoView({behavior: 'smooth'})
        }, 100)
    })
</script>
@endscript
