<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/survei', function () {
        return view('survei');
    })->name('survei');

    Route::post('/survei', function () {
        // Validate and store survey data
        $validated = request()->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:255',
            'jenis_Pelayanan' => 'required|string',
            'nilai_Pelayanan' => 'required|integer|min:1|max:5',
            'nilai_petugas' => 'required|string',
        ]);

        // Save to database
        \App\Models\SatisfactionSurvey::create($validated);

        return redirect()->route('survei')->with('status', 'Survei berhasil dikirim!');
    })->name('survei.submit');
});

require __DIR__.'/auth.php';
