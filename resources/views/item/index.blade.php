<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧表示
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        @if (session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        <input type="search" placeholder="カテゴリー、ブランドなど">
        @foreach ($items as $item)
            <div>
                <a href="#" class="js-item">
                    <div class="flex p-2">
                        <img src="{{ asset('img/90x120Dummy.png') }}" alt="">
                        <div class="p-1">
                            <div class="p-1">
                                <div class="flex">
                                    <div class="px-1">{{ $item->category->name }}</div>
                                    <div class="px-1">{{ $item->brand->name }}</div>
                                </div>
                            </div>
                            <div class="p-1">
                                <div class="flex">
                                    <div class="px-1">{{ $item->name }}</div>
                                    <div class="px-1">{{ $item->season->name }}</div>
                                </div>
                            </div>
                            <hr>
                            <div class="p-1">
                                <dl class="flex">
                                    <dt class="px-1">着用日数:</dt>
                                    <dd class="px-1">{{ $item->getWearCount() }}</dd>
                                </dl>
                            </div>
                            <div class="p-1">
                                <dl class="flex">
                                    <dt class="px-1">最終着用日:</dt>
                                    <dd class="px-1">{{ $item->getLatestWearLog()?->wear_date ?? '-' }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </a>
                <hr>
                <dialog class="js-modal">
                    <div class="flex p-2">
                        <img src="{{ asset('img/90x120Dummy.png') }}" alt="">
                        <div class="p-1">
                            <div class="p-1">
                                <div class="flex">
                                    <div class="px-1">{{ $item->category->name }}</div>
                                    <div class="px-1">{{ $item->brand->name }}</div>
                                </div>
                            </div>
                            <div class="p-1">
                                <div class="flex">
                                    <div class="px-1">{{ $item->name }}</div>
                                    <div class="px-1">{{ $item->season->name }}</div>
                                </div>
                            </div>
                            <hr>
                            <div class="p-1">
                                <dl class="flex">
                                    <dt class="px-1">着用日数:</dt>
                                    <dd class="px-1">{{ $item->getWearCount() }}</dd>
                                </dl>
                            </div>
                            <div class="p-1">
                                <dl class="flex">
                                    <dt class="px-1">最終着用日:</dt>
                                    <dd class="px-1">{{ $item->getLatestWearLog()?->wear_date ?? '-' }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex">
                        @if ($item->isWearedToday())
                        <form method="post" action="{{ route('wear_log.destroy', $item->getLatestWearLog()) }}">
                            @csrf
                            @method('delete')
                            <x-primary-button>今日着た！を解除</x-primary-button>
                        </form>
                        @else
                            <form method="post" action="{{ route('wear_log.store', $item) }}">
                                @csrf
                                <x-primary-button>今日着た！</x-primary-button>
                            </form>
                        @endif
                        <a href="{{ route('item.show', $item) }}">
                            <x-primary-button>アイテム詳細</x-primary-button>
                        </a>
                    </div>
                </dialog>
            </div>
        @endforeach
    </div>
    <div>
        <a href="{{ route('item.create') }}">
            <x-primary-button>アイテム登録</x-primary-button>
        </a>
        <x-secondary-button>複数選択</x-secondary-button>
    </div>
    <script src="{{ asset('js/modal.js') }}"></script>
</x-app-layout>
