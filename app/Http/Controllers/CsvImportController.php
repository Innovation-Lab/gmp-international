<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\Csv\ImportCsvService;
use App\Services\StorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CsvImportController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private ProductRepositoryInterface $productRepository;
    private ImportCsvService $importCsvService;
    
    /**
     * @param UserRepositoryInterface $userRepository
     * @param ProductRepositoryInterface $productRepository
     * @param ImportCsvService $importCsvService
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        ProductRepositoryInterface $productRepository,
        ImportCsvService $importCsvService
    )
    {
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->importCsvService = $importCsvService;
    }
    
    public function user(Request $request)
    {
        if (!$request->has('csv_file')) {
            return redirect()
                ->back()
                ->with([
                    'alert' => "csvファイルを選択してください。"
                ]);
        }
        
        // 最大５分間実行
        ini_set('max_execution_time', 300);
        
        DB::beginTransaction();
        try {
            $file_path = StorageService::storeCsvFile($request->file('csv_file'));
            $csv = $this->importCsvService->preProcess($file_path);
            
            $this->userRepository->importUser($csv);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->with([
                    'alert' => "エラーが発生しました。"
                ]);
        }
        DB::commit();
        
        return redirect()
            ->back()
            ->with([
                'success' => "インポートが完了しました。"
            ]);
    }
    
    
    
}
