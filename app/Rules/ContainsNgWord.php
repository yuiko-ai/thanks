<?php

declare(strict_types=1);

namespace App\Rules;

use App\Models\Ngword;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ContainsNgWord implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $ngWords = Ngword::pluck('word')->toArray(); //モデルNgWordモデルのカラム名「word」から引き出し、配列にする
        foreach ($ngWords as $word) {//$ngwordsに入っているデータを一つずつ取り出し、$wordに入れて処理を繰り返す
            if (str_contains($value, $word)) {
                // エラーメッセージを設定
                $fail('メッセージに禁止用語が含まれています。');

                return;
            }
        }
    }
}
