<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupervisorUpdateRequest;
use App\Models\Supervisor;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('supervisor.index',[
            'supervisors' => Supervisor::latest()->paginate(5),
        ]);
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Supervisor $supervisor
     * @return \Illuminate\Http\Response
     */
    public function show(Supervisor $supervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Supervisor $supervisor
     * @return Application|Factory|View
     */
    public function edit(Supervisor $supervisor): View|Factory|Application
    {
        return view('supervisor.edit', compact('supervisor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SupervisorUpdateRequest $request
     * @param Supervisor $supervisor
     * @return RedirectResponse
     */
    public function update(SupervisorUpdateRequest $request, Supervisor $supervisor): RedirectResponse
    {
        if ( !$supervisor->update( $request->validated() ) )
        {
            return redirect()->route('supervisor.index')->with('error','Supervisor information update failed.');
        }

        return redirect()->route('supervisor.index')->with('success','Supervisor information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Supervisor $supervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supervisor $supervisor)
    {
        //
    }

}
