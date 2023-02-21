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
use App\Models\Bp;
use App\Models\CompetitionInformation;
use App\Models\ItopReplace;
use App\Models\Rso;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


    //______Notifications________________________________________________//
    // All Notification
    Route::get('/all-notifications', function (){
        return view('all-notifications');
    })->name('all.notifications');

    // Single Notification
    Route::get('/single-notification/{id}', function ( $id ){
        $notify = Auth::user()->notifications->find( $id );
        $notify->markAsRead();
        return view('single-notification', compact('notify'));
    })->name('single.notification');

    // Notification Mark as read
    Route::get('/mark-as-read/{notification}', function($notification){
        $notify = Auth::user()->notifications->find($notification);
        if ( $notify )
        {
            $notify->markAsRead();
        }
        return redirect()->back();
    })->name('markAsRead');

    // Notification Mark all as read
    Route::get('/mark-all-as-read', function (){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('markAllAsRead');

    // Reject Itop Number
    Route::patch('/itop-replace/{reject}/reject', [ ItopReplaceController::class, 'numberReject' ])
        ->name('itop-replace.numberReject');
    // Accept Itop Number
    Route::patch('/itop-replace/{accept}/accept', [ ItopReplaceController::class, 'numberAccept' ])
        ->name('itop-replace.numberAccept');

    //______Import________________________________________________//
    // Import BTS Data
    Route::post('/bts/import', [ BtsController::class, 'import' ])->name('bts.import');
    // Import Route Data
    Route::post('/route/import', [ RouteController::class, 'import' ])->name('route.import');

    //______Export________________________________________________//
    // Export Itop Replace Data
    Route::get('/itop-replace/export', [ ItopReplaceController::class, 'export' ])->name('itop-replace.export');
    // Export BTS Data
    Route::get('/bts/export', [ BtsController::class, 'export' ])->name('bts.export');
    // Export Route Data
    Route::get('/route/export', [ RouteController::class, 'export' ])->name('route.export');
    // Export Retailer Data
    Route::get('/retailer/export', [ RetailerController::class, 'export' ])->name('retailer.export');
    // Export Competition Information Data
//    Route::get('/competition-information/export', [ CompetitionInformationController::class, 'export' ])->name('competition.information.export');

    // BTS Delete All
    Route::delete('/delete-all/bts', [ BtsController::class, 'deleteAllBts' ])->name('delete.all.bts');
    // Routes Delete All
    Route::delete('/delete-all/routes', [ RouteController::class, 'deleteAllRoutes' ])->name('delete.all.routes');
    Route::get('/download-bts-sample-file', [ BtsController::class, 'sampleFileDownload' ])->name('download.bts.sample.file');


    // BP Profile Update
    Route::patch('/bp/{bp}/profile/update', [ BpController::class, 'profileUpdate' ])->name('bp.profile.update');
    Route::patch('/bp/{bp}/additional/update', [ BpController::class, 'additionalUpdate' ])->name('bp.additional.update');
    Route::post('/bp/change-password', [ BpController::class, 'changePassword' ])->name('bp.change.password');
    Route::get('/bp/{bp}/verify', [ BpController::class, 'verify' ])->name('bp.verify');
    Route::post('/bp/{bp}/approve', [ BpController::class, 'approve' ])->name('bp.approve');
    Route::post('/bp/{bp}/reject', [ BpController::class, 'reject' ])->name('bp.reject');
    Route::get('/bp/export', [ BpController::class, 'export' ])->name('bp.export');
    Route::get('/download/bp/{bp}/document', function ($id){
        $bp = Bp::firstWhere('id', $id);
        return Response::download(public_path( 'storage/bp/documents/' . $bp->document ), $bp->user->name.'.pdf');
    })->name('download.bp.document');

    // Rso additional routes
    Route::get('/rso/{rso}/profile', [ RsoController::class, 'profile' ])->name('rso.profile');
    Route::patch('/rso/{rso}/profile/update', [ RsoController::class, 'profileUpdate' ])->name('rso.profile.update');
    Route::patch('/rso/{rso}/additional-info-update', [ RsoController::class, 'additionalInfo' ])->name('rso.additional.info.update');
    Route::get('/rso/{rso}/verify', [ RsoController::class, 'verify' ])->name('rso.verify');
    Route::post('/rso/{rso}/approve', [ RsoController::class, 'approve' ])->name('rso.approve');
    Route::post('/rso/{rso}/reject', [ RsoController::class, 'reject' ])->name('rso.reject');
    Route::post('/rso/change-password', [ RsoController::class, 'changePassword' ])->name('rso.change.password');
    Route::get('/rso/export', [ RsoController::class, 'export' ])->name('rso.export');
    Route::get('/rso/export', [ RsoController::class, 'export' ])->name('rso.export');
    Route::get('/download/rso/{rso}/document', function ($id){
        $rso = Rso::firstWhere('id', $id);
        return Response::download( public_path( 'storage/rso/documents/' . $rso->document ), $rso->user->name.'.pdf');
    })->name('download.rso.document');

    // Route
    Route::get('/download-route-sample-file', [ RouteController::class, 'sampleFileDownload' ])->name('download.route.sample.file');

    // Retailer
    Route::get('/download-retailer-sample-file', [ RetailerController::class, 'sampleFileDownload' ])->name('download.retailer.sample.file');
    Route::post('/retailers/import', [ RetailerController::class, 'import' ])->name('retailer.import');

    // Resource routes
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

Route::fallback( function () { return "<h2>Invalid Request</h2>"; } );

require __DIR__.'/auth.php';
