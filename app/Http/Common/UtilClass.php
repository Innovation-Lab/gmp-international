<?php

namespace App\Http\Common;

class UtilClass
{
    /**
     * APIのレスポンスで返す配列
     *
     * @param [type] $data
     * @param [type] $status_code
     * @param [type] $message
     * @return void
     */
    public static function formatResponseData($status_code, $message, $data = null)
    {
        return [
            'data' => $data ?: [],
            'status_code' => $status_code,
            'message' => $message,
        ];
    }

    /**
     * 電話番号の整形
     */
    public static function phone_template_format($input = null): array|string|null
    {
        // ハイフン消す
        $input = str_replace("-", "", $input);
        //変数宣言
        $category = array(
            "normal" => "/^0[^346]\d{8}$/",
            "mobile" => "/^\d{11}$/",
            "tokyo"  => "/^0[346]\d{7}$/",
            "none"   => "/^\d{7}$/",
        );
        $pattern = array(
            "normal" => "/(\d{3})(\d{3})(\d{4})/",
            "mobile" => "/(\d{3})(\d{4})(\d{4})/",
            "tokyo"  => "/(\d{2})(\d{3})(\d{4})/",
            "none"   => "/(\d{3})(\d{4})/",
        );
        $rep = array(
            "normal" => "$1-$2-$3",
            "none"   => "$1-$2",
        );

        //携帯なら
        if(preg_match($category['mobile'],$input)) {
            $result = preg_replace($pattern['mobile'],$rep['normal'],$input);
        }
        //市外局番2桁なら
        elseif(preg_match($category['tokyo'],$input)) {
            $result = preg_replace($pattern['tokyo'],$rep['normal'],$input);
        }
        //普通の市外局番なら
        elseif(preg_match($category['normal'],$input)) {
            $result = preg_replace($pattern['normal'],$rep['normal'],$input);
        }
        //市外局番なしなら
        elseif(preg_match($category['none'],$input)) {
            $result = preg_replace($pattern['none'],$rep['none'],$input);
        }
        //その他なら
        else {
            $result = $input;
        }

        return $result;
    }
}
