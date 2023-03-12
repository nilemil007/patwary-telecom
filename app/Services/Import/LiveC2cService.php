<?php
namespace App\Services\Import;


use App\Models\Reports\Activation;
use App\Models\Reports\C2C;
use App\Models\Reports\LiveC2c;
use App\Models\Rso;
use App\Models\Supervisor;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LiveC2cService {

    public function liveC2cImport( $request ): Application|Factory|View
    {
        if ( !empty($request->input('from')) && !empty($request->input('to')) )
        {
            $from = Carbon::parse( $request->input('from') )->toDateString();
            $to = Carbon::parse( $request->input('to') )->endOfDay();

            return view('reports.back.c2c.live-c2c',[
                'c2cs' => LiveC2c::with('ddHouse','rso','supervisor','retailer')
                    ->whereBetween('date', [$from, $to])
                    ->paginate(10000),
            ]);
        }elseif( $request->input('search') ){
            return view('reports.back.c2c.live-c2c',[
                'c2cs' => LiveC2c::with('ddHouse','rso','supervisor','retailer')
                    ->search( $request->search )
                    ->paginate(10000),
            ]);
        }else{
            switch ( Auth::user()->role ){
                case 'super-admin';
                    $c2cs = LiveC2c::with('ddHouse','rso','supervisor','retailer')
                        ->latest()
                        ->paginate(5);
                    break;

                case 'supervisor';
                    $supervisorId = Supervisor::firstWhere('user_id', Auth::id())->id;
                    $c2cs = LiveC2c::with('ddHouse','rso','supervisor','retailer')
                        ->where('supervisor_id', $supervisorId)
                        ->latest()
                        ->paginate(5);
                    break;

                case 'rso';
                    $rsoId = Rso::firstWhere('user_id', Auth::id())->id;
                    $c2cs = LiveC2c::with('ddHouse','rso','supervisor','retailer')
                        ->where('supervisor_id', $rsoId)
                        ->latest()
                        ->paginate(5);
                    break;
            }

            return view('reports.back.c2c.live-c2c', compact('c2cs'));
        }
    }
}
