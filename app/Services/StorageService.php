<?php

namespace App\Services;

use Carbon\Carbon;
use PDF;

class StorageService
{
    
    /**
     * @param $file
     * @return array|mixed|string|string[]
     */
    public static function storeFile($file): mixed
    {
        $today = Carbon::now();
        $year = $today->year;
        $month = str_pad($today->month, 2, "0", STR_PAD_LEFT);
        $path = 'public/img/' . $year . "/" . $month;
        
        $store_path = $file->store($path);
    
        return str_replace('public/', 'storage/', $store_path);
    }
    
    /**
     * @param $pdf
     * PDFを保存し、読み込みパスを返却
     * @param $file_name
     * @return array|string|string[]
     */
    public static function storePDF($pdf, $file_name): array|string
    {
        $today = Carbon::now();
        $year = $today->year;
        $month = str_pad($today->month, 2, "0", STR_PAD_LEFT);
        $store_path = "public/csv/{$year}/{$month}/{$file_name}";
        
        \Storage::disk('local')->put($store_path, $pdf->output());
        
        return str_replace('public/', '/storage/', $store_path);
    }
    
    /**
     * @param $file
     * ファイルをアップロードし、読み込みパスを返却
     * @return string
     */
    public static function storeCsvFile($file): string
    {
        $tmpName = date('YmdHis').".".$file->guessExtension(); //TMPファイル名
        $file->move(storage_path()."/csv/tmp",$tmpName);
        
        return storage_path()."/csv/tmp/".$tmpName;
    }
}
