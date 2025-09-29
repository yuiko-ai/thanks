<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //index(ユーザー一覧)
    public function index()
    {
        $users = User::all();

        return view('users',compact('users'));
    }
}
