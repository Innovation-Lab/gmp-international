<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColorRequest extends FormRequest
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
            'alphabet_name' => 'required|max:100',
        ];
    }
    
    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'name' => 'カラー名',
            'alphabet_name' => '英語表記カラー名',
        ];
    }
}
