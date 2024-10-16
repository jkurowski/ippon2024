<?php

namespace App\Http\Controllers\Admin\Developro;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $roomId = $request->input('room_id');
        $currentRoomId = $request->input('current_id');

        $copyFrom = Property::find($roomId);
        $copyTo = Property::find($currentRoomId);

        if ($copyFrom && $copyTo) {
            // Copy 'cords' and 'html' from $copyFrom to $copyTo
            $copyTo->cords = $copyFrom->cords;
            $copyTo->html = $copyFrom->html;

            // Save the updated $copyTo
            $copyTo->save();
        }

        return response()->json([
//            'html' => $property->html,
//            'cords' => $property->cords,
            'success' => true,
            'message' => 'Room copied successfully!'
        ]);
    }
}
