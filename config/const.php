<?php

return
[
    'HTTP_OK_MESSAGE' => 'success',
    
    'global_navigation' => [
        'dashboard'=> [
            'label' => 'ダッシュボード',
            'path' => 'admin.home',
        ],
        'users'=> [
            'label' => 'ユーザー管理',
            'path' => 'admin.users.index',
        ],
        'products'=> [
            'label' => '登録製品管理',
            'path' => 'admin.products.index',
        ],
        'masters'=> [
            'label' => 'マスタ管理',
            'path' => 'admin.masters.brand',
        ],
        // 'staffs'=> [
        //     'label' => '従業員管理',
        //     'path' => 'admin.staffs.index',
        // ],
    ],
    
    'mail' => [
        'admin' => env('ADMIN_MAIL_TO')
    ]
];
