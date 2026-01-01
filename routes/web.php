<?php

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(app()->environment('local')) {
        return redirect('/api/status');
    }
    else
    {
        return redirect('https://anasfadzrin.com');
    }
});

Route::prefix('api')->group(function () {
    include base_path('routes/api.php');
});