<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'last_name' => 'required|max:40|regex:/^[^\x01-\x7E\xA1-\xDF]+$/',
            'first_name' => 'required|max:40|regex:/^[^\x01-\x7E\xA1-\xDF]+$/',
            'last_name_kana' => 'required|max:20|regex:/^[ァ-ヶー　]+$/u',
            'first_name_kana' => 'required|max:20|regex:/^[ァ-ヶー　]+$/u',
            'zip_code' => 'required|size:7|regex:/^[0-9]+$/',
            'prefecture' => 'required|max:255',
            'address_city' => 'required|max:255',
            'address_block' => 'required|max:255',
            'tel' => 'required|regex:/^[0-9]{10,11}$/',
        ];
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
            'tel.regex' => ':attributeはハイフンなしで、10〜11桁の半角数字で入力してください。',
            'prefecture.required' => '都道府県を選択してください。',
        ];
    }
}