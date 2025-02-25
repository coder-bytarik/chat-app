<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function index()
    {
        // Check if the user has a nickname in the session
        if (!Session::has('nickname')) {
            return redirect('/'); // Redirect to welcome page if no nickname
        }

        return view('chat');
    }
}