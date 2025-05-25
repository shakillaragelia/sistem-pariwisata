<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $event=event::all();
        return view('home.event', compact('event'));
    }
}
