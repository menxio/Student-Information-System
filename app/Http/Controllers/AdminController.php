<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct(User $user)
    {
        $user->isAdmin();
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}

