<?php

use Illuminate\Support\Facades\Route;
use Laravel\LinkShortener\Controllers\ShortLinkController;


Route::middleware(['web', 'auth'])->prefix('link')->group(function () {
    Route::get('/shorten', [ShortLinkController::class, 'createForm'])->name('link.create');
    Route::post('/shorten', [ShortLinkController::class, 'create'])->name('link.store');
    Route::get('/{shortUrl}/analysis', [ShortLinkController::class, 'analyze'])->name('link.analyze');
    Route::get('/{shortUrl}', [ShortLinkController::class, 'redirectToOriginal'])->name('link.redirect');
    Route::delete('/{shortUrl}/delete', [ShortLinkController::class, 'delete'])->name('link.delete');
});
