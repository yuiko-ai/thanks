<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{

    public function index(Request $request)
    {
        $users = User::where('id','!=',auth()->id())->orderBy('name', 'asc')->get();  // 名前で昇順ソート
        $id = null;
        if($request->input('id')){
            $id = $request->input('id');
        }
        return view('message',compact('users','id'));
    }

    public function store(Request $request)
    {

        try {
            $post = new Mail();//行の追加
            $post->send_user_id = auth()->id();
            $post->recieve_user_id = $request->recieve_name;
            $post->text=$request->message_text;

            if($post->save()){
                return redirect()->route('success')->with('success','メッセージを送信しました');
            }

        }catch(\Exception $e) {
            Log::error('Message save failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()
                ->with('error', 'メッセージの送信に失敗しました')
                ->withInput();
        }




    }
}
