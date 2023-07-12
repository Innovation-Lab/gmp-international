<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
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
            'name' => 'required|max:100',
            'zip_code' => 'required|size:7|regex:/^[0-9]+$/',
            'prefecture' => 'required',
            'address_city_block' => 'required|max:100',
            'address_building' => 'max:100',
            'tel' => 'required|regex:/^[0-9]{10,11}$/',
        ];
    }
    
    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'name' => '店舗名',
            'zip_code' => '郵便番号',
            'prefecture' => '都道府県',
            'address_city_block' => '市区町村',
            'tel' => '電話番号',
        ];
    }

    public function messages()
    {
        return [
            'prefecture.required' => ':attributeを選択してください。',
        ];
    }
}
