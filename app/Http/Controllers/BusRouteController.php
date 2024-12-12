<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use Illuminate\Http\Request;

class BusRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all bus routes ordered by priority
        $busRoutes = BusRoute::orderBy('priority', 'asc')->get();

        // Pass the data to the view
        return view('bus-route.index', compact('busRoutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a view to create a new bus route
        return view('bus-route.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'priority' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        // Create a new bus route
        BusRoute::create([
            'priority' => $request->priority,
            'name' => $request->name,
        ]);

        // Redirect to index with success message
        return redirect()->route('bus-route.index')->with('success', 'Bus route added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the bus route by ID
        $busRoute = BusRoute::findOrFail($id);

        // Pass the data to the edit view
        return view('bus-route.edit', compact('busRoute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'priority' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        // Find the bus route by ID and update it
        $busRoute = BusRoute::findOrFail($id);
        $busRoute->update([
            'priority' => $request->priority,
            'name' => $request->name,
        ]);

        // Redirect to index with success message
        return redirect()->route('bus-route.index')->with('success', 'Bus route updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the bus route by ID and delete it
        $busRoute = BusRoute::findOrFail($id);
        $busRoute->delete();

        // Redirect to index with success message
        return redirect()->route('bus-route.index')->with('success', 'Bus route deleted successfully!');
    }
}
