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
        return match ($this->request->get('colorSet_type') ){
            'single' => [
                'color' => 'required',
                'name' => 'required|max:100',
                'alphabet_name' => 'required|max:100'
            ],
            'double' => [
                'color' => 'required',
                'second_color' => 'required',
                'name' => 'required|max:100',
                'alphabet_name' => 'required|max:100'
            ],
            default => [
                'name' => 'required|max:100',
                'alphabet_name' => 'required|max:100',
                'image_path' => 'required'
            ]
        };

    }
    
    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'color' => 'カラー',
            'second_color' => 'カラー２',
            'image_path' => 'パターン画像',
            'name' => 'カラー名',
            'alphabet_name' => '英語表記カラー名',
        ];
    }
    
    public function messages()
    {
        return [
            'color.required' => ':attributeを入力してください。',
            'second_color.required' => ':attributeを入力してください。',
            'image_path.required' => ':attributeを登録してください。',
        ];
    }
    
}
