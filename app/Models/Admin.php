<?php

namespace App\Models;

use App\Traits\GetImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use App\Notifications\Admin\Auth\ResetPasswordNotification;

class Admin extends Authenticatable
{
    use HasFactory, GetImageTrait;

    protected $guarded = [
        'id'
    ];

    const MANAGER = 1;
    const GENERAL = 2;
    const AUTHORITY_LIST = [
        self::MANAGER => '管理者',
        self::GENERAL => '一般',
    ];
    const AUTHORITY_CLASS_LIST = [
        self::MANAGER => 'admin',
        self::GENERAL => 'general',
    ];
    
    /**
     * @return BelongsTo
     */
    public function mShop(): BelongsTo
    {
        return $this->belongsTo(MShop::class);
    }
    
    /**
     * @return bool
     */
    public function isManager()
    {
        return $this->authority == self::MANAGER;
    }

    /**
     * @return string
     * フルネーム（漢字）
     */
    public function getFullNameAttribute(): string
    {
        return $this->last_name.' '.$this->first_name;
    }
    
    /**
     * @return string
     * フルネーム（カナ）
     */
    public function getFullNameKanaAttribute(): string
    {
        return $this->last_name_kana.' '.$this->first_name_kana;
    }
    
    /**
     * @return string
     */
    public function getMainImageUrlAttribute(): string
    {
        if (!data_get($this, 'image_path')) {
            return asset('img/admin/noImage/product.png');
        } else {
            return $this->getTemporaryImageUrl(data_get($this, 'image_path'));
        }
    }
    
    /**
     * @return string
     */
    public function getAuthorityLabelAttribute(): string
    {
        return data_get($this, 'authority') ? self::AUTHORITY_LIST[data_get($this, 'authority')] : '';
    }
    /**
     * @return string
     */
    public function getAuthorityClassAttribute(): string
    {
        return data_get($this, 'authority') ? self::AUTHORITY_CLASS_LIST[data_get($this, 'authority')] : '';
    }
}
