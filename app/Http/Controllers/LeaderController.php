<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\Request;
use PDO;

class LeaderController extends Controller
{
    public function index()
    {
        //route --> /dashboard/leaders/
        //fetching all

        //testing only
        //$leaders = Leader::all(); //fetching all leaders
        $leaders = Leader::orderBy('created_at', 'desc')->get(); //fetching all leaders in order by date created
        return view('dashboard.members', ['leaders' => $leaders]);
    }

    public function show($id)
    {
        //route --> /dashboard/leaders/{id}
        //fetching single record
    }

    public function create()
    {
        //route --> /dashboard/leader/create
    }
}
