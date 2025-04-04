<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧表示
        </h2>
    </x-slot>
    <div class="container mx-auto px-2 text-center mb-[42px]">
        @if (session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        
        <x-item-list :items="$items" :showModal="true" />
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
