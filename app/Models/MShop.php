<?php

namespace App\Models;

use App\Traits\GetImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MShop extends Model
{
    use HasFactory, GetImageTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * @return HasMany
     */
    public function mProducts(): HasMany
    {
        return $this->hasMany(MProduct::class);
    }

    /**
     * @return HasMany
     */
    public function salesProduct(): HasMany
    {
        return $this->hasMany(SalesProduct::class);
    }
    
    /**
     * @return string
     */
    public function getFullAddressAttribute(): string
    {
        return $this->prefecture .' '. $this->address_city_block .' '.$this->address_building;
    }
    
    
    /**
     * todo 店舗用のNoイメージ画像を用意
     * @return string
     */
    public function getMainImageUrlAttribute(): string
    {
        if (!data_get($this, 'image_path')) {
            return asset('img/admin/noImage/store.png');
        } else {
            return $this->getTemporaryImageUrl(data_get($this, 'image_path'));
        }
    }
    
    /**
     * @return string[]
     */
    public function getWeekBusinessWorkArrayAttribute(): array
    {
        return explode('~', data_get($this, 'week_business_hour'));
    }
    
    /**
     * @return string[]
     */
    public function getHolidayBusinessWorkArrayAttribute(): array
    {
        return explode('~', data_get($this, 'holiday_business_hour'));
    }
}
