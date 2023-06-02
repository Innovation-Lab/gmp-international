<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAccountRequest extends FormRequest
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
        $rules = [
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore(auth()->id()),
            ],
        ];

        if ($this->filled('password') || $this->filled('password_confirmation')) {
            $rules['password'] = [
                'required',
                'min:6',
                'max:100',
                'regex:/^[a-zA-Z0-9_-]+$/',
            ];
            $rules['password_confirmation'] = [
                'required',
                'same:password',
                'min:6',
                'max:100',
                'regex:/^[a-zA-Z0-9_-]+$/',
            ];
        }
        return $rules;
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
            'password.min' => 'パスワードは6文字以上10文字以下で入力してください',
            'password.max' => 'パスワードは6文字以上10文字以下で入力してください',
            'password_confirmation.min' => 'パスワード(確認用)は6文字以上10文字以下で入力してください',
            'password_confirmation.max' => 'パスワード(確認用)は6文字以上10文字以下で入力してください',
        ];
    }
}
