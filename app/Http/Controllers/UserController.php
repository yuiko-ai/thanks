<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;

class UserController extends Controller
{
    //index(ユーザー一覧)
    public function index()
    {
        // $users = User::all();
        // $users = User::with('departmentsInfo')->get();

        $users = User::where('id', '!=', auth()->id())
            ->with('department')
            ->get();

        // dd([
        //     'users' => $users->toArray(),
        //     'first_user' => $users->first(),
        //     'first_user_department' => $users->first()->department,
        // ]);

        $departmentNames = Department::pluck('name', 'id')->toArray();

        return view('users', compact('users', 'departmentNames'));
    }
}
