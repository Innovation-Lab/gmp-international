<?php

namespace App\Models;

use App\Traits\GetImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MBrand extends Model
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
    
    
    public const PUBLIC_TEXT = [
        '1' => '公開',
        '2' => '非公開',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /**
     * @return HasMany
     * 商品
     */
    public function mProducts(): HasMany
    {
        return $this->hasMany(MProduct::class);
    }
    
    /**
     * @return string
     */
    public function getMainImageUrlAttribute(): string
    {
        if (!data_get($this, 'image_path')) {
            return asset('img/admin/noImage/brand.png');
        } else {
            return $this->getTemporaryImageUrl(data_get($this, 'image_path'));
        }
    }
    
    /**
     * @param $query
     * @return mixed
     */
    public function scopePublic($query): mixed
    {
        return $query->where('public_flag', '1');
    }
}
