<?php


use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Login route
Route::post('/login', function (Request $request) {
    $user = \App\Models\User::where('email', $request->email)->first();

    if (! $user || ! \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    return response()->json([
        'token' => $user->createToken('api-token')->plainTextToken,
    ]);
});



//no token required
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{job}', [JobController::class, 'show']);

//token required
Route::middleware('auth:sanctum')->group(function ()
{

  Route::post('/jobs', [JobController::class, 'store']);
  Route::put('/jobs/{job}', [JobController::class, 'update']);
  Route::delete('/jobs/{job}', [JobController::class, 'destroy'] );

  Route::apiResource('/applications', ApplicationController::class);

});


