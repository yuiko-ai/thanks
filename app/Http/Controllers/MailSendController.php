<?php

namespace App\Http\Controllers;
use App\Models\Mail;
use App\Models\Department;
use Illuminate\Http\Request;

class MailSendController extends Controller
{
    //mail一覧（送信一覧）
    public function index(Request $request)
    {
        $query = Mail::where('send_user_id', '=', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->with('receiveUser.departmentInfo');

        //送信者名の曖昧検索
        if($request->has('keyword') && !empty($request->keyword)){
            $keyword = $request->input('keyword');
            $query->whereHas('receiveUser',function ($q) use ($keyword){
                $q->where('name','like',"%{$keyword}%");
            });
        }

        //部署のセレクトボックスの検索
        if ($request->has('department_id') && !empty($request->department_id)) {
            $departmentId = $request->input('department_id');
            $query->whereHas('receiveUser.departmentInfo', function ($q) use ($departmentId) {
                $q->where('id', $departmentId);
            });
        }

        $mails = $query->get();

        $departments = Department::all();
        return view('mailsend', compact('mails','departments'));
    }
}
