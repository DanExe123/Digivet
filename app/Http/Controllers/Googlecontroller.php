<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function googlePage()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function googleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $existingUser = User::where('google_id', $user->id)->first();
            
            if ($existingUser) {
                Auth::login($existingUser);
                return redirect()->route('dashboard');
            }

            $existingEmailUser = User::where('email', $user->email)->first();
            
            if ($existingEmailUser) {
                $existingEmailUser->update(['google_id' => $user->id]);
                Auth::login($existingEmailUser);
                 return redirect()->route('dashboard');
            }

            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => bcrypt('123456dummy')
            ]);

            Auth::login($newUser);
            return redirect()->route('dashboard');
        } catch (Exception $e) {
            // Log the error message instead of using dd()
            \Log::error('Error during Google login: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Unable to login using Google. Please try again.');
        }
    }
}
