<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesProduct extends Model
{
    use HasFactory, SoftDeletes;

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
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function mShop(): BelongsTo
    {
        return $this->belongsTo(MShop::class);
    }

    /**
     * @return BelongsTo
     */
    public function mProduct(): BelongsTo
    {
        return $this->belongsTo(MProduct::class);
    }

    /**
     * @return BelongsTo
     */
    public function mColor(): BelongsTo
    {
        return $this->belongsTo(MColor::class);
    }

    /**
     * @return BelongsTo
     */
    public function mBrand(): BelongsTo
    {
        return $this->belongsTo(MBrand::class);
    }
    
    /**
     * @return array|mixed
     */
    public function getSelectColorNameAttribute(): mixed
    {
        if (
            data_get($this, 'other_color_name') &&
            (!data_get($this, 'm_color_id') ||
            data_get($this, 'm_color_id') == '9999999')
        ) {
            return data_get($this, 'other_color_name');
        }
        
        return data_get($this, 'mColor.alphabet_name', 'カラーは選択されていません。');
    }
    
    /**
     * @return array|mixed
     */
    public function getSelectShopNameAttribute(): mixed
    {
        if (
            data_get($this, 'other_shop_name') &&
            (!data_get($this, 'm_shop_id') ||
            data_get($this, 'm_shop_id') == '9999999')
        ) {
            return data_get($this, 'other_shop_name');
        }
        
        return data_get($this, 'mShop.name', '店舗は選択されていません。');
    }
}
