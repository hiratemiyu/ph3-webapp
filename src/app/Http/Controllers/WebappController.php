<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WebappController extends Controller
{
    public function index()
    {
        // 今日の日付と現在の月を取得
        $today = Carbon::now()->format('Y-m-d');
        $currentMonth = Carbon::now()->format('Y-m');

        // 今日の学習時間を合計
        $today_sum = DB::table('hours')->where('date', $today)->sum('hours');

        // 現在の月の表示
        $this_month = Carbon::now()->format('Y年n月');

        // 今月の学習時間を合計
        $month_sum = DB::table('hours')
                    ->whereBetween('date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                    ->sum('hours');

        // 全ての学習時間を合計
        $total_sum = DB::table('hours')->sum('hours');

        // ビューに変数を渡す
        return view('webapp', [
            'today_sum' => $today_sum,
            'this_month' => $this_month,
            'month_sum' => $month_sum,
            'total_sum' => $total_sum
        ]);
    }
}



