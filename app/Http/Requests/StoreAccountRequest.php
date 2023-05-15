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
            'email' => 'required|email',
            'password' => 'required|min:6|max:10|regex:/^[a-zA-Z0-9]+$/',
            'password_confirmation' => 'required|same:password|min:6|max:10|regex:/^[a-zA-Z0-9]+$/'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'メールアドレス',
            'tel' => '電話番号',
            'password' => 'パスワード',
            'password_confirmation' => 'パスワード（確認用）',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'すでに使用されているメールアドレスです',
            'tel.unique' => 'すでに使用されている電話番号です',
            'password.regex' => 'パスワードは半角英数字で入力してください',
            'password.min' => 'パスワードは6文字以上10文字以下で入力してください',
            'password.max' => 'パスワードは6文字以上10文字以下で入力してください',
        ];
    }
}
