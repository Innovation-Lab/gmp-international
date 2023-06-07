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
            return asset('img/admin/brand/airbuggy.svg');
        } else {
            return $this->getTemporaryImageUrl(data_get($this, 'image_path'));
        }
    }
}
