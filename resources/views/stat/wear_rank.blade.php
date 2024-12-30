<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            着用回数ランキング
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-2 text-center">
        <input type="search" placeholder="カテゴリー、ブランドなど" class="p-1 min-w-80">
        @foreach ($wearCountSortedItems as $wearCountSortedItem)
            <div class="flex py-1">
                <img src="{{ asset('img/90x120Dummy.png') }}" alt="" width="90" height="120">
                <div class="py-1 ml-2 min-w-[261px]">
                    <div class="pb-1">
                        <div class="flex justify-between">
                            <div class="pr-1 overflow-hidden whitespace-nowrap text-ellipsis">{{ $wearCountSortedItem->category->name }}</div>
                            <div class="pl-1 overflow-hidden whitespace-nowrap text-ellipsis">{{ $wearCountSortedItem->brand->name }}</div>
                        </div>
                    </div>
                    <div class="pb-1">
                        <div class="flex justify-between">
                            <div class="pr-1 overflow-hidden whitespace-nowrap text-ellipsis">{{ $wearCountSortedItem->name }}</div>
                            <div class="pl-1 overflow-hidden whitespace-nowrap text-ellipsis">{{ $wearCountSortedItem->season->name }}</div>
                        </div>
                    </div>
                    <hr>
                    <div class="pt-1">
                        <dl class="flex justify-between">
                            <dt class="pr-1">着用日数:</dt>
                            <dd class="pl-1">{{ $wearCountSortedItem->getWearCount() }}</dd>
                        </dl>
                    </div>
                    <div class="pt-1">
                        <dl class="flex justify-between">
                            <dt class="pr-1">最終着用日:</dt>
                            <dd class="pl-1">{{ $wearCountSortedItem->getLatestWearLog()?->wear_date ?? '-' }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</x-app-layout>