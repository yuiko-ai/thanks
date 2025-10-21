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

        // $query = User::with(['sentThanks' => function ($q) {
        //     $q->where('send_user_id', '=', auth()->id())
        //         ->orderBy('created_at', 'desc')
        //         ->with(['receiveUser.department']);
        // }]);

        // // 送信者名の曖昧検索
        // if ($request->has('keyword') && ! empty($request->keyword)) {
        //     $query->whereHas('receivedThanks.receiveUser', function ($q) use ($request) {
        //         $q->where('name', 'like', "%{$request->keyword}%");
        //     });
        // }

        // // 部署での検索
        // if ($request->has('department_id') && ! empty($request->department_id)) {
        //     $query->whereHas('receivedThanks.receiveUser', function ($q) use ($request) {
        //         $q->where('department', $request->department_id);
        //     });
        // }

        $query = User::where('id', auth()->id())
            ->with(['sentThanks' => function ($q) use ($request) {
                $q->orderBy('created_at', 'desc')
                    ->with(['receiveUser.department']);

                // 受信者名の曖昧検索
                if ($request->filled('keyword')) { //リクエストkeywordに含まれているのなら
                    $q->whereHas('receiveUser', function ($subQuery) use ($request) { //$qはsentThanksで
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

        // デバッグ用
        // dd([
        //     'keyword' => $request->keyword,
        //     'department_id' => $request->department_id,
        //     'query' => $query->toSql(),
        //     'bindings' => $query->getBindings(),
        //     'users' => $users->toArray(),
        // ]);

        $departments = Department::all();

        //部署名をidと紐付け
        $departmentNames = Department::pluck('name', 'id')->toArray();

        // dd($users);

        return view('mailsend', compact('users', 'departments', 'departmentNames'));
    }
}
