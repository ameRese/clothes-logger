<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index() {
        return view('stat.index');
    }

    public function unusedItem() {
        $unusedItems = Item::where('user_id', auth()->id())
            ->doesntHave('wearLogs')
            ->where('pre_regist_wear_count', 0)
            ->get();
        return view('stat.unused_item', compact('unusedItems'));
    }

    public function wearRank() {
        $wearCountSortedItems = Item::where('user_id', auth()->id())
            ->withCount('wearLogs')
            ->get()
            ->sortByDesc(fn($item) => $item->wearLogs_count + $item->pre_regist_wear_count);
        return view('stat.wear_rank', compact('wearCountSortedItems'));
    }
}
