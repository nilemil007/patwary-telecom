<?php

namespace App\Http\Controllers;

use App\Models\Rso;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RsoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        if ( Auth::user()->role == 'super-admin' )
        {
            $rsos = Rso::with('user')
                ->search( $request->search )
                ->latest()
                ->paginate(5);
        }else{
            $rsos = Rso::with('user')
                ->where('user_id', Auth::id())
                ->search( $request->search )
                ->latest()
                ->paginate(5);
        }

        return view('rso.index', compact('rsos'));
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
     * @param Rso $rso
     * @return \Illuminate\Http\Response
     */
    public function show(Rso $rso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Rso $rso
     * @return Application|Factory|View
     */
    public function edit(Rso $rso): View|Factory|Application
    {
        return view('rso.edit', compact('rso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Rso $rso
     * @return RedirectResponse
     */
    public function update(Request $request, Rso $rso): RedirectResponse
    {
        $rso->update($request->all());
        return redirect()->route('rso.index')->with('success','Rso information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rso $rso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rso $rso)
    {
        //
    }



    // Additional Method
    public function export()
    {
//        return Excel::download( new ItopReplaceExport, 'itop-replaces.xlsx' );
    }
}
