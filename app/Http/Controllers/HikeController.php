<?php

namespace App\Http\Controllers;

use App\Http\Requests\HikeRequest;
use App\Http\Requests\RegisterHikeRequest;
use App\Http\Resources\GroupHikeAttendeeResource;
use App\Http\Resources\HikeResource;
use App\Http\Resources\PaymentResource;
use App\Http\Responses\APIGetHikeResponse;
use App\Http\Responses\APIGroupUpdatedResponse;
use App\Http\Responses\APIHikeUpdatedResponse;
use App\Models\GroupHikeAttendee;
use App\Models\Hike;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Responses\APIHikeCreatedResponse;

class HikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hikes = Hike::all();
        return (HikeResource::collection($hikes))
            ->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HikeRequest $request)
    {
        $hike = Hike::create($request->validated());
        return response()->json([
            'message' => 'Hike created successfully',
            'hike' => new HikeResource($hike)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hike = Hike::with('reviews')->findOrFail($id);
        return (new HikeResource($hike))
            ->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HikeRequest $request, $id)
    {
        $hike = Hike::findOrFail($id);
        $hike->update($request->validated());
        return (new HikeResource($hike))
            ->response(
                (new APIHikeUpdatedResponse())->toResponse($request)
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hike = Hike::findOrFail($id);
        $hike->delete();
        return response();
    }

    public function registerHike(RegisterHikeRequest $request)
    {
        // Create a new attendee
        $attendee = GroupHikeAttendee::create($request->validated());

        // Handle payment (assuming payment logic is handled elsewhere and payment status is passed here)
        $payment = Payment::create([
            'user_id' => $attendee->user_id,
            'group_hike_id' => $attendee->group_hike_id,
            'payment_status' => 'confirmed' // Assuming payment is confirmed for simplicity
        ]);

        return response()->json([
            'message' => 'Registration successful',
            'attendee' => new GroupHikeAttendeeResource($attendee),
            'payment' => new PaymentResource($payment)
        ], 201);
    }

}
