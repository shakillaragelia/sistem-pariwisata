<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
    $events = Event::latest()->paginate(12);
    return view('home.event', compact('events'));
    }
}
