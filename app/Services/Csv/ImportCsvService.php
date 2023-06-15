<?php


namespace App\Services\Csv;

use Carbon\Carbon;
use DB;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\LexerConfig;
use Illuminate\Support\Facades\Storage;
use Str;
use Validator;
use Log;
use Illuminate\Support\Facades\Hash;

class ImportCsvService
{
    /**
     * @param $file_path
     * @return array
     */
    public function preProcess($file_path): array
    {
        // Good by CSVのconfig設定
        $config = new LexerConfig();
        $interpreter = new Interpreter();
        $interpreter->unstrict();
        $lexer = new Lexer($config);
    
        //CharsetをUTF-8に変換、CSVのヘッダー行を無視
        $config->setFromCharset("UTF-8");
        $config->setIgnoreHeaderLine(true);
    
        $dataList = [];
        
        // 新規Observerとして、$dataList配列に値を代入
        $interpreter->addObserver(function (array $row) use (&$dataList){
 
            // 各列のデータを取得
            $dataList[] = $row;
        });
    
        // CSVデータをパース
        $lexer->parse($file_path, $interpreter);
    
        // TMPファイル削除
        unlink($file_path);
        
        return $dataList;
    }
}
