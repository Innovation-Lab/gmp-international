<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $admin_id = $this->admin_id ?? null;
        if ( $admin_id ) {
            // こっちが編集の時
            return [
                'authority' => 'required|integer|in:1,2',
                'email' => 'required|string|email:filter,dns|max:100|unique:admins,email,'.$this->admin_id.',id',//|email:strict,dns,spoof',
                'password' => 'nullable|min:8|max:16|regex:/^[a-zA-Z0-9]+$/',
                'name' => 'required|max:20|string',
            ];
        }
        return [
            'authority' => 'required|integer|in:1,2',
            'email' => 'required|email:filter,dns|string|max:100|unique:admins,email',
            'password' => 'required|min:8|max:16|regex:/^[a-zA-Z0-9]+$/',
            'name' => 'required|max:20|string',
        ];

    }

    public function attributes()
    {
        return [
            'authority' => '権限',
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
