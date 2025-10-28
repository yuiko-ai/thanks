<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Thanks;
use Illuminate\Http\Request;

class AllMailController extends Controller
{
    //Allカード一覧
    public function index(Request $request)
    {

        $query = Thanks::with('sendUser.departmentInfo', 'receiveUser.departmentInfo')
            ->orderBy('created_at', 'desc');

        // キーワード検索（送信者名 OR 受信者名）
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->whereHas('sendUser', function ($subQuery) use ($request) {
                    $subQuery->where('name', 'like', "%{$request->keyword}%");
                })
                    ->orWhereHas('receiveUser', function ($subQuery) use ($request) {
                        $subQuery->where('name', 'like', "%{$request->keyword}%");
                    });
            });
        }

        // 部署検索（送信者の部署 OR 受信者の部署）
        if ($request->filled('department_id')) {
            $query->where(function ($q) use ($request) {
                $q->whereHas('sendUser', function ($subQuery) use ($request) {
                    $subQuery->where('department_id', $request->department_id);
                })
                    ->orWhereHas('receiveUser', function ($subQuery) use ($request) {
                        $subQuery->where('department_id', $request->department_id);
                    });
            });
        }

        $thanks = $query->get();

        $departments = Department::all();

        return view('mailall', compact('thanks', 'departments'));
    }
}
