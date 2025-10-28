<?php

declare(strict_types=1);

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

        $users = User::where('id', '!=', auth()->id())
            ->with('departmentInfo')
            ->get();

        return view('users', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $isAdmin = $request->input('is_admin');

        $user->is_admin = $isAdmin;
        $user->save();

        return back()->with('success', $user->name . 'さんの権限を更新しました');
    }
}
