<?php

use App\Http\Controllers\API\SupportControllerAPI;
use Illuminate\Support\Facades\Route;

Route::apiResource('/supports', SupportControllerAPI::class);
