<?php

return [
    'GENDER' => [
        'Male' => 0,
        'Female' => 1,
    ],
    'PER_PAGE' => [
        7 => 7,
        10 => 10,
        50 => 50,
        100 => 100,
        500 => 500,
        1000 => 1000,
        3000 => 3000,
        5000 => 5000,
        10000 => 10000,
    ],
    'STATUS' => [
        'INACTIVE' => 0, /** tạm dừng hoạt động */
        'ACTIVE' => 1,  /** đang hoạt động */
        'SUSPENDED' => 2, /**  bị khóa  */
        'RETIRED' => 3,  /** nghỉ hưu */
        'TRANSFERRED' => 4,  /**  điều chuyển công tác */
        'ARCHIVED' => 5,  /** lưu trữ  */
    ],
    'PRISONER_STATUS' => [
        'IN_CUSTODY' => 1, // Đang ở trại
        'TRANSFERRED_TO_ANOTHER_FACILITY' => 2, // Chuyển trại
        'REASSIGNED' => 3, // Điều chuyển
        'RELEASED' => 4, // Ra trại
    ],
    'PASSWORD_DEFAULT' => '12345678',
];
