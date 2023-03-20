<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    // Active SSO
    public function activeSso(): Factory|View|Application
    {
        return view('reports.front.active-sso.active-sso');
    }
}
