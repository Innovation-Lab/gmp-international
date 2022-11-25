<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class UpdateNotificationRequest extends FormRequest
{

    /**
     *  rules()の前に実行される
     *       $this->merge(['key' => $value])を実行すると、
     *       フォームで送信された(key, value)の他に任意の(key, value)の組み合わせをrules()に渡せる
     */
    public function getValidatorInstance()
    {
        $release_datetime = Carbon::parse($this->input('release_date').' '.$this->input('release_time'))->format('Y-m-d H:i:s');

        $this->merge([
            'release_datetime' => $release_datetime,
        ]);

        return parent::getValidatorInstance();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:3000',
            'public' => 'required|integer',
            'release_date' => 'required',
            'release_time' => 'required',
            'release_datetime' => 'required|date',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'content' => '内容',
            'public' => '公開設定',
            'release_date' => '日付',
            'release_time' => '時間',
            'release_datetime' => '公開日時',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'release_datetime.after_or_equal' => ':attributeは現在日時以降を選択してください'
    //     ];
    // }
}
