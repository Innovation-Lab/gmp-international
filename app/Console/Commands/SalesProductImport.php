<?php

namespace App\Console\Commands;

use App\Models\MBrand;
use App\Models\MColor;
use App\Models\MProduct;
use App\Models\MShop;
use App\Models\SalesProduct;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class SalesProductImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SalesProductImport';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $csvFilePath = storage_path('csv/user/t_regist.csv');
        $productCsvHeader = Config::get('import_mapping_const.sales_product_csv_header');
        
        $file = fopen($csvFilePath, 'r');
        
        if ($file) {
            fgets($file);
            
            $productToCreate = [];
            while (($data = fgetcsv($file)) !== false) {
                
                $new_params = [];
                
                foreach ($data as $key => $value) {
                    $value = trim($value);
                    
                    switch ($productCsvHeader[$key]) {
                        case 'user_id':
                            $user = User::where('old_id', $value)->first();
                            if($user) {
                                $new_params['user_id'] = $user->id;
                            } else {
                                continue 2;
                            }
                            break;
                        case 'product_name':
                            if ($value) {
                                $mProduct = MProduct::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($value) . '%'])->first();
                                if($mProduct) {
                                    $new_params['m_product_id'] = $mProduct->id;
                                }
                            }
                            break;
                        case 'color_name':
                            if ($value) {
                                $mColor = MColor::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($value) . '%'])->first();
                                if($mColor) {
                                    $new_params['m_color_id'] = $mColor->id;
                                } else {
                                    $new_params['other_color_name'] = $value;
                                }
                            }
                            break;
                        case 'store_name':
                            if ($value) {
                                $mShop = MShop::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($value) . '%'])->first();
                                if($mShop) {
                                    $new_params['shop_id'] = $mShop->id;
                                } else {
                                    $new_params['other_shop_name'] = $value;
                                }
                            }
                            break;
                        case 'purchase_date':
                            if ($value) {
                                $new_params['purchase_date'] = date('Y-m-d', strtotime($value));
                            }
                            break;
                        case 'product_code':
                            if ($value) {
                                $new_params['product_code'] = $value;
                            }
                            break;
                        case 'product_code_spare':
                            if ($value && !isset($new_params['product_code'])) {
                                $new_params['product_code'] = $value;
                            }
                            break;
                    }
                }
                if (isset($new_params['m_product_id']) && isset($new_params['user_id'])) {
                    $sales = SalesProduct::create($new_params);
                    $this->info("=========================== Add New Record".$sales->id." ===========================");
                }
            }
            
            fclose($file);
        } else {
            $this->error('Failed to open the CSV file.');
        }
    }
}
