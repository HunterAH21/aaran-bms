<?php

use Illuminate\Support\Facades\Route;

//Demo
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/gstAuth', \Aaran\MasterGst\Livewire\Class\Authenticate::class)->name('gstAuth');

});
