<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class MailSendController extends Controller
{
    //mail一覧（送信一覧）
    public function index(Request $request)
    {

        $query = User::where('id', auth()->id())
            ->with(['sentThanks' => function ($q) use ($request) {
                $q->orderBy('created_at', 'desc')
                    ->with(['receiveUser.departmentInfo']);

                // 受信者名の曖昧検索
                if ($request->filled('keyword')) { //リクエストkeywordに含まれているのなら
                    $q->whereHas('receiveUser', function ($subQuery) use ($request) {
                        $subQuery->where('name', 'like', "%{$request->keyword}%");
                    });
                }

                // 受信者の部署での検索
                if ($request->filled('department_id')) {
                    $q->whereHas('receiveUser', function ($subQuery) use ($request) {
                        $subQuery->where('department', $request->department_id);
                    });
                }
            }]);

        $users = $query->get();

        // dd($users->first()->sentThanks->first()->receiveUser);
        // //デバッグ用
        // dd([
        //     'keyword' => $request->keyword,
        //     'department_id' => $request->department_id,
        //     'query' => $query->toSql(),
        //     'bindings' => $query->getBindings(),
        //     'users' => $users,
        // ]);

        $departments = Department::all();

        return view('mailsend', compact('users', 'departments'));
    }
}
