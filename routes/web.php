<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', [WelcomeController::class, 'index']);

Route::resource('/jobs', JobController::class);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::post('/jobs/{job}/up-vote', [JobController::class, 'upVote'])->name('jobs.upvote')->middleware('auth');
Route::post('/jobs/{job}/down-vote', [JobController::class, 'downVote']) ->name('jobs.downvote')->middleware('auth');

// Route::get('/login/github', [LoginController::class, 'login'])->name('github');
// Route::get('/login/github/redirect', [LoginController::class, 'login'])->name('githubRedirect');


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
});
Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::where('github_id', $githubUser->id)->first();

    if ($user) {
        $user->update([
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    }

    Auth::login($user);

    return redirect('/jobs');
});
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    $token = $user->token;
    $refreshToken = $user->refreshToken;
    $expiresIn = $user->expiresIn;
});