<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            アイテム登録
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-2">
        @if (session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        <form method="post" action="{{ route('item.store') }}" class="mx-auto text-center">
            @csrf
            <img src="{{ asset('img/180x240Dummy.png') }}" alt="" width="180" height="240" class="mx-auto mb-1">
            <table class="mx-auto">
                <tr>
                    <th class="text-left"><label for="item">アイテム名</label></th>
                    <td class="pl-2 py-1"><input type="text" name="name" id="item"
                        placeholder="必須" class="w-52 p-1" value="{{ old('name') }}"></td>
                </tr>
                <tr>
                    <th class="text-left"><label for="category">カテゴリー</label></th>
                    <td class="pl-2 py-1">
                        <select name="category_id" id="category" class="w-52 p-1">
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="text-left"><label for="color">カラー</label></th>
                    <td class="pl-2 py-1">
                        <select name="color_id" id="color" class="w-52 p-1">   
                            <option value="">選択してください</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="text-left"><label for="brand">ブランド</label></th>
                    <td class="pl-2 py-1">
                        <select name="brand_id" id="brand" class="w-52 p-1">   
                            <option value="">選択してください</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="text-left"><label for="season">シーズン</label></th>
                    <td class="pl-2 py-1">
                        <select name="season_id" id="season" class="w-52 p-1">  
                            <option value="">選択してください</option>
                            @foreach ($seasons as $season)
                                <option value="{{ $season->id }}">{{ $season->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="text-left"><label for="price">購入価格</label></th>
                    <td class="pl-2 py-1"><input type="number" name="price" id="price"
                        placeholder="オプション" class="w-52 p-1" value="{{ old('price') }}"></td>
                </tr>
                <tr>
                    <th class="text-left"><label for="purchase-date">購入日</label></th>
                    <td class="pl-2 py-1"><input type="date" name="purchase_date" id="purchase-date"
                        placeholder="オプション" class="w-52 p-1" value="{{ old('purchase_date') }}"></td>
                </tr>
                <tr>
                    <th class="text-left"><label for="pre-regist-wear-count">登録前の着用日数</label></th>
                    <td class="pl-2 py-1"><input type="number" name="pre_regist_wear_count" id="pre-regist-wear-count"
                        placeholder="オプション" class="w-52 p-1" value="{{ old('pre_regist_wear_count') }}"></td>
                </tr>
            </table>
            @foreach ($errors->all() as $error)
                <x-input-error :messages="$error" class="mt-2"></x-input-error>
            @endforeach
            <x-primary-button class="mt-1">
                登録
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
