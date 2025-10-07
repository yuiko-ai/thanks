<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //index(ユーザー一覧)
    public function index()
    {
        // $users = User::all();
        // $users = User::with('departmentsInfo')->get();

        $users = User::where('id','!=',auth()->id())
                ->with('departmentsInfo')
                ->get();

        return view('users',compact('users'));
    }
}
