<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupHikeAttendeeResource;
use App\Models\GroupHikeAttendee;
use App\Http\Requests\StoreGroupHikeAttendeeRequest;
use App\Http\Requests\UpdateGroupHikeAttendeeRequest;
use App\Models\Payment;

class GroupHikeAttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupHikeAttendeeRequest $request)
    {
        $attendee = GroupHikeAttendee::create($request->validated());

        // Handle payment (assuming payment logic is handled elsewhere and payment status is passed here)
        Payment::create([
            'user_id' => $attendee->user_id,
            'group_hike_id' => $attendee->group_hike_id,
            'payment_status' => 'confirmed' // Assuming payment is confirmed for simplicity
        ]);

        return new GroupHikeAttendeeResource($attendee);
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupHikeAttendee $groupHikeAttendee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroupHikeAttendee $groupHikeAttendee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupHikeAttendeeRequest $request, GroupHikeAttendee $groupHikeAttendee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupHikeAttendee $groupHikeAttendee)
    {
        //
    }
}
