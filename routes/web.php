<?php

use App\Http\Controllers\BpController;
use App\Http\Controllers\BtsController;
use App\Http\Controllers\C2CController;
use App\Http\Controllers\C2SController;
use App\Http\Controllers\CompetitionInformationController;
use App\Http\Controllers\CoreDataImportController;
use App\Http\Controllers\CreateNewUserController;
use App\Http\Controllers\DdHouseController;
use App\Http\Controllers\ItopReplaceController;
use App\Http\Controllers\LiveActivationController;
use App\Http\Controllers\MerchandiserController;
use App\Http\Controllers\Other\OthersOperatorInformationController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RsoController;
use App\Http\Controllers\SimIssueController;
use App\Http\Controllers\SupervisorController;
use App\Models\Bp;
use App\Models\CompetitionInformation;
use App\Models\ItopReplace;
use App\Models\OthersOperatorInformation;
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


    // BP additional routes
    Route::prefix('bp')->name('bp')->group( function(){
        Route::patch('/{bp}/profile/update', [ BpController::class, 'profileUpdate' ])->name('profile.update');
        Route::patch('/{bp}/additional/update', [ BpController::class, 'additionalUpdate' ])->name('additional.update');
        Route::post('/change-password', [ BpController::class, 'changePassword' ])->name('change.password');
        Route::get('/{bp}/verify', [ BpController::class, 'verify' ])->name('verify');
        Route::post('/{bp}/approve', [ BpController::class, 'approve' ])->name('approve');
        Route::post('/{bp}/reject', [ BpController::class, 'reject' ])->name('reject');
        Route::get('/export', [ BpController::class, 'export' ])->name('export');
        Route::get('/download/bp/{bp}/document', function ($id){
            $bp = Bp::firstWhere('id', $id);
            return Response::download(public_path( 'storage/bp/documents/' . $bp->document ), $bp->user->name.'.pdf');
        })->name('download.bp.document');
    } );


    // Rso additional routes
    Route::get('/rso/{rso}/profile', [ RsoController::class, 'profile' ])->name('rso.profile');
    Route::patch('/rso/{rso}/profile/update', [ RsoController::class, 'profileUpdate' ])->name('rso.profile.update');
    Route::patch('/rso/{rso}/additional-info-update', [ RsoController::class, 'additionalInfo' ])->name('rso.additional.info.update');
    Route::get('/rso/{rso}/verify', [ RsoController::class, 'verify' ])->name('rso.verify');
    Route::post('/rso/{rso}/approve', [ RsoController::class, 'approve' ])->name('rso.approve');
    Route::post('/rso/{rso}/reject', [ RsoController::class, 'reject' ])->name('rso.reject');
    Route::post('/rso/change-password', [ RsoController::class, 'changePassword' ])->name('rso.change.password');
    Route::post('/rso/import', [ RsoController::class, 'import' ])->name('rso.import');
    Route::get('/rso/export', [ RsoController::class, 'export' ])->name('rso.export');
    Route::get('/download/rso/{rso}/document', function ($id){
        $rso = Rso::firstWhere('id', $id);
        return Response::download( public_path( 'storage/rso/documents/' . $rso->document ), $rso->user->name.'.pdf');
    })->name('download.rso.document');

    // Route
    Route::get('/download-route-sample-file', [ RouteController::class, 'sampleFileDownload' ])->name('download.route.sample.file');

    // Retailer additional routes
    Route::prefix('retailer')->name('retailer.')->group( function() {
        Route::get('/download-sample-file', [ RetailerController::class, 'sampleFileDownload' ])->name('sample.file.download');
        Route::post('/import', [ RetailerController::class, 'import' ])->name('import');
        Route::get('{retailer}/verify', [ RetailerController::class, 'verify' ])->name('verify');
        Route::post('{retailer}/approve', [ RetailerController::class, 'approve' ])->name('approve');
        Route::post('{retailer}/reject', [ RetailerController::class, 'reject' ])->name('reject');
//        Route::delete('/delete-all', [ RetailerController::class, 'deleteAllRetailers' ])->name('delete.all');
    });

    // Dd House additional routes
    Route::post('/house/import', [ DdHouseController::class, 'import' ])->name('house.import');

    // User additional routes
    Route::post('/user/import', [ CreateNewUserController::class, 'import' ])->name('user.import');

    // Activation additional routes
    Route::post('/live-activation/import', [ LiveActivationController::class, 'import' ])->name('activation.live.import');

    // C2C additional routes
    Route::post('/c2c/import', [ C2CController::class, 'import' ])->name('c2c.import');

    // C2S additional routes
    Route::post('/c2s/import', [ C2SController::class, 'import' ])->name('c2s.import');

    // Sim Issue additional routes
    Route::post('/sim-issue/import', [ SimIssueController::class, 'import' ])->name('sim-issue.import');

    // Core data import routes
    Route::controller( CoreDataImportController::class )->name('raw.')->group(function (){
        // Activation
        Route::get('/activation', 'activationIndex')->name('activation.index');
        Route::get('/activation/import', 'activationImport')->name('activation.import');
        Route::delete('/activation/destroy', 'activationDestroy')->name('activation.destroy');
    });

    // Others Operator Information
    Route::get('/others-operator-information/export', [ OthersOperatorInformationController::class, 'export' ])->name('ooi.info.export');
    Route::delete('/others-operator-information/delete-all', [ OthersOperatorInformationController::class, 'deleteAll' ])->name('others-operator-information.delete.all');




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
        'live-activation'   => LiveActivationController::class,
        'c2c'               => C2CController::class,
        'c2s'               => C2SController::class,
        'sim-issue'         => SimIssueController::class,
        'others-operator-information' => OthersOperatorInformationController::class,
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
