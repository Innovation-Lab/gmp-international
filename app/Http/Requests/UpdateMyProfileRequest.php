<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMyProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'nullable|min:8|max:16|regex:/^[a-zA-Z0-9]+$/',
            'name' => 'required|string',
        ];

    }

    public function attributes()
    {
        return [
            'email' => 'ID',
            'password' => '新しいパスワード',
            'name' => '名前',
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'パスワードは半角英数字で入力してください',
            'password.min' => 'パスワードは8文字以上16文字以下で入力してください',
            'password.max' => 'パスワードは8文字以上16文字以下で入力してください',
        ];
    }
}
