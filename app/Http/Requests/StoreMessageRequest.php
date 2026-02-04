<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\ContainsNgWord;
use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //テキストに255文字以上入力したらバリデーション表示
            'receive_name' => ['required', 'exists:users,id'],
            'message_text' => ['required', 'max:255', new ContainsNgWord],
        ];
    }

    public function messages()
    {
        return [
            'receive_name.required' => '送り先を選択してください',
            'receive_name.exists' => '選択された送り先が無効です',
            'message_text.required' => '送り先を選択してください',
            'message_text.max' => 'メッセージは255文字以内で入力してください',
        ];
    }

    public function attributes(): array
    {
        return [
            'receive_name' => '送り先',
            'message_text' => 'メッセージ',
        ];
    }
}
