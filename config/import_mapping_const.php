<?php

use Illuminate\Support\Facades\Facade;

return [
    'user_csv_header' => [
        0 => 'old_id',
        1 => 'created_at',
        2 => 'email',
        3 => 'password',
        4 => 'last_name',
        5 => 'first_name',
        6 => 'last_name_kana',
        7 => 'first_name_kana',
        8 => 'zip_code',
        9 => 'prefecture',
        10 => 'address_city',
        11 => 'address_block',
        12 => 'address_building',
        13 => 'tel',
        14 => 'is_catalog',
        15 => 'is_dm',
        16 => 'seq',
        17 => 'deleted_at'
    ],
    
    'shop_csv_header' => [
        0 => 'name',
        1 => 'tel',
        2 => 'fax',
        3 => 'zip_code',
        4 => 'prefecture',
        5 => 'address_city_block',
        6 => 'address_building',
        7 => 'week_business_hour',
        8 => 'week_business_hour_memo',
        9 => 'holiday_business_hour',
        10 => 'holiday_business_hour_memo',
    ],
    
    'brand_csv_header' => [
        0 => 'name',
    ],
    
];

