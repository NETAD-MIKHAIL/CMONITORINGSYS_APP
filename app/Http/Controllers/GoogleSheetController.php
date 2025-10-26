<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoogleSheetController extends Controller
{
    public function store(Request $request)
    {
        // Check token for security
        $token = $request->header('X-SHEET-TOKEN');
        if ($token !== env('SHEET_API_TOKEN')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Validate incoming data
        $data = $request->validate([
            'date' => 'nullable|date',
            'ticket' => 'nullable|string|max:255',
            'refcode' => 'nullable|string|max:255',
            'booth' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'cancelled_by' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:50', // e.g., CDO or MISOR
            'reason_denied_ticket' => 'nullable|string|max:255',
        ]);

        $data['created_at'] = now();
        $data['updated_at'] = now();

        // Save to database indefinitely
        DB::table('sheet_data')->insert($data);

        // Optional: log which tab data came from
        \Log::info("Google Sheet Data Saved - Area: {$data['area']}, Ticket: {$data['ticket']}");

        return response()->json([
            'success' => true,
            'message' => "Data saved successfully for area {$data['area']}",
            'data' => $data
        ]);
    }
}
