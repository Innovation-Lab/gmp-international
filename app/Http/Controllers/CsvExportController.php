<?php

namespace App\Http\Controllers;

use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MProduct;
use App\Models\MShop;
use App\Models\SalesProduct;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\Csv\ExportCsvService;
use Illuminate\Http\Request;

class CsvExportController extends Controller
{
    private ExportCsvService $exportCsvService;
    private ProductRepositoryInterface $productRepository;
    private UserRepositoryInterface $userRepository;
    
    /**
     * @param ExportCsvService $exportCsvService
     * @param ProductRepositoryInterface $productRepository
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        ExportCsvService $exportCsvService,
        ProductRepositoryInterface $productRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->exportCsvService = $exportCsvService;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
    }
    
    /**
     * ブランドCSV
     */
    public function brand(Request $request)
    {
        $fileName = "ブランド一覧（".date('Y-m-d')."）";
        $header = [
            'id',
            'ブランド名',
            '画像URL',
            '作成日',
            '更新日',
        ];
        $csv = MBrand::query();
        
        return $this->exportCsvService->exportCsv(
            $fileName,
            $header,
            $csv,
            'brand'
        );
    }
    
    /**
     * 店舗CSV
     */
    public function shop(Request $request)
    {
        $fileName = "店舗一覧（".date('Y-m-d')."）";
        $header = [
            'id',
            '店舗名',
            '電話番号',
            '郵便番号',
            '都道府県',
            '市区町村番地',
            '建物名',
            '営業時間１',
            '営業時間１メモ',
            '営業時間２',
            '営業時間２メモ',
            '作成日',
            '更新日',
        ];
        $csv = MShop::query();
        
        return $this->exportCsvService->exportCsv(
            $fileName,
            $header,
            $csv,
            'shop'
        );
    }
    
    /**
     * カラーCSV
     */
    public function color(Request $request)
    {
        $fileName = "カラー一覧（".date('Y-m-d')."）";
        $header = [
            'id',
            'カラー名',
            'カラー名（英語表記）',
            'カラー１',
            'カラー２',
            'カラー画像',
            '作成日',
            '更新日',
        ];
        $csv = MColor::query();
        
        return $this->exportCsvService->exportCsv(
            $fileName,
            $header,
            $csv,
            'color'
        );
    }
    
    /**
     * 製品CSV
     */
    public function product(Request $request)
    {
        $fileName = "製品一覧（".date('Y-m-d')."）";
        $header = [
            'id',
            'ブランド名',
            '製品名',
            '製品名（カナ）',
            'カラー数',
            'シリアルガイドのタイプ',
        ];
        $csv = MProduct::query();
        
        return $this->exportCsvService->exportCsv(
            $fileName,
            $header,
            $csv,
            'product'
        );
    }
    
    /**
     * 購入製品CSV
     */
    public function salesProduct(Request $request)
    {
        $fileName = "購入製品一覧（".date('Y-m-d')."）";
        $header = [
            'id',
            'ブランド名',
            '商品名',
            'カラー名',
            '購入者',
            '購入日',
            '返品日',
            '店舗名',
            'シリアルコード',
            '保証期間',
            'カラー画像URL',
            'メモ',
            '削除日',
            '作成日',
            '更新日',
        ];
        $csv = $this->productRepository->search($request);
        
        return $this->exportCsvService->exportCsv(
            $fileName,
            $header,
            $csv,
            'sales_product'
        );
    }
    
    /**
     * 購入製品CSV
     */
    public function user(Request $request)
    {
        $fileName = "ユーザー一覧（".date('Y-m-d')."）";
        $header = [
            'id',
            'メールアドレス',
            '姓',
            '名',
            'セイ（フリガナ）',
            'メイ（フリガナ）',
            '郵便番号',
            '都道府県',
            '市町区村',
            '番地',
            '建物名',
            '電話番号',
            'DMフラグ',
            '管理者メモ',
            '削除日',
            '作成び',
            '更新日',
        ];
        $csv = $this->userRepository->search($request);
        
        return $this->exportCsvService->exportCsv(
            $fileName,
            $header,
            $csv,
            'user'
        );
    }
    
    
    
}
