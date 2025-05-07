<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
    @for($i = 0; $i < 8; $i++)
        <x-dbcopy::card class="hover:bg-slate-200 cursor-pointer col-span-1">
            <div class="flex justify-between align-middle">
                <h3 class="h-4 bg-gray-200 rounded-full dark:bg-neutral-700 my-2" style="width: {{ rand(40, 65) . '%' }}"></h3>
            </div>

            <hr class="bg-slate-500 text-slate-500 mb-2">

            <p class="h-4 bg-gray-200 rounded-full dark:bg-neutral-700 w-2/5 my-2" style="width: {{ rand(40, 65) . '%' }}"></p>
            <p class="h-4 bg-gray-200 rounded-full dark:bg-neutral-700 w-2/5 my-2" style="width: {{ rand(40, 65) . '%' }}"></p>
        </x-dbcopy::card>
    @endfor
</div>
