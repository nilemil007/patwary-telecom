<?php
namespace App\Services;


use App\Models\LiveActivation;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LiveActivationService {

    public function index( $request ): Application|Factory|View
    {
        if ( !empty($request->input('from')) && !empty($request->input('to')) )
        {
            $from = Carbon::parse( $request->input('from') )->toDateString();
            $to = Carbon::parse( $request->input('to') )->endOfDay();

            return view('reports.back.activation.live-activation',[
                'activations' => LiveActivation::with('ddHouse','rso','supervisor','retailer')
                    ->search( $request->search )
                    ->whereBetween('activation_date', [$from, $to])
                    ->latest()
                    ->paginate(5),
            ]);
        }else{
            if ( Auth::user()->role == 'super-admin' )
            {
                $activations = LiveActivation::with('ddHouse','rso','supervisor','retailer')
                    ->search( $request->search )
                    ->latest()
                    ->paginate(5);
            }else{
                $activations = LiveActivation::with('ddHouse','rso','supervisor','retailer')
                    ->where('user_id', Auth::id())
                    ->search( $request->search )
                    ->latest()
                    ->paginate(5);
            }

            return view('reports.back.activation.live-activation', compact('activations'));
        }
    }
}
