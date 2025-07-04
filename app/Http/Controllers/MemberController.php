<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('created_at', 'desc')->paginate(8);

        return view('dashboard.members', ["members" => $members]);
    }
}
