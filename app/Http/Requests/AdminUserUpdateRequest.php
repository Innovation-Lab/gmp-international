<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class AdminUserUpdateRequest extends FormRequest
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
    public function rules(Request $request, User $user)
    {
        if ($this->request->get('email')) {
            $user = User::where('email', $this->request->get('email'))->first();
        }
        if ($user && $user->id == $this->request->get('id')) {
            $rules = [
                'last_name' => 'required|max:40|regex:/^[ぁ-んァ-ヶ一-龯０-９Ａ-Ｚａ-ｚ]+$/u',
                'first_name' => 'required|max:40|regex:/^[ぁ-んァ-ヶ一-龯０-９Ａ-Ｚａ-ｚ]+$/u',
                'last_name_kana' => 'required|max:40|regex:/^[ァ-ヶー　]+$/u',
                'first_name_kana' => 'required|max:40|regex:/^[ァ-ヶー　]+$/u',
                'email' => 'required|string|email',
                'tel' => 'required|regex:/^[0-9]{10,11}$/',
                'zip_code' => 'required|size:7|regex:/^[0-9]+$/',
                'prefecture' => 'required',
                'address_city' => 'required|max:100',
                'address_block' => 'required|max:100',
            ];
    
            if ($this->filled('password')) {
                $rules = [
                    'password' => 'required|min:6|max:100|regex:/^[a-zA-Z0-9_-]+$/',
                ];
            }
        } else {
            $rules = [
                'last_name' => 'required|max:40|regex:/^[ぁ-んァ-ヶ一-龯０-９Ａ-Ｚａ-ｚ]+$/u',
                'first_name' => 'required|max:40|regex:/^[ぁ-んァ-ヶ一-龯０-９Ａ-Ｚａ-ｚ]+$/u',
                'last_name_kana' => 'required|max:40|regex:/^[ァ-ヶー　]+$/u',
                'first_name_kana' => 'required|max:40|regex:/^[ァ-ヶー　]+$/u',
                'email' => 'nullable|string|unique:users,email',
                'tel' => 'required|regex:/^[0-9]{10,11}$/',
                'zip_code' => 'required|size:7|regex:/^[0-9]+$/',
                'prefecture' => 'required',
                'address_city' => 'required|max:100',
                'address_block' => 'required|max:100',
            ];
    
            if ($this->filled('password')) {
                $rules['password'] = [
                    'required',
                    'min:6',
                    'max:100',
                    'regex:/^[a-zA-Z0-9_-]+$/',
                ];
            }
        }
        
        return $rules;
    }

    public function attributes()
    {
        return [
            'last_name' => '姓',
            'first_name' => '名',
            'last_name_kana' => 'セイ',
            'first_name_kana' => 'メイ',
            'zip_code' => '郵便番号',
            'prefecture' => '都道府県',
            'address_city' => '市区町村',
            'address_block' => '番地',
            'tel' => '電話番号',
        ];
    }

    public function messages()
    {
        return [
            'last_name.regex' => ':attributeは全角で入力してください。',
            'first_name.regex' => ':attributeは全角で入力してください。',
            'last_name.max' => ':attributeは40文字以内で入力してください。',
            'first_name.max' => ':attributeは40文字以内で入力してください。',
            'last_name_kana.max' => ':attributeは40文字以内で入力してください。',
            'first_name_kana.max' => ':attributeは40文字以内で入力してください。',
            'last_name_kana.regex' => ':attributeは全角カタカナで入力してください。',
            'first_name_kana.regex' => ':attributeは全角カタカナで入力してください。',
            'tel.regex' => ':attributeはハイフンなしで、10桁または11桁の半角数字で入力してください。',
            'prefecture.required' => '都道府県を選択してください。',
        ];
    }
}
