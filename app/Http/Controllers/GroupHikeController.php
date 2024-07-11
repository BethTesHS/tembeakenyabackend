<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupHikeResource;
use App\Models\GroupHike;
use App\Http\Requests\StoreGroupHikeRequest;
use App\Http\Requests\UpdateGroupHikeRequest;

class GroupHikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupHikes = GroupHike::with(['group', 'hike', 'guide', 'attendees'])->get();
        return GroupHikeResource::collection($groupHikes);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupHikeRequest $request)
    {
        $groupHike = GroupHike::create($request->validated());
        return new GroupHikeResource($groupHike);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $groupHike = GroupHike::with(['group', 'hike', 'guide', 'attendees'])->findOrFail($id);
        return new GroupHikeResource($groupHike);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(GroupHike $groupHike)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupHikeRequest $request, $id)
    {
        $groupHike = GroupHike::findOrFail($id);
        $groupHike->update($request->validated());
        return new GroupHikeResource($groupHike);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $groupHike = GroupHike::findOrFail($id);
        $groupHike->delete();
        return response()->json([
            'message' => 'Group hike deleted successfully'
        ], 204);
    }
}
