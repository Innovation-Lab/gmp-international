<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'm_product_id' => 'required',
            'shop_id' => 'required',
        ];
    }
    
    public function attributes()
    {
        return [
            'm_product_id' => '商品',
            'shop_id' => '店舗',
        ];
    }
    
    public function messages()
    {
        return [
            '*.required' => ':attributeを選択してください。',
        ];
    }
}
