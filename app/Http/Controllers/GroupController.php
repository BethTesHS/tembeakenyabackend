<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupJoinRequestResource;
use App\Http\Resources\GroupResource;
use App\Http\Resources\UserResource;
use App\Http\Responses\APIGroupCreatedResponse;
use App\Http\Responses\APIGroupUpdatedResponse;
use App\Models\Group;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\GroupJoinRequest;
use App\Models\User;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all groups
        $groups = Group::all();
        // return the groups
        return (GroupResource::collection($groups))
            ->response()
            ->setStatusCode(200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {
        // authorize the request
        $this->authorize('create', Group::class);
        // create a new group
        $group = Group::create($request->validated());
        // add the user to the group
        $group->members()->attach(
            User::findOrFail($request->guide_id)->id
        );
        // return a response
        return response()->json([
            'message' => 'Group created success',
            'data' => new GroupResource($group),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // get the group
        $group = Group::with(['groupHikes', 'members'])->findOrFail($id);
        // return the group
        return (new GroupResource($group))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, $id)
    {
        // get the group
        $group = Group::findOrFail($id);
        // authorize the request
        $this->authorize('update', [
            $group, $request->user()
        ]);
        // update the group
        $group->update($request->validated());
        // return a response
        return response()->json([
            'message' => 'Group updated successfully',
            'data' => new GroupResource($group),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // get the group
        $group = Group::findOrFail($id);
        // authorize the request
        $this->authorize('delete', $group);
        // Delete the group
        $group->delete();
        // return a response
        return response()->json([
            'message' => 'Group deleted successfully'
        ], 204);
    }

    public function members($id)
    {
        $group = Group::findOrFail($id);
        return UserResource::collection($group->members);
    }
    public function approveMember($groupId, $userId)
    {
        $group = Group::findOrFail($groupId);
        $this->authorize('approveMember', $group);

        // Remove join request
        GroupJoinRequest::where('group_id', $groupId)->where('user_id', $userId)->delete();

        // Add user as member
        $group->members()->attach($userId);

        return response()->json(['message' => 'Member approved successfully'], 200);
    }

    public function rejectMember($groupId, $userId)
    {
        $group = Group::findOrFail($groupId);
        $this->authorize('rejectMember', $group);

        // Remove join request
        GroupJoinRequest::where('group_id', $groupId)->where('user_id', $userId)->delete();

        return response()->json(['message' => 'Member rejected successfully'], 200);
    }

    public function joinRequests($id)
    {
        $group = Group::findOrFail($id);
        $this->authorize('viewJoinRequests', $group);

        $requests = GroupJoinRequest::where('group_id', $id)->with('user')->get();
        return GroupJoinRequestResource::collection($requests);
    }

    public function requestToJoin($id)
    {
        $user = auth()->user();
        $group = Group::findOrFail($id);

        if (GroupJoinRequest::where('group_id', $id)->where('user_id', $user->id)->exists()) {
            return response()->json(['message' => 'You have already requested to join this group'], 400);
        }

        GroupJoinRequest::create([
            'group_id' => $group->id,
            'user_id' => $user->id,
        ]);

        return response()->json(['message' => 'Join request sent successfully'], 201);
    }
}
