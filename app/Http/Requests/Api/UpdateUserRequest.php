<?php

namespace App\Http\Requests\Api;

use App\Http\Common\UtilClass;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Request;

class UpdateUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        return [
            'email' => 'nullable|string|unique:users,email,'.$request->user()->id.',id,deleted_at,NULL',
            'tel' => 'nullable|string|max:12|unique:users,tel,'.$request->user()->id.',id,deleted_at,NULL',
            'password' => 'nullable|string|min:8|max:16|regex:/^[a-zA-Z0-9]+$/'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'メールアドレス',
            'tel' => '電話番号',
            'password' => 'パスワード',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'すでに使用されているメールアドレスです',
            'tel.unique' => 'すでに使用されている電話番号です',
            'password.regex' => 'パスワードは半角英数字で入力してください',
            'password.min' => 'パスワードは8文字以上16文字以下で入力してください',
            'password.max' => 'パスワードは8文字以上16文字以下で入力してください',
        ];
    }

    /**
     * バリデーション失敗時
     *
     * @param Validator $validator
     * @return void
     */
    public function failedValidation( Validator $validator )
    {
        throw new HttpResponseException(
            response()->json(
                UtilClass::formatResponseData(
                    422,
                    $validator->errors()->toArray()
                )
            )
        );
    }
}
