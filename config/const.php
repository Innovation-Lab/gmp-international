<?php

return
[
    'HTTP_OK_MESSAGE' => 'success',
    
    'global_navigation' => [
        'users'=> [
            'label' => 'ユーザー管理',
            'path' => 'admin.users.index',
        ],
        'products'=> [
            'label' => '製品管理',
            'path' => 'admin.products.index',
        ],
        'masters'=> [
            'label' => 'マスタ管理',
            'path' => 'admin.masters.brand',
        ],
        'staffs'=> [
            'label' => '従業員管理',
            'path' => 'admin.staffs.index',
        ],
    ],
];
