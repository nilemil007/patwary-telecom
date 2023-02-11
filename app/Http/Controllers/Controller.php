<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next){
            if ( Session::has('success') )
            {
                Alert::success('Success', Session::get('success'));
            }elseif( Session::has('error') )
            {
                Alert::error('Error!', Session::get('error'));
            }elseif ( Session::has('warning') )
            {
                Alert::warning('Warning!', Session::get('warning'));
            }

            return $next($request);
        });
    }
}
