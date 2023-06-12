<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreAdminAccountRequest extends FormRequest
{
    protected $redirect = 'admin/accounts';
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
     * @return array
     */
    public function rules()
    {
        if (!$this->request->get('id')) {
            $rules = [
                'last_name' => 'required|max:40',
                'first_name' => 'required|max:40',
                'm_shop_id' => 'required',
                'last_name_kana' => 'max:20|regex:/^[ァ-ヾ 　〜ー−]+$/u',
                'first_name_kana' => 'max:20|regex:/^[ァ-ヾ 　〜ー−]+$/u',
                'email' => 'required|string|max:255|unique:admins',
                'password' => 'required|nullable|max:100',
                'password_confirmation' => 'required|nullable|same:password|max:100',
            ];
        } else {
            if ($this->request->get('change-password')) {
                $rules = [
                    'last_name' => 'required|max:40',
                    'first_name' => 'required|max:40',
                    'm_shop_id' => 'required',
                    'last_name_kana' => 'required|max:40|regex:/^[ァ-ヾ 　〜ー−]+$/u',
                    'first_name_kana' => 'required|max:40|regex:/^[ァ-ヾ 　〜ー−]+$/u',
                    'email' => 'required|string|max:255',
                    'password' => 'required|nullable|max:100',
                    'password_confirmation' => 'required|nullable|same:password|max:100',
                ];
            } else {
                $rules = [
                    'last_name' => 'required|max:40',
                    'first_name' => 'required|max:40',
                    'm_shop_id' => 'required',
                    'last_name_kana' => 'required|max:40|regex:/^[ァ-ヾ 　〜ー−]+$/u',
                    'first_name_kana' => 'required|max:40|regex:/^[ァ-ヾ 　〜ー−]+$/u',
                    'email' => 'required|string|max:255',
                ];
            }
        }

        return $rules;
    }
    
    public function messages()
    {
        return [
            '*.required' => ':attributeを入力してください。',
            '*.integer' => ':attributeは整数で入力してください。',
            '*.regex' => ':attributeは全角カタカナで入力してください。',
            'last_name.max' => ':attributeは40文字以内で入力してください。',
            'first_name.max' => ':attributeは40文字以内で入力してください。',
            'last_name_kana.max' => ':attributeは40文字以内で入力してください。',
            'first_name_kana.max' => ':attributeは40文字以内で入力してください。',
        ];
    }
    
    public function attributes()
    {
        $attributes = [
            'password' => 'パスワード',
            'password_confirmation' => 'パスワード確認用',
            'last_name' => '姓',
            'first_name' => '名',
            'last_name_kana' => 'セイ',
            'first_name_kana' => 'メイ',
            'm_shop_id' => '所属店舗',
            'email' => 'メールアドレス',
        ];
        
        return $attributes;
    }
    
    /**
     * Get the URL to redirect to on a validation error.
     *
     * @return string
     */
    protected function getRedirectUrl()
    {
        $url = $this->redirector->getUrlGenerator();
        if ($this->action_method_key) {
            return $url->to($this->redirect).'?'.$this->action_method_key;
        }
        
        return $url->previous();
    }
}
