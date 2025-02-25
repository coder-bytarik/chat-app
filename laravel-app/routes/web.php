<?php
// This line imports the WelcomeController class so you can use it in your route definition
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ChatController; 
use Illuminate\Support\Facades\Route;
//: This line defines a route for the root URL (/)
Route::get('/', [WelcomeController::class, 'index']);
//This route maps the /join URL (using a POST request) to the join method of the WelcomeController.
Route::post('/join', [WelcomeController::class, 'join']);
Route::get('/chat', [ChatController::class, 'index']);
