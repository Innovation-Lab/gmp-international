<?php

namespace App\Models;

use App\Http\Common\SerializeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SerializeDate;

    protected $fillable = [
        'id',
        'title',
        'content',
        'public',
        'release_datetime',
        'image_path',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getPublicLabelAttribute(): string
    {
        return self::RELEASED[$this->public];
    }

    const PRIVATE = 1;
    const PUBLIC = 2;

    const RELEASED = [
        self::PRIVATE => '非公開',
        self::PUBLIC => '公開',
    ];

    public function getDisplayCreatedAtAttribute()
    {
        return Carbon::parse($this->release_datetime)->format('Y/m/d H:i');
    }

    public function getDisplayImagePathAttribute($display_image_path)
    {
        return asset('img/no-photo/mews.png');
    }

    public function getPreviewImageUrlAttribute()
    {
        return isset($this->image_path)
            ? Storage::disk('s3')->temporaryUrl(config('app.news_image_path').$this->image_path, Carbon::now()->addMinute(30))
            : asset('img/no-photo/news.png');
    }

    /**
     * 公開日付取得
     *
     * @return string
     */
    public function getDisplayReleaseDateAttribute(): string
    {
        return Carbon::parse($this->release_datetime)->format('Y-m-d');
    }

    /**
     * 公開時間取得
     *
     * @return string
     */
    public function getDisplayReleaseTimeAttribute(): string
    {
        return Carbon::parse($this->release_datetime)->format('H:i');
    }

    public function isPublic()
    {
        return $this->public == self::PUBLIC;
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function reads()
    {
        return $this->hasMany('App\Models\Read');
    }
}
