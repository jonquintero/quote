<?php


use Modules\Dashboard\Http\Controllers\DashboardController;
use Modules\InsuranceQuote\Http\Controllers\InsuranceQuoteController;


Route::get('/', function () {
    return redirect()->route('insurance-quote.index');

});
Route::post('/insurance-quote/first-step', [InsuranceQuoteController::class, 'firstStep'])->name('insurance-quote.first.step');

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


});

