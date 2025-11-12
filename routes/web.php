<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwilioController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/search-numbers', [DashboardController::class, 'searchNumbers'])->name('search.numbers');

    // Gestion des contacts
    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
        Route::post('/', [ContactController::class, 'store'])->name('contacts.store');
        Route::post('/import', [ContactController::class, 'import'])->name('contacts.import');
        Route::delete('/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
        Route::delete('/campaign/delete', [ContactController::class, 'deleteCampaign'])->name('contacts.deleteCampaign');
        Route::get('/search', [ContactController::class, 'search'])->name('contacts.search');

        // Route pour la progression en temps réel de l'import
        Route::get('/import/progress/{operationId}', [ContactController::class, 'getImportProgress'])
            ->name('contacts.import.progress');
    });

    // Configuration Twilio
    Route::prefix('twilio')->group(function () {
        Route::get('/config', [TwilioController::class, 'config'])->name('twilio.config');
        Route::post('/config', [TwilioController::class, 'saveConfig'])->name('twilio.saveConfig');
        Route::post('/config/activate/{id}', [TwilioController::class, 'activateConfig'])->name('twilio.activateConfig');
        Route::put('/config/{id}', [TwilioController::class, 'updateConfig'])->name('twilio.updateConfig');
        Route::delete('/config/{id}', [TwilioController::class, 'deleteConfig'])->name('twilio.deleteConfig');
        Route::post('/send-contact/{id}', [TwilioController::class, 'sendContact'])->name('twilio.sendContact');
        Route::post('/send-campaign', [TwilioController::class, 'sendCampaign'])->name('twilio.sendCampaign');

        // Route pour la progression en temps réel de l'envoi de campagne
        Route::get('/campaign/progress/{operationId}', [TwilioController::class, 'getCampaignProgress'])
            ->name('twilio.campaign.progress');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
