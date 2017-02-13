<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
    function me(Request $request) {
        return $request->user();
    }
}
