<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class StoreInformationRequest extends FormRequest
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
        $valid = [];
        $params = $this->request->all();
        $account = Session::get('user_info', []);
        session()->put('user_info', [
            'email' => data_get($account, 'email'),
            'password' => data_get($account, 'password'),
            'last_name' => data_get($params, 'last_name'),
            'first_name' => data_get($params, 'first_name'),
            'last_name_kana' => data_get($params, 'last_name_kana'),
            'first_name_kana' => data_get($params, 'first_name_kana'),
            'zip_code' => data_get($params, 'zip_code'),
            'prefecture' => data_get($params, 'prefecture'),
            'address_city' => data_get($params, 'address_city'),
            'address_block' => data_get($params, 'address_block'),
            'address_building' => data_get($params, 'address_building'),
            'tel' => data_get($params, 'tel'),
            'is_catalog' => data_get($params, 'is_catalog'),
            'is_dm' => data_get($params, 'is_dm', 0)
        ]);
        
        if ($this->request->get('is_skip', 0) != 1) {
            $valid = [
                'last_name' => 'required|max:40|regex:/^[ぁ-んァ-ヶ一-龯０-９Ａ-Ｚａ-ｚ]+$/u',
                'first_name' => 'required|max:40|regex:/^[ぁ-んァ-ヶ一-龯０-９Ａ-Ｚａ-ｚ]+$/u',
                'last_name_kana' => 'required|max:40|regex:/^[ァ-ヶー　]+$/u',
                'first_name_kana' => 'required|max:40|regex:/^[ァ-ヶー　]+$/u',
                'zip_code' => 'required|size:7|regex:/^[0-9]+$/',
                'prefecture' => 'required',
                'address_city' => 'required|max:100',
                'address_block' => 'required|max:100',
                'tel' => 'required|regex:/^[0-9]{10,11}$/',
            ];
        }
        return $valid;
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
