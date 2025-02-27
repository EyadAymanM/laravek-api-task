<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class VenueController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }

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

        $venue = $request->user()->venues()->create($fields);

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
        return response(['message' => 'updated successfully', 'data' => $venue], 202);
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
