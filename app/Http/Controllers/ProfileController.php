<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import User module
use App\User;

class ProfileController extends Controller
{
	// function profile for web.php
    public function profile($username){
    	// first() return the first of the users with that username
    	$user = User::whereUsername($username)->first();
    	// This will return a json with all the data.->username just return it.
    	// return $user->username;
    	return view('user.profile', compact('user'));


    }
}
