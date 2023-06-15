<?php

namespace App\Services\Csv;


final class ExportCsvService
{
    /**
     * @param $fileName
     * @param $header
     * @param $csv
     * @param $type
     * @param bool $headerPull
     */
    public function exportCsv(
        $fileName,
        $header,
        $csv,
        $type,
        bool $headerPull = true
    )
    {
        // ヘッダー諸設定
        date_default_timezone_set('Asia/Tokyo');
        header('content-type: text/csv; charset=SJIS-win');
        header('Cache-Control: public');
        header('Pragma: public');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.$fileName.'.csv"');
        
        $fp = fopen("php://output","w");
        if(config('app.env') !== 'local') {
            stream_filter_append($fp, 'convert.iconv.utf-8/cp932//TRANSLIT');
        }
        
        if($headerPull) {
            fputcsv($fp, $header, ',', '"');
        }
        
        $offset = 0;
        $limit = 30;
        switch($type) {
            case 'user':
                $targets = $this->userCollectionShape($csv, $offset, $limit);
                break;
            case 'sales_product':
                $targets = $this->salesProductCollectionShape($csv, $offset, $limit);
                break;
            case 'product':
                $targets = $this->productCollectionShape($csv, $offset, $limit);
                break;
            case 'brand':
                $targets = $this->brandCollectionShape($csv, $offset, $limit);
                break;
            case 'color':
                $targets = $this->colorCollectionShape($csv, $offset, $limit);
                break;
            case 'shop':
                $targets = $this->shopCollectionShape($csv, $offset, $limit);
                break;
        }

        while ($targets->count() > 0) {
            foreach ($targets as $k => $value) {
                $attribute = [];
                foreach($value as $k => $target ) {
                    foreach ($header as $header_key) {
                        if ($header_key == $k) {
                            $attribute[] = $target;
                        }
                    }
                }
                fputcsv($fp, $attribute, ',', '"');
            }
            // 次のページ
            $offset = $offset + $limit;
            switch($type) {
                case 'user':
                    $targets = $this->userCollectionShape($csv, $offset, $limit);
                    break;
                case 'sales_product':
                    $targets = $this->salesProductCollectionShape($csv, $offset, $limit);
                    break;
                case 'product':
                    $targets = $this->productCollectionShape($csv, $offset, $limit);
                    break;
                case 'brand':
                    $targets = $this->brandCollectionShape($csv, $offset, $limit);
                    break;
                case 'color':
                    $targets = $this->colorCollectionShape($csv, $offset, $limit);
                    break;
                case 'shop':
                    $targets = $this->shopCollectionShape($csv, $offset, $limit);
                    break;
            }
        }
        
        fclose($fp);
        exit;
    }
    
    /**
     * @param $csv
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public function userCollectionShape(
        $csv,
        $offset,
        $limit
    ): mixed
    {
        return $csv->offset($offset)->limit($limit)
            ->get()
            ->map(function($value) {
                return [
                    'id' => data_get($value, 'id'),
                    'メールアドレス' => data_get($value, 'email'),
                    '姓' => data_get($value, 'last_name'),
                    '名' => data_get($value, 'first_name'),
                    'セイ（フリガナ）' => data_get($value, 'last_name_kana'),
                    'メイ（フリガナ）' => data_get($value, 'first_name_kana'),
                    '郵便番号' => data_get($value, 'zip_code'),
                    '都道府県' => data_get($value, 'prefecture'),
                    '市町区村' => data_get($value, 'address_city'),
                    '番地' => data_get($value, 'address_block'),
                    '建物名' => data_get($value, 'address_building'),
                    '電話番号' => data_get($value, 'tel'),
                    'DMフラグ' => data_get($value, 'is_dm'),
                    '管理者メモ' => data_get($value, 'memo'),
                    '削除日' => data_get($value, 'deleted_at'),
                    '作成び' => data_get($value, 'created_at'),
                    '更新日' => data_get($value, 'updated_at'),
                ];
            });
    }
    
    /**
     * @param $csv
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public function productCollectionShape(
        $csv,
        $offset,
        $limit
    ): mixed
    {
        return $csv->offset($offset)->limit($limit)
            ->get()
            ->map(function($value) {
                return [
                    'id' => data_get($value, 'id'),
                    'ブランド名' => data_get($value, 'mBrand.name'),
                    '製品名' => data_get($value, 'name'),
                    '製品名（カナ）' => data_get($value, 'name_kana'),
                    'カラー数' => data_get($value, 'color_count'),
                    'シリアルガイドのタイプ' => data_get($value, 'serial_guide_type'),
                ];
            });
    }
    
    
    /**
     * @param $csv
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public function salesProductCollectionShape(
        $csv,
        $offset,
        $limit
    ): mixed
    {
        return $csv->offset($offset)->limit($limit)
            ->get()
            ->map(function($value) {
                return [
                    'id' => data_get($value, 'id'),
                    'ブランド名' => data_get($value, 'mProduct.mBrand.name'),
                    '商品名' => data_get($value, 'mProduct.name'),
                    'カラー名' => data_get($value, 'select_color_name'),
                    '購入者' => data_get($value, 'user.name'),
                    '購入日' => data_get($value, 'name'),
                    '返品日' => data_get($value, 'name_kana'),
                    '店舗名' => data_get($value, 'select_shop_name'),
                    'シリアルコード' => data_get($value, 'product_code'),
                    '保証期間' => data_get($value, 'warranty_period'),
                    'カラー画像URL' => data_get($value, 'select_color_url'),
                    'メモ' => data_get($value, 'memo'),
                    '削除日' => data_get($value, 'deleted_at'),
                    '作成日' => data_get($value, 'created_at'),
                    '更新日' => data_get($value, 'updated_at'),
                ];
            });
    }
    
    /**
     * @param $csv
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public function brandCollectionShape(
        $csv,
        $offset,
        $limit
    ): mixed
    {
        return $csv->offset($offset)->limit($limit)
            ->get()
            ->map(function($value) {
                return [
                    'id' => data_get($value, 'id'),
                    'ブランド名' => data_get($value, 'name'),
                    '画像URL' => data_get($value, 'main_image_url'),
                    '作成日' => data_get($value, 'created_at'),
                    '更新日' => data_get($value, 'updated_at'),
                ];
            });
    }
    
    /**
     * @param $csv
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public function shopCollectionShape(
        $csv,
        $offset,
        $limit
    ): mixed
    {
        return $csv->offset($offset)->limit($limit)
            ->get()
            ->map(function($value) {
                return [
                    'id' => data_get($value, 'id'),
                    '店舗名' => data_get($value, 'name'),
                    '電話番号' => data_get($value, 'main_image_url'),
                    '郵便番号' => data_get($value, 'zip_code'),
                    '都道府県' => data_get($value, 'prefecture'),
                    '市区町村番地' => data_get($value, 'address_city_block'),
                    '建物名' => data_get($value, 'address_building'),
                    '営業時間１' => data_get($value, 'week_business_hour'),
                    '営業時間１メモ' => data_get($value, 'week_business_hour_memo'),
                    '営業時間２' => data_get($value, 'holiday_business_hour'),
                    '営業時間２メモ' => data_get($value, 'holiday_business_hour_memo'),
                    '作成日' => data_get($value, 'created_at'),
                    '更新日' => data_get($value, 'updated_at'),
                ];
            });
    }
    
    /**
     * @param $csv
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public function colorCollectionShape(
        $csv,
        $offset,
        $limit
    ): mixed
    {
        return $csv->offset($offset)->limit($limit)
            ->get()
            ->map(function($value) {
                return [
                    'id' => data_get($value, 'id'),
                    'カラー名' => data_get($value, 'mBrand.name'),
                    'カラー名（英語表記）' => data_get($value, 'alphabet_name'),
                    'カラー１' => data_get($value, 'color'),
                    'カラー２' => data_get($value, 'second_color'),
                    'カラー画像' => data_get($value, 'main_image_url'),
                    '作成日' => data_get($value, 'created_at'),
                    '更新日' => data_get($value, 'updated_at'),
                ];
            });
    }
}