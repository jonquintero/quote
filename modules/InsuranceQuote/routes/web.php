<?php

use Illuminate\Support\Facades\Route;
use Modules\InsuranceQuote\Http\Controllers\InsuranceQuoteController;

Route::resource('insurance-quote', InsuranceQuoteController::class);
