<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use App\Notifications\Web\ResetPasswordNotification;

class User extends Authenticatable
{
    use HasFactory, Notifiable, softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];
    
    public const CATALOG_STATUS = [
        0 => '受け取らない',
        1 => '受け取る'
    ];
    
    public const DM_STATUS = [
        0 => '受け取らない',
        1 => '受け取る'
    ];
    
    public function sendPasswordResetNotification($token): void
    {
        $url = url("reset-password/{token}");
        $this->notify(new ResetPasswordNotification($token, $this->email));
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * @return HasMany
     * 購入商品
     */
    public function salesProducts(): HasMany
    {
        return $this->hasMany(SalesProduct::class);
    }

    /**
     * フルネーム
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->last_name . ' ' . $this->first_name;
    }
    
    /**
     * フルネーム カナ
     *
     * @return string
     */
    public function getFullNameKanaAttribute(): string
    {
        return $this->last_name_kana . ' ' . $this->first_name_kana;
    }

    /**
     * @return string
     * 住所
     */
    public function getFullAddressAttribute(): string
    {
        return $this->prefecture .' '. $this->address_city .' '. $this->address_block .' '. $this->address_building;
    }
    
    /**
     * @return string
     */
    public function getStringCatalogAttribute(): string
    {
        return isset(self::CATALOG_STATUS[$this->is_catalog]) ? self::CATALOG_STATUS[$this->is_catalog] : '受け取らない';
    }
    
    /**
     * @return string
     */
    public function getStringDmAttribute(): string
    {
        return isset(self::CATALOG_STATUS[$this->is_dm]) ? self::CATALOG_STATUS[$this->is_dm] : '受け取らない';
    }

    /**
     * @return string
     * 電話番号のハイフン表示
     */
    public function getFormattedTelAttribute(): string
    {
        $tel = $this->attributes['tel'];

        if (strlen($tel) === 10) {
            $formatted_tel = substr($tel, 0, 2) . '-' . substr($tel, 2, 4) . '-' . substr($tel, 6, 4);
        } elseif (strlen($tel) === 11) {
            $formatted_tel = substr($tel, 0, 3) . '-' . substr($tel, 3, 4) . '-' . substr($tel, 7, 4);
        } elseif (strlen($tel) === 12) {
            $formatted_tel = substr($tel, 0, 4) . '-' . substr($tel, 4, 4) . '-' . substr($tel, 8, 4);
        }

        return $formatted_tel;
    }
    
    /**
     * @return bool
     */
    public function hasProduct(): bool
    {
        return $this->salesProducts->count() > 0;
    }
}
