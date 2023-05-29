<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class MultiStoreProductRequest extends FormRequest
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
        $rules = [];
        $params = $this->request->all();
        $products = $params['products'];
        foreach ($products as $key => $product) {
            $rules["products.$key.purchase_date"] = 'required';
            $rules["products.$key.m_brand_id"] = 'required';
            $rules["products.$key.m_product_id"] = 'required';
        }
        return $rules;
    }
    
    public function attributes()
    {
        return [
            'products.*.purchase_date' => '購入日',
            'products.*.m_brand_id' => 'ブランド',
            'products.*.m_product_id' => '製品',
        ];
    }
    
    public function messages()
    {
        return [
            'products.*.purchase_date.required' => '購入日を入力してください。',
            'products.*.m_brand_id.required' => 'ブランドを選択してください。',
            'products.*.m_product_id.required' => '製品を選択してください。',
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        $params = $this->request->all();
        \Session::put('products', $params['products']);
        
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
