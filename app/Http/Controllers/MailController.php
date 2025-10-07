<?php

namespace App\Http\Controllers;
use App\Models\Mail;

use Illuminate\Http\Request;

class MailController extends Controller
{
    //mail一覧（受信一覧）
    public function index()
    {
        $mails = Mail::where('recieve_user_id','=',auth()->id())
                ->with('departmentsInfo')
                ->get();

        return view('mail',compact('mails'));
    }
}
