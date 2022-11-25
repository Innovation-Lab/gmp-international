<?php

namespace Database\Seeders;

use App\Models\Car;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = 'https://www.goo-net.com/pit/applyapi/brand?version=1';

        $client = new Client();
        $response = $client->get($url);

        $response_data = json_decode($response->getBody()->getContents(), true);

        foreach(data_get($response_data, 'data') as $car){
            Car::create([
                'user_id' => 1,
                'brand' => data_get($car, 'brand_name'),
                'brand_code' => data_get($car, 'brand_cd'),
                'car_name' => 'すごい車',
                'car_name_code' => '12345',
                'grade' => 'A',
                'grade_id' => 1,
                'color' => '黒',
                'model' => 'さんぷる',
                'frame_number' => '111111',
                'number_plate' => '111112',
                'displacement' => '111111',
                'model_year' => '2000-11-11',
                'mileage' => '500',
                'inspection_expiration_date' => '2024-11-11',
                'vehicle_inspection_date' => '2024-11-11',
                'photo_path' => '',
            ]);
        }
    }
}
