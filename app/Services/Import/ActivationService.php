<?php
namespace App\Services\Import;


use App\Models\Reports\Activation;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ActivationService {

    public function coreActivationImport( $request ): Application|Factory|View
    {
        if ( !empty($request->input('from')) && !empty($request->input('to')) )
        {
            $from = Carbon::parse( $request->input('from') )->toDateString();
            $to = Carbon::parse( $request->input('to') )->endOfDay();

            return view('reports.back.activation.index',[
                'activations' => Activation::with('ddHouse','rso','supervisor','retailer')
                    ->search( $request->search )
                    ->whereBetween('activation_date', [$from, $to])
                    ->latest()
                    ->paginate(5),
            ]);
        }else{
            if ( Auth::user()->role == 'super-admin' )
            {
                $activations = Activation::with('ddHouse','rso','supervisor','retailer')
                    ->search( $request->search )
                    ->latest()
                    ->paginate(5);
            }else{
                $activations = Activation::with('ddHouse','rso','supervisor','retailer')
                    ->where('user_id', Auth::id())
                    ->search( $request->search )
                    ->latest()
                    ->paginate(5);
            }

            return view('reports.back.activation.index', compact('activations'));
        }
    }
}
