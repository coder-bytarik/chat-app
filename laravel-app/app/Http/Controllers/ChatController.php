<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log; // Import the Log facade

class ChatController extends Controller
{
    public function index()
    {
        Log::info('ChatController@index called'); // Add this line
        try {
            // Check if the user has a nickname in the session
            if (!Session::has('nickname')) {
                Log::info('No nickname found in session, redirecting to /'); // Add this line
                return redirect('/'); // Redirect to welcome page if no nickname
            }

            $nickname = Session::get('nickname'); // Get the nickname from the session
            Log::info('Nickname retrieved from session: ' . $nickname); // Add this line

            Log::info('Returning chat view with nickname: ' . $nickname); // Add this line
            return view('chat', ['nickname' => $nickname]); // Pass the nickname to the view
        } catch (\Exception $e) {
            Log::error('Exception in ChatController@index: ' . $e->getMessage()); // Add this line
            throw $e; // Re-throw the exception
        }
    }
}