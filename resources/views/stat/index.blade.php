<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :pages="[
            ['name' => '統計情報', 'url' => route('stat.index')],
        ]" />
    </x-slot>

    <div class="py-4">
        <div class="max-w-2xl mx-auto px-2">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-4">統計情報メニュー</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                            <a href="{{ route('stat.unused-item') }}" class="block p-4">
                                <div class="flex items-center">
                                    <div class="flex items-center justify-center bg-blue-100 rounded-full mr-4 w-12 h-12">
                                        <i class="fa-solid fa-clipboard text-blue-600"></i>
                                    </div>
                                    <h4 class="font-medium text-gray-800">未使用アイテムリスト</h4>
                                </div>
                            </a>
                        </div>
                        <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                            <a href="{{ route('stat.wear-rank') }}" class="block p-4">
                                <div class="flex items-center">
                                    <div class="flex items-center justify-center bg-green-100 rounded-full mr-4 w-12 h-12">
                                        <i class="fa-solid fa-ranking-star text-green-600"></i>
                                    </div>
                                    <h4 class="font-medium text-gray-800">着用回数ランキング</h4>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="text-center text-sm text-gray-500">
                        <p>統計情報は日々の着用記録に基づいて自動的に更新されます</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
