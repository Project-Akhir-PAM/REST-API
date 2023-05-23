<?php

use App\Libraries\ResponseBase;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return ResponseBase::error("Maaf endpoint tidak tersedia!", 404);
});
