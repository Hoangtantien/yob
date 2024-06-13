<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;
use Illuminate\Support\Facades\Log;

class CourtController extends Controller
{
    public function showCreate()
    {
        return view('admin.court.create');
    }

    public function createStore(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string',
            ]);

            // Create the court
            $court = new Court();
            $court->name = $request->name;
            $court->save();

            // Redirect or respond as necessary
            return redirect()->route('court.list')->with('success', 'Court created successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Court creation failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error creating the court. Please try again.');
        }
    }

    public function showList()
    {
        $courts = Court::all(); // Fetch all courts from the database
        return view('admin.court.list', compact('courts'));
    }

    public function delete(Request $request, $id)
    {
        // Find the court by id
        $court = Court::find($id);

        if ($court) {
            // Delete the court
            $court->delete();

            // Add a success message
            return redirect()->route('court.list')->with('success', 'Court deleted successfully.');
        }

        return redirect()->route('court.list')->with('error', 'Court not found.');
    }

    public function showUpdate($id)
    {
        $court = Court::findOrFail($id);
        $data['court'] = $court;
        return view('admin.court.update', $data);
    }

    public function updateStore(Request $request, $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string',
            ]);

            // Find the court by ID
            $court = Court::findOrFail($id);

            // Update the court's details
            $court->name = $request->name;
            $court->save();

            // Redirect with success message
            return redirect()->route('court.list')->with('success', 'Court updated successfully.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Court update failed: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'There was an error updating the court. Please try again.');
        }
    }
}