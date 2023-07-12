<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

trait GetImageTrait
{
    //<img src="">の場合
    public function getImage($url)
    {
        return $this->getTemporaryImageUrl($url);
    }

    //<div style="">の場合
    public function getImageStyle($url)
    {
        return 'background: url(' . $this->getTemporaryImageUrl($url) . ');';
    }

    // URL取得
    public function getImageUrl($url)
    {
        return Storage::disk('s3')->url($url);
    }

    // 一時URL取得
    public function getTemporaryImageUrl($url)
    {
        return Storage::disk('s3')->temporaryUrl($url, Carbon::now()->addMinute(10));
    }

    // 存在確認
    public function exists($url)
    {
        return Storage::disk('s3')->exists($url);
    }
}
