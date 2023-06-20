<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class UserImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:UserImport';

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
        $csvFilePath = storage_path('csv/user/t_client.csv');
        $userCsvHeader = Config::get('import_mapping_const.user_csv_header');
        
        $file = fopen($csvFilePath, 'r');
        
        if ($file) {
            fgets($file);
            
            while (($data = fgetcsv($file)) !== false) {
                
                $params = [];
                
                // 住所の調整
                if (isset($data[10])) {
                    $pattern = '/^(.*?)(\d.*)$/';
                    if (preg_match($pattern, $data[10], $matches)) {
                        $city = $matches[1];
                        $street = $matches[2];
                        $data[12] = $data[11];
                        $data[11] = $street;
                        $data[10] = $city;
                    }
                }

                foreach ($data as $key => $value) {
                    switch ($userCsvHeader[$key]) {
                        case 'old_id':
                            if (User::where('old_id', $value)->exists()) {
                                continue 2;
                            }
                            break;
                        case 'password':
                            if ($value) {
                                $value = Hash::make($value);
                            }
                            break;
                        case 'deleted_at':
                            if ($value == '1') {
                                $value = '2000-01-01 00:00:00';
                            } elseif ($value == '0') {
                                $value = null;
                            }
                            break;
                    }
                    
                    $params[$userCsvHeader[$key]] = $value;
                }
                
                if (isset($params['old_id'])) {
                    $user = User::create($params);
                    $this->info("=========================== Add New Record".$user->id." ===========================");
                }
            }
            
            fclose($file);
        } else {
            $this->error('Failed to open the CSV file.');
        }
    }
}
