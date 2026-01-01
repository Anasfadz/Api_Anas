<?php

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/status', function () {
    return response()->json(['status' => 'OK']);
});

Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])
    ->withoutMiddleware([VerifyCsrfToken::class]);

?>
