<?php

namespace App\Http\Controllers\Feature;

use App\Http\Controllers\Controller;
use App\Models\Relay;
use Illuminate\Http\Request;

class RelayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Relay::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        return Relay::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Relay $relay)
    {
        return $relay;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Relay $relay)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        
        $relay->update($validated);
        return $relay;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Relay $relay)
    {
        $relay->delete();
        return response()->noContent();
    }

    public function toggle(Relay $relay)
    {
        $relay->update(['status' => !$relay->status]);
        return $relay;
    }
}
