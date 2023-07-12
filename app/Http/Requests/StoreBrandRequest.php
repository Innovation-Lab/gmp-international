<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
        $previousUrl = $this->headers->get('referer');
        
        if (str_contains($previousUrl, 'edit')) {
            return [
                'name' => 'required|max:100',
            ];
        } else {
            return [
                'name' => 'required|max:100',
                'image_path' => 'required',
            ];
        }
        
    }
    
    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'name' => 'ブランド名',
            'image_path' => 'ブランドロゴ',
        ];

    }

    public function messages()
    {
        return [
            'image_path.required' => ':attributeを登録してください。',
        ];
    }
}
