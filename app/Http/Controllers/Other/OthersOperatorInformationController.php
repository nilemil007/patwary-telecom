<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\Models\OthersOperatorInformation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OthersOperatorInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('competition-information.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OthersOperatorInformation  $othersOperatorInformation
     * @return \Illuminate\Http\Response
     */
    public function show(OthersOperatorInformation $othersOperatorInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OthersOperatorInformation  $othersOperatorInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(OthersOperatorInformation $othersOperatorInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OthersOperatorInformation  $othersOperatorInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OthersOperatorInformation $othersOperatorInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OthersOperatorInformation  $othersOperatorInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(OthersOperatorInformation $othersOperatorInformation)
    {
        //
    }
}
