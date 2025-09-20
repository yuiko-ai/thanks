<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * アカウント管理に関するコントローラー
 */
class TestController extends Controller
{
    /**
     * アカウント情報一覧画面を表示
     */
    public function index(Request $request): View
    {
        return view('test');
    }
}
