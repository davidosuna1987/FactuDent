<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // Display a landing page for active clients.
    public function index()
    {
        $user = \Auth::user();
        return view('admin.index')->with(['user' => $user]);
    }
}
