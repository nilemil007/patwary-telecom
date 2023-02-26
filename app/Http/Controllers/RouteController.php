<?php

namespace App\Http\Controllers;

use App\Exports\RouteExport;
use App\Http\Requests\RouteUpdateRequest;
use App\Imports\RouteImport;
use App\Models\Route;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Throwable;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        return view('route.index', [
            'routes' => Route::latest()
                ->orderBy('code','asc')
                ->search( $request->search )
                ->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Route $route
     * @return Response
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Route $route
     * @return Application|Factory|View
     */
    public function edit(Route $route): View|Factory|Application
    {
        return view('route.edit', compact('route'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RouteUpdateRequest $request
     * @param Route $route
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(RouteUpdateRequest $request, Route $route): RedirectResponse
    {
        $route->updateOrFail( $request->validated() );
        return redirect()->route('route.index')->with('success', 'Route information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Route $route
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Route $route): RedirectResponse
    {
        $route->deleteOrFail();
        return redirect()->route('route.index')->with('success', 'Route deleted successfully.');
    }


    // Import
    public function import( Request $request ): RedirectResponse
    {
        Excel::import( new RouteImport, $request->file('import_routes'));

        return redirect()->route('route.index')->with('success', 'Route list added successfully.');
    }

    // Export BTS Data
    public function export(): BinaryFileResponse
    {
        return Excel::download( new RouteExport, 'Route List.xlsx' );
    }

    // Delete All BTS
    public function deleteAllRoutes(): RedirectResponse
    {
        DB::table('routes')->delete();
        return redirect()->route('route.index')->with('success', 'All route deleted successfully.');
    }

    // Download sample file
    public function sampleFileDownload(): BinaryFileResponse
    {
        return \Illuminate\Support\Facades\Response::download(public_path('excel/Sample Route List.xlsx'), 'Sample Route List.xlsx');

    }
}
