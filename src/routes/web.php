<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        // 'env(TEST_VALUE)' => env('TEST_VALUE', 'default'),
        // 'env(TEST_VALUE) ?: "default"' => env('TEST_VALUE') ?: 'default',
        'env(AWS_DEFAULT_REGION)' => env('AWS_DEFAULT_REGION'),
        'env(AWS_DEFAULT_REGION, ap-northeast-1)' => env('AWS_DEFAULT_REGION', 'ap-northeast-1'),
        'env(AWS_DEFAULT_REGION) ?: ap-northeast-1' => env('AWS_DEFAULT_REGION') ?: 'ap-northeast-1',
    ]);
});
