<?php

namespace App\Http\Controllers;
use App\Models\Mail;

use Illuminate\Http\Request;

class MailSendController extends Controller
{
    //mail一覧（送信一覧）
    public function index()
    {
        $mails = Mail::where('send_user_id', '=', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->with('receiveUser')
                    ->get();
        return view('mailsend', compact('mails'));
    }
}
