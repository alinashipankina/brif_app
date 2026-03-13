<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Brif\Step1;
use App\Livewire\Brif\Step2\Analytics;
use App\Livewire\Brif\Step2\Content;
use App\Livewire\Brif\Step2\Context;
use App\Livewire\Brif\Step2\Geo;
use App\Livewire\Brif\Step2\Outstaff;
use App\Livewire\Brif\Step2\Performance;
use App\Livewire\Brif\Step2\Seo;
use App\Livewire\Brif\Step2\SeoForeign;
use App\Livewire\Brif\Step2\Serm;
use App\Livewire\Brif\Step3;
use App\Livewire\Brif\Step4;
use App\Livewire\Brif\Success;
use App\Livewire\Managment\ManagmentPage;
use App\Services\PredictionService;
use App\Livewire\Managment\Index;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Laravel\Fortify\Features;

Route::get('/', Step1::class)->name("brif.step1");

Route::get('/brif/seo', Seo::class)->name("brif.step2.seo");
Route::get('/brif/seo-foreign', SeoForeign::class)->name("brif.step2.seo-foreign");
Route::get('/brif/geo', Geo::class)->name("brif.step2.geo");
Route::get('/brif/performance', Performance::class)->name("brif.step2.performance");
Route::get('/brif/context', Context::class)->name("brif.step2.context");
Route::get('/brif/serm', Serm::class)->name("brif.step2.serm");
Route::get('/brif/content', Content::class)->name("brif.step2.content");
Route::get('/brif/analytics', Analytics::class)->name("brif.step2.analytics");
Route::get('/brif/outstaff', Outstaff::class)->name("brif.step2.outstaff");

Route::get('/brif/step3', Step3::class)->name("brif.step3");
Route::get('/brif/step4', Step4::class)->name("brif.step4");
Route::get('/brif/success', Success::class)->name("brif.success");

Route::middleware(['auth'])->group(function() {
    Route::get("/managment", ManagmentPage::class)->name("");
});


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Route::get('settings/profile', Profile::class)->name('profile.edit');
//     Route::get('settings/password', Password::class)->name('user-password.edit');
//     Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

//     Route::get('settings/two-factor', TwoFactor::class)
//         ->middleware(
//             when(
//                 Features::canManageTwoFactorAuthentication()
//                     && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
//                 ['password.confirm'],
//                 [],
//             ),
//         )
//         ->name('two-factor.show');
// });
