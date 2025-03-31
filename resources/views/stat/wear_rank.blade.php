<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            着用回数ランキング
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-2 text-center mb-[42px]">
        <x-item-list :items="$wearCountSortedItems" :showModal="false" />
    </div>
</x-app-layout>
