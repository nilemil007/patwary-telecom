<?php

use App\Http\Controllers\BpController;
use App\Http\Controllers\BtsController;
use App\Http\Controllers\CompetitionInformationController;
use App\Http\Controllers\CreateNewUserController;
use App\Http\Controllers\DdHouseController;
use App\Http\Controllers\ItopReplaceController;
use App\Http\Controllers\MerchandiserController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RsoController;
use App\Http\Controllers\SupervisorController;
use App\Models\CompetitionInformation;
use App\Models\ItopReplace;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::middleware(['auth'])->group(function(){
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'role' => Auth::user()->role,
            'authId' => Auth::id(),
            'replace' => ItopReplace::all(),
        ]);
    })->name('dashboard');

    // Reject Itop Number
    Route::patch('/itop-replace/{reject}/reject', [ ItopReplaceController::class, 'numberReject' ])
        ->name('itop-replace.numberReject');
    // Accept Itop Number
    Route::patch('/itop-replace/{accept}/accept', [ ItopReplaceController::class, 'numberAccept' ])
        ->name('itop-replace.numberAccept');

    // Import Retailers Data
    Route::post('/retailers/import', [ RetailerController::class, 'import' ])->name('retailer.import');
    // Import BTS Data
    Route::post('/bts/import', [ BtsController::class, 'import' ])->name('bts.import');
    // Import Route Data
    Route::post('/route/import', [ RouteController::class, 'import' ])->name('route.import');

    // Export Itop Replace Data
    Route::get('/itop-replace/export', [ ItopReplaceController::class, 'export' ])->name('itop-replace.export');
    // Export BTS Data
    Route::get('/bts/export', [ BtsController::class, 'export' ])->name('bts.export');
    // Export Route Data
    Route::get('/route/export', [ RouteController::class, 'export' ])->name('route.export');
    // Export Rso Data
    Route::get('/rso/export', [ RsoController::class, 'export' ])->name('rso.export');
    // Export Retailer Data
    Route::get('/retailer/export', [ RetailerController::class, 'export' ])->name('retailer.export');
    // Export Competition Information Data
//    Route::get('/competition-information/export', [ CompetitionInformationController::class, 'export' ])->name('competition.information.export');
    // Export BP Data
    Route::get('/bp/export', [ BpController::class, 'export' ])->name('bp.export');

    // BTS Delete All
    Route::delete('/delete-all/bts', [ BtsController::class, 'deleteAllBts' ])->name('delete.all.bts');
    // Routes Delete All
    Route::delete('/delete-all/routes', [ RouteController::class, 'deleteAllRoutes' ])->name('delete.all.routes');

    // BP Profile Update
    Route::patch('/bp/{bp}/profile/update', [ BpController::class, 'profileUpdate' ])->name('bp.profile.update');

    Route::resources([
        'dd-house'          => DdHouseController::class,
        'create-new-user'   => CreateNewUserController::class,
        'itop-replace'      => ItopReplaceController::class,
        'permission'        => PermissionsController::class,
        'role'              => RolesController::class,
        'retailer'          => RetailerController::class,
        'bts'               => BtsController::class,
        'route'             => RouteController::class,
        'rso'               => RsoController::class,
        'competition'       => CompetitionInformationController::class,
        'supervisor'        => SupervisorController::class,
        'bp'                => BpController::class,
        'merchadiser'       => MerchandiserController::class,
    ]);
});

Route::get('/cleareverything', function () {

    Artisan::call('optimize:clear');
    echo "Optimize cleared<br>";

    Artisan::call('optimize');
    echo "Optimized<br>";

})->middleware(['clear.everything']);

require __DIR__.'/auth.php';

Route::fallback( function () { return "<h2>Invalid Request</h2>"; } );
