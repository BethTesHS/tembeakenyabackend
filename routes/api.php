<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupHikeAttendeeController;
use App\Http\Controllers\GroupHikeController;
use App\Http\Controllers\HikeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppRedirectController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\RoutePath;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return new UserResource($request->user()->load(['groups', 'guideAdminsGroups', 'hikes', 'reviews']));
});

Route::get(RoutePath::for('password.reset', 'v1/reset-password/{token}'), [NewPasswordController::class, 'create'])
    ->middleware(['guest:' . config('fortify.guard')])
    ->name('api.password.reset');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/get-token', function (Request $request) {
        //get currently authenticated user
        $user = $request->user();
        //create a token for the user
        // Check the user role
        switch ($user()->role()) {
            case '1':
                // Create a token for the authenticated user
                $token = $request->user()->createToken($request->device_name, ['hiker:functions'])->plainTextToken;
                // Store the token in the session
                session(['login_token' => $token]);
                break;
            case '2':
                // Create a token for the authenticated user
                $token = $request->user()->createToken($request->device_name, ['guide:functions'])->plainTextToken;
                // Store the token in the session
                session(['login_token' => $token]);
                break;
            case '3':
                // Create a token for the authenticated user
                $token = $request->user()->createToken($request->device_name, ['admin:functions'])->plainTextToken;
                // Store the token in the session
                session(['login_token' => $token]);
                break;
            default:
                // Create a token for the authenticated user
                $token = $request->user()->createToken($request->device_name, ['user:functions'])->plainTextToken;
                // Store the token in the session
                session(['login_token' => $token]);
                break;
        }
        //return the token
        return Response::json([
            'token' => $token
        ]);
    });

    Route::middleware('verified')->group(function () {
        Route::get('/go-to-app', [AppRedirectController::class, 'return']);
    });
    // Group Routes
    Route::apiResource('groups', GroupController::class);
    Route::post('groups/{group}/approve-member/{user}', [GroupController::class, 'approveMember']);
    Route::post('groups/{group}/reject-member/{user}', [GroupController::class, 'rejectMember']);
    Route::get('groups/{group}/members', [GroupController::class, 'members']);
    Route::get('groups/{group}/join-requests', [GroupController::class, 'joinRequests']);
    Route::post('groups/{group}/request-to-join', [GroupController::class, 'requestToJoin']);

    Route::apiResource('hikes', HikeController::class);
    Route::post('hikes/register', [HikeController::class, 'registerHike']);

    Route::apiResource('group-hikes', GroupHikeController::class);
    Route::post('group-hike-attendees', [GroupHikeAttendeeController::class, 'store']);
    Route::post('payments', [PaymentController::class, 'store']);

    Route::apiResource('reviews', ReviewController::class);
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::post('users/{id}/follow', [UserController::class, 'follow']);
    Route::post('users/{id}/unfollow', [UserController::class, 'unfollow']);
    Route::get('following', [UserController::class, 'following']);
    Route::get('followers', [UserController::class, 'followers']);

    Route::post('/about', function () {
        return Response::json([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);
    });
    Route::get('/meme', function () {
        return Response::json([
            'message' => 'huh',
        ]);
    });
});
$links = [
    // List of all the API endpoints available
    // 'http://localhost:8000/groups',
    // 'http://localhost:8000/groups/{group}/approve-member/{user}',
    // 'http://localhost:8000/groups/{group}/reject-member/{user}',
    // 'http://localhost:8000/groups/{group}/members',
    // 'http://localhost:8000/groups/{group}/join-requests',
    // 'http://localhost:8000/groups/{group}/request-to-join',
    // 'http://localhost:8000/hikes',
    // 'http://localhost:8000/hikes/register',
    // 'http://localhost:8000/group-hikes',
    // 'http://localhost:8000/group-hike-attendees',
    // 'http://localhost:8000/payments',
    // 'http://localhost:8000/reviews',
];
