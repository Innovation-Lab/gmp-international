<?php

namespace App\Http\Controllers;

use App\Repositories\MasterRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\Csv\ImportCsvService;
use App\Services\StorageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CsvImportController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private ProductRepositoryInterface $productRepository;
    private ImportCsvService $importCsvService;
    private MasterRepositoryInterface $masterRepository;
    
    /**
     * @param UserRepositoryInterface $userRepository
     * @param ProductRepositoryInterface $productRepository
     * @param ImportCsvService $importCsvService
     * @param MasterRepositoryInterface $masterRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        ProductRepositoryInterface $productRepository,
        ImportCsvService $importCsvService,
        MasterRepositoryInterface $masterRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->importCsvService = $importCsvService;
        $this->masterRepository = $masterRepository;
    }
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function user(Request $request): RedirectResponse
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
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function brand(Request $request): RedirectResponse
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
            
            $this->masterRepository->importBrand($csv);
            
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
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function shop(Request $request): RedirectResponse
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

            $this->masterRepository->importShop($csv);
            
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
    
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function product(Request $request): RedirectResponse
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
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function color(Request $request): RedirectResponse
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
            
            $this->masterRepository->importColor($csv);
            
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
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function salesProduct(Request $request): RedirectResponse
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
