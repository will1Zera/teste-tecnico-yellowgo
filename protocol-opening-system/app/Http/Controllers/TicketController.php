<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function create(){
        return view('ticket.create');
    }
}
