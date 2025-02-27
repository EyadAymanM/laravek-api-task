<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Venue::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string',
            'capacity' => 'required|integer'
        ]);
        $venue = Venue::create($fields);
        return $venue;
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        return $venue;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venue $venue)
    {
        $fields = $request->validate([
            'name' => 'string|max:255',
            'location' => 'string',
            'capacity' => 'integer'
        ]);
        $venue->update($fields);
        return $venue;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();
        return response()->json(['message' => 'deleted successfully'], 204);
    }
}
