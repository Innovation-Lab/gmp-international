<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalesProduct;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the Home view.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        // 集計期間
        $today = date('Y-m-d');
        $startOfYear = Carbon::parse($today)->startOfYear()->format('Y-m-d');
        $endOfYear = Carbon::parse($today)->endOfYear()->format('Y-m-d');
        
        $userQuery = User::query();
        $salesProductQuery = SalesProduct::query();
        
        $salesCountsBySelectPer = (clone$salesProductQuery)
            ->select(
                'm_products.*',
                DB::raw('COUNT(*) AS member_count')
            )
            ->leftJoin('m_products', 'm_products.id', 'sales_products.m_product_id')
            ->leftJoin('m_brands', 'm_brands.id', 'm_products.m_brand_id')
            ->groupBy('sales_products.m_product_id')
            ->orderBy('member_count', 'DESC')
            ->get();

        return view('admin.home', [
            'startOfYear' => $startOfYear,
            'endOfYear' => $endOfYear,
            'summary_count' => (clone$userQuery)->count(),
            'sales_count' => (clone$salesProductQuery)->count(),
            'sales_product_ranks' => $salesCountsBySelectPer,
        ]);
    }
    
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function chartUserRegister(Request $request): JsonResponse
    {
        if($request->get('period') == 'month' || !$request->get('period')) {
            $month = $request->get('month', date('Y-m'));
            $year = date('Y', strtotime($month));
            $start_at = Carbon::parse(date("Y-m-d", strtotime("first day of {$month}")));
            $end_at = Carbon::parse(date("Y-m-d", strtotime("last day of {$month}")))->addDay()->subSecond(1);
            $start_at_prev = Carbon::parse($start_at)->subMonths(1);
            $period_key = 0;
        } elseif($request->get('period') == 'year') {
            $start_at = Carbon::today()->subYear();
            $end_at = Carbon::today()->addDay()->subSecond(1);
            $start_at_prev = Carbon::today()->subYears(2);
            $period_key = 12;
        }
        
        $userQuery = User::query();

        $graph = [];
        if($request->get('period') == 'year') {
            $stop = $end_at->diffInMonths($start_at) - 1;
            for ($i=0; $stop >= $i; $i++) {
                $_dateIndex = Carbon::today()->subMonthsWithOverflow($period_key);
                $_dateIndex2 = $_dateIndex->addMonthsWithOverflow($i);
                $_dateIndex3 = $_dateIndex2->year.'-'.sprintf('%02d', $_dateIndex2->month).'-'.sprintf('%02d', $_dateIndex2->day).' '.'00:00:00';
                $_dateIndex4 = carbon::parse($_dateIndex3);
                $target_start_time = $_dateIndex4->format('Y-m-d H:i:s');
                $target_end_time = $_dateIndex4->addMonthsWithOverflow(1)->subSecond(1)->format('Y-m-d H:i:s');

                $graph['label'][$i] = sprintf('%02d', $start_at->month);
                $graph['data'][$i] = (clone$userQuery)
                    ->select(
                        DB::raw('COUNT(*) AS count')
                    )
                    ->whereBetween('created_at', [$target_start_time, $target_end_time])
                    ->count();

                $start_at->addMonthWithOverflow();
            }
            $graph['graph'] = 'line';
        }else {
            $stop = $end_at->diffInDays($start_at);
            for ($i=0; $stop >= $i; $i++) {
                $_dateIndex = new Carbon('first day of this month');
                $_dateIndex2 = $_dateIndex->addDay($i);
                $_dateIndex3 = $_dateIndex2->year.'-'.sprintf('%02d', $_dateIndex2->month).'-'.sprintf('%02d', $_dateIndex2->day).' '.'00:00:00';
                $_dateIndex4 = carbon::parse($_dateIndex3);
                $target_start_time = $_dateIndex4->format('Y-m-d H:i:s');
                $target_end_time = $_dateIndex4->addDay(1)->subSecond(1)->format('Y-m-d H:i:s');
             
                $graph['label'][$i] = sprintf('%02d', $start_at->day);
                $graph['data'][$i] = (clone$userQuery)
                    ->select(
                        DB::raw('COUNT(*) AS count')
                    )
                    ->whereBetween('created_at', [$target_start_time, $target_end_time])
                    ->count();
                $start_at->addDay();
            }
            
            $graph['graph'] = 'line';
        }

        return response()->json([
            'label' => $graph['label'],
            'data' => $graph['data'],
            'graph' => $graph['graph'],
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
