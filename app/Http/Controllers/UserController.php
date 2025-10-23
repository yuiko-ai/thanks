<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    //index(ユーザー一覧)
    public function index()
    {
        // $users = User::all();
        // $users = User::with('departmentsInfo')->get();

        $users = User::where('id', '!=', auth()->id())
            ->with('departmentInfo')
            ->get();

        return view('users', compact('users'));
    }
}
