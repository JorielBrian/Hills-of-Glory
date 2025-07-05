<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('first_name', 'desc')->paginate(10);

        return view('dashboard.members', ["members" => $members]);
    }
}
