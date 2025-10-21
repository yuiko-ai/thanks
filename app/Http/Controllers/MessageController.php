<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Thanks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('id', '!=', auth()->id())->orderBy('name', 'asc')->get();  // 名前で昇順ソート
        $id = null;
        if ($request->input('id')) {
            $id = $request->input('id');
        }

        return view('message', compact('users', 'id'));
    }

    public function store(StoreMessageRequest $request)
    {

        // バリデーション済みのデータを取得
        $validated = $request->validated();

        try {
            $post = new Thanks(); //行の追加
            $post->send_user_id = auth()->id();
            $post->receive_user_id = $request->receive_name;
            $post->text = $request->message_text;

            if ($post->save()) {
                return redirect()->route('success')->with('success', 'メッセージを送信しました');
            }

        } catch (\Exception $e) {
            Log::error('Message save failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()
                ->with('error', 'メッセージの送信に失敗しました')
                ->withInput();
        }

    }
}
