<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class StoreMProductRequest extends FormRequest
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
            'm_brand_id' => 'required',
            'name' => 'required|max:100',
            'name_kana' => 'required|max:100',
        ];
    }
    
    
    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'm_brand_id' => 'ブランド名',
            'name' => '製品名',
            'name_kana' => '製品名（カナ）',
        ];
    }
}
