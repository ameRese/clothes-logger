<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center text-sm">
            <span>アイテム一覧</span>
            <span class="mx-2">/</span>
        </div>
    </x-slot>
    <div class="pb-12">
        <x-item-list :items="$items" :showModal="true" />
    </div>
    <footer class="fixed bottom-0 w-full bg-white">
        <hr>
        <div class="flex justify-center m-1">
            <a href="{{ route('item.create') }}">
                <x-primary-button>アイテム登録</x-primary-button>
            </a>
            {{-- <x-secondary-button class="ml-2">複数選択</x-secondary-button> --}}
        </div>
    </footer>
    @vite(['resources/js/modules/search.js', 'resources/js/modules/modal.js'])
</x-app-layout>
