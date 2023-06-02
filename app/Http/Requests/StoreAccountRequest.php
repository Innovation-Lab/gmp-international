<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|max:100|regex:/^[a-zA-Z0-9_-]+$/',
            'password_confirmation' => 'required|same:password|min:6|max:100|regex:/^[a-zA-Z0-9_-]+$/'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password_confirmation' => 'パスワード(確認用)',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'すでに使用されているメールアドレスです',
            'password.regex' => 'パスワードは半角英数字で入力してください',
            'password.min' => 'パスワードは6文字以上で入力してください',
            'password.max' => 'パスワードは6文字以上で入力してください',
        ];
    }
}
