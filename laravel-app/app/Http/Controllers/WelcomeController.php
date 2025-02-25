<?php

namespace App\Http\Controllers;
// Imports the Request class, which allows you to access the data submitted in the form.
use Illuminate\Http\Request;
// Imports the Session facade, which allows you to store data in the user's session. 
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{   
    //This code defines a simple index method that returns the welcome view.
    public function index()
    {
        return view('welcome');
    }

    //Defines the join method, which takes a Request object as input
    public function join(Request $request)
    {
        // Validate the nickname
        //Validates the incoming request data. In this case, it checks that the nickname field is present, is a string, and has a maximum length of 255 characters.
        $request->validate([
            'nickname' => 'required|string|max:255',
        ]);

        // Stores the value of the nickname field in the user's session with the key nickname
        Session::put('nickname', $request->input('nickname'));

        // Redirect to the chat screen (we'll create this later)
        return redirect('/chat');
    }




}
