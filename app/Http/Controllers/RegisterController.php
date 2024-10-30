<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;
class RegisterController extends Controller
{
    //

    protected $createNewUser;

    public function __construct(CreateNewUser $createNewUser)
    {
        $this->createNewUser = $createNewUser;
    }

    

    public function register(Request $request)
    {
        $user = $this->createNewUser->create($request->all());

        // After successful registration, redirect to the login page
        return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
    }

    public function index()
    {
        // Fetch only users with the 'client' role
        $users = User::role('client')->get();
    
        return view('admin.AdminClientAccountList', compact('users'));
    }

}
