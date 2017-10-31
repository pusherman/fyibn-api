<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Users extends Controller
{
    function me(Request $request)
    {
        return $request->user();
    }

    function view(Request $request)
    {
        return User::findOrFail($request->id);
    }
}
