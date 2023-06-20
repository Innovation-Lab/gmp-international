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
    
    'color_csv_header' => [
        0 => 'name',
        1 => 'alphabet_name',
        2 => 'color',
        3 => 'second_color',
        4 => 'image_path',
        5 => 'created_at',
        6 => 'updated_at',
        7 => 'deleted_at'
    ],
    
    'brand_csv_header' => [
        0 => 'name',
    ],
    
    'product_csv_header' => [
        0 => 'm_brand_id',
        1 => 'name',
        2 => 'name_kana',
        3 => 'serial_guide_type',
    ],
    
    'sales_product_csv_header' => [
        0 => 'user_id',
        1 => 'product_code',
        2 => 'product_code_spare', // インポート不要
        3 => 'purchase_date',
        4 => 'brand_name', // インポート不要
        5 => 'product_name', // インポート不要
        6 => 'color_name', // インポート不要
        7 => 'store_name', // インポート不要
    ],
    
];

