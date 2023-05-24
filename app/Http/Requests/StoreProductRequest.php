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
            'purchase_date' => 'required',
            'm_brand_id' => 'required',
            'm_product_id' => 'required',
        ];
    }
    
    public function attributes()
    {
        return [
            'purchase_date' => '購入日',
            'm_brand_id' => 'ブランド',
            'm_product_id' => '製品',
        ];
    }
    
    public function messages()
    {
        return [
            'purchase_date.required' => '購入日を入力してください。',
            '*.required' => ':attributeを選択してください。',
        ];
    }
}
