<?php

use App\Http\Controllers\BpController;
use App\Http\Controllers\BtsController;
use App\Http\Controllers\CompetitionInformationController;
use App\Http\Controllers\CoreDataImportController;
use App\Http\Controllers\CreateNewUserController;
use App\Http\Controllers\DdHouseController;
use App\Http\Controllers\ItopReplaceController;
use App\Http\Controllers\MerchandiserController;
use App\Http\Controllers\Other\OthersOperatorInformationController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RsoController;
use App\Http\Controllers\SupervisorController;
use App\Models\Bp;
use App\Models\CompetitionInformation;
use App\Models\ItopReplace;
use App\Models\OthersOperatorInformation;
use App\Models\Rso;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

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

    // Itop Replace
    Route::controller( ItopReplaceController::class )->group(function(){
        // Reject Itop Number
        Route::patch('/itop-replace/{reject}/reject','numberReject')
            ->name('itop-replace.numberReject');
        // Accept Itop Number
        Route::patch('/itop-replace/{accept}/accept', 'numberAccept')
            ->name('itop-replace.numberAccept');
        // Export Itop Replace Data
        Route::get('/itop-replace/export', 'export')->name('itop-replace.export');
    });

    //______Import________________________________________________//
    // Import BTS Data
    Route::post('/bts/import', [ BtsController::class, 'import' ])->name('bts.import');
    // Import Route Data
    Route::post('/route/import', [ RouteController::class, 'import' ])->name('route.import');

    //______Export________________________________________________//
    // Export BTS Data
    Route::get('/bts/export', [ BtsController::class, 'export' ])->name('bts.export');
    // Export Route Data
    Route::get('/route/export', [ RouteController::class, 'export' ])->name('route.export');
    // Export Competition Information Data
//    Route::get('/competition-information/export', [ CompetitionInformationController::class, 'export' ])->name('competition.information.export');

    // BTS Delete All
    Route::delete('/delete-all/bts', [ BtsController::class, 'deleteAllBts' ])->name('delete.all.bts');
    // Routes Delete All
    Route::delete('/delete-all/routes', [ RouteController::class, 'deleteAllRoutes' ])->name('delete.all.routes');
    Route::get('/download-bts-sample-file', [ BtsController::class, 'sampleFileDownload' ])->name('download.bts.sample.file');


    // BP additional routes
    Route::prefix('bp')->name('bp.')->group( function(){
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

    // Retailer routes
    Route::controller( RetailerController::class )->prefix('retailer')->name('retailer.')->group(function(){
        Route::get('/all', 'index')->name('index');
        Route::get('/show', 'show')->name('show');
        Route::get('/edit', 'edit')->name('edit');
        Route::delete('/delete/all', 'deleteAll')->name('delete.all');
        Route::post('/import', 'import')->name('import');
        Route::get('/export', 'export')->name('export');
        Route::get('/sample-file', 'sampleFileDownload')->name('sample.file.download');
    });

    // Retailer additional routes
//    Route::controller(RetailerController::class)->prefix('retailer')->name('retailer.')->group( function() {
//        Route::get('/download-sample-file', 'sampleFileDownload')->name('sample.file.download');
//        Route::post('/import', 'import')->name('import');
//        Route::get('{retailer}/verify', 'verify')->name('verify');
//        Route::post('{retailer}/approve', 'approve')->name('approve');
//        Route::post('{retailer}/reject', 'reject')->name('reject');
//    });

    // Dd House additional routes
    Route::post('/house/import', [ DdHouseController::class, 'import' ])->name('house.import');

    // User additional routes
    Route::post('/user/import', [ CreateNewUserController::class, 'import' ])->name('user.import');


    // Core data import routes
    Route::controller( CoreDataImportController::class )->name('raw.')->group(function (){
        // Activation
        Route::get('/activation', 'activationIndex')->name('activation');
        Route::get('/live/activation', 'liveActivationIndex')->name('live.activation');
        Route::get('/fcd/ga', 'fcdGaIndex')->name('fcd.ga');
        Route::post('/activation/import', 'activationImport')->name('activation.import');
        Route::post('/live/activation/import', 'liveActivationImport')->name('live.activation.import');
        Route::post('/fcd/ga/import', 'fcdGaImport')->name('fcd.ga.import');
        Route::delete('/activation/destroy', 'activationDestroy')->name('activation.destroy');
        Route::delete('/live/activation/destroy', 'liveActivationDestroy')->name('live.activation.destroy');
        Route::delete('/fcd/ga/destroy', 'fcdGaDestroy')->name('fcd.ga.destroy');

        // C2C
        Route::get('/c2c', 'c2cIndex')->name('c2c');
        Route::get('/live/c2c', 'liveC2cIndex')->name('live.c2c');
        Route::post('/c2c/import', 'c2cImport')->name('c2c.import');
        Route::post('/live/c2c/import', 'liveC2cImport')->name('live.c2c.import');
        Route::delete('/c2c/destroy', 'c2cDestroy')->name('c2c.destroy');
        Route::delete('/live/c2c/destroy', 'liveC2cDestroy')->name('live.c2c.destroy');

        // C2S
        Route::get('/c2s', 'c2sIndex')->name('c2s');
        Route::post('/c2s/import', 'c2sImport')->name('c2s.import');
        Route::delete('/c2s/destroy', 'c2sDestroy')->name('c2s.destroy');

        // Sim Issue
        Route::get('/sim-issue', 'simIssueIndex')->name('sim.issue');
        Route::post('/sim-issue/import', 'simIssueImport')->name('sim.issue.import');
        Route::delete('/sim-issue/destroy', 'simIssueDestroy')->name('sim.issue.destroy');

        // Balance
        Route::get('/balance', 'balanceIndex')->name('balance');
        Route::post('/balance/import', 'balanceImport')->name('balance.import');
        Route::delete('/balance/destroy', 'balanceDestroy')->name('balance.destroy');

        // Bso
        Route::get('/bso', 'bsoIndex')->name('bso');
        Route::post('/bso/import', 'bsoImport')->name('bso.import');
        Route::delete('/bso/destroy', 'bsoDestroy')->name('bso.destroy');

        // Dso
        Route::get('/dso', 'dsoIndex')->name('dso');
        Route::post('/dso/import', 'dsoImport')->name('dso.import');
        Route::delete('/dso/destroy', 'dsoDestroy')->name('dso.destroy');

    });

    // Others Operator Information
    Route::get('/others-operator-information/export', [ OthersOperatorInformationController::class, 'export' ])->name('ooi.info.export');
    Route::delete('/others-operator-information/delete-all', [ OthersOperatorInformationController::class, 'deleteAll' ])->name('others-operator-information.delete.all');




    // Resource routes
    Route::resources([
        'dd-house'          => DdHouseController::class,
        'create-new-user'   => CreateNewUserController::class,
        'itop-replace'      => ItopReplaceController::class,
//        'permission'        => PermissionsController::class,
//        'role'              => RolesController::class,
        'bts'               => BtsController::class,
        'route'             => RouteController::class,
        'rso'               => RsoController::class,
        'competition'       => CompetitionInformationController::class,
        'supervisor'        => SupervisorController::class,
        'bp'                => BpController::class,
        'merchadiser'       => MerchandiserController::class,
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
