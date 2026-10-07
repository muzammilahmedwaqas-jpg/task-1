<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $members = User::where('is_admin', false)->with('documents')->get();
        return view('admin.dashboard',compact('members'));
    }

    public function show(User $member)
    {
        $member->load('documents');

        return view('admin.member_detail', compact('member'));
    }
}
