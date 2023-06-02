<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

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
        $params = $this->request->all();
        Session::put('product', $params);
        
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

    protected function failedValidation(Validator $validator)
    {
        \Session::put('sales_product_id', $this->sales_product_id);

        throw (new ValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }
}