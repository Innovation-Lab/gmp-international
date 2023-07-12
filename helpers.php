<?php

/**
 * 配列変換関数
 *
 * 半角スペース || 全角スペースを配列変換
 */
function space_array_conversion(String $keyword) {
    $half_space_string = mb_convert_kana($keyword, "s"); // 全角スペースを半角スペースに置換
    $search_array = explode(" ", $half_space_string); // 配列に変換
    return $search_array;
}

/**
 * TIME型の表示用
 */
function disp_time_format($value) {
    if (!$value) return '';
    //h:i:s固定のため、先頭の5文字をとる
    return substr($value, 0, 5);
}

/**
 * redirectしたurlを配列に格納
 *
 * @param String $url
 * @return array
 */
function convertMailRedirectUrl(string $url): array
{
    $parse = parse_url($url);
    if (!isset($parse['fragment'])) return [];
    
    $query = parse_url($parse['fragment']) ['query'];
    
    $arr_query = explode('&', $query);
    $result = [];
    foreach ($arr_query as $arr) {
        $d = explode('=', $arr);
        $result[] = [$d[0] => $d[1]];
    }
    
    return array_reduce($result, 'array_merge', array());
}

/**
 * 電話番号の整形
 */
function phone_template_format($input = null): array|string|null
{
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

/**
 * 郵便番号の整形
 */
function format_zip_code ($zipcode = null) {
    if ($zipcode) {
        $zipcode = str_replace("-", "", $zipcode);
        $zipcode = substr($zipcode ,0,3) . "-" . substr($zipcode ,3);
    }
    return $zipcode;
}

/**
 * @param $date
 * @return string|null
 */
function formatYmdSlash($date): ?string
{
    if ($date) {
        return date('Y/m/d', strtotime($date));
    }
    
    return null;
}

/**
 * @param $date
 * @return string|null
 */
function formatHiSlash($date): ?string
{
    if ($date) {
        return date('H:i', strtotime($date));
    }
    
    return null;
}