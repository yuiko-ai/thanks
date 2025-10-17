<?php

namespace App\Http\Controllers;
use App\Models\Mail;
use App\Models\Department;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //mail一覧（受信一覧）
    public function index(Request $request)
    {
        $query = Mail::where('recieve_user_id','=',auth()->id())
                ->orderBy('created_at', 'desc')
                ->with('departmentsInfo.departmentInfo');

        //送信者名の曖昧検索
        if($request->has('keyword') && !empty($request->keyword)){
            $keyword = $request->input('keyword');
            $query->whereHas('departmentsInfo',function ($q) use ($keyword){
                $q->where('name','like',"%{$keyword}%");
            });
        }
        //部署のセレクトボックスの検索
        if ($request->has('department_id') && !empty($request->department_id)) {
            $departmentId = $request->input('department_id');
            $query->whereHas('departmentsInfo.departmentInfo', function ($q) use ($departmentId) {
                $q->where('id', $departmentId);
            });
        }

        $mails = $query->get();

        $departments = Department::all();


        return view('mail',compact('mails','departments'));
    }
}
