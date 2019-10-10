<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;

class MapsController extends Controller
{
    public function index()
    {
        return view('admin.maps', compact('tickets'));
    }

    public function getPoints()
    {
        $tickets = Ticket::all("latitude","longitude");

        return response()->json($tickets);
    }
}
