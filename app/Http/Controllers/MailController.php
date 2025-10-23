<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Thanks;
use App\Models\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //mail一覧（受信一覧）
    public function index(Request $request)
    {
        // $query = Thanks::where('receive_user_id', '=', auth()->id())
        //     ->orderBy('created_at', 'desc')
        //     ->with('sendUser.departmentInfo');

        // //送信者名の曖昧検索
        // if ($request->has('keyword') && ! empty($request->keyword)) {
        //     $keyword = $request->input('keyword');
        //     $query->whereHas('sendUser', function ($q) use ($keyword) {
        //         $q->where('name', 'like', "%{$keyword}%");
        //     });
        // }
        // //部署のセレクトボックスの検索
        // if ($request->has('department_id') && ! empty($request->department_id)) {
        //     $departmentId = $request->input('department_id');
        //     $query->whereHas('sendUser.departmentInfo', function ($q) use ($departmentId) {
        //         $q->where('id', $departmentId);
        //     });
        // }

        $query = User::where('id', auth()->id())
            ->with(['receivedThanks' => function ($q) use ($request) {
                $q->orderBy('created_at', 'desc')
                    ->with(['sendUser.departmentInfo']);

                //送信者名の曖昧検索
                if ($request->filled('keyword')) {
                    $q->whereHas('sendUser', function ($subQuery) use ($request) {
                        $subQuery->where('name', 'like', "%{$request->keyword}%");
                    });
                }

                if ($request->filled('department_id')) {
                    $q->whereHas('sendUser', function ($subQuery) use ($request) {
                        $subQuery->where('department_id', $request->department_id);
                    });
                }

            }]);

        $users = $query->get();

        $departments = Department::all();

        //部署名をidと紐付け
        // $departmentNames = Department::pluck('name', 'id')->toArray();

        return view('mail', compact('users', 'departments'));
    }
}
