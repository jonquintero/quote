<?php

use Illuminate\Support\Facades\Route;
use Modules\InsuranceQuote\Http\Controllers\InsuranceQuoteController;

Route::get('insurance-quote/done', [InsuranceQuoteController::class, 'done'])->name('insurance-quote.done');
Route::resource('insurance-quote', InsuranceQuoteController::class);

