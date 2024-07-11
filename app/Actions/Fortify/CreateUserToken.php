<?php
namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class CreateUserToken
{
    public function __invoke(Request $request, $next)
    {
        // Ensure the user model uses the HasApiTokens trait
        if (! in_array(HasApiTokens::class, class_uses(User::class))) {
            throw new \Exception('User model does not use HasApiTokens trait.');
        }

        // Check the user role
        if ($request->user()->role_id == null) {
            throw new \Exception('User role is not set.');
            // return $next($request);

        }
        // create a user variable
        $role = $request->user()->role_id;
        switch ($role) {
            case 1:
                // Create a token for the authenticated user
                $token = $request->user()->createToken($request->device_name, ['hiker:functions'])->plainTextToken;
                // Store the token in the session
                session(['login_token' => $token]);
                break;
            case 2:
                // Create a token for the authenticated user
                $token = $request->user()->createToken($request->device_name, ['guide:functions'])->plainTextToken;
                // Store the token in the session
                session(['login_token' => $token]);
                break;
            case 3:
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


        // Call the next class in the pipeline
        return $next($request);
    }
}
