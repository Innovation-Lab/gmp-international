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
        
        return data_get($this, 'mColor.alphabet_name', '未登録');
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
        
        return data_get($this, 'mShop.name', '未登録');
    }
    
    /**
     * @return bool
     */
    public function hasSerialSpace(): bool
    {
        return data_get($this, 'product_code') || !empty(data_get($this, 'mProduct.serial_guide_type'));
    }
    
    /**
     * @param $query
     * @param $request
     * キーワード検索
     */
    public function scopeKeyword($query, $request)
    {
        if ($request->get('keyword')) {
            $half_space_string = mb_convert_kana($request->get('keyword'), 's');
            $search_array = explode(' ', $half_space_string);

            $query->orderBy('sales_products.id', 'ASC');

            $query->where(function ($query) use ($search_array) {
                foreach ($search_array as $search_word) {
                    $query->where(function ($query) use ($search_word) {
                        $query->where('sales_products.product_code', 'LIKE', '%' . $search_word . '%')

                            // mProductを紐付け
                            ->orWhereHas('mProduct', function ($query) use ($search_word) {
                                // 製品名
                                $query->where('m_products.name', 'LIKE', '%' . $search_word . '%');

                            // mProductのmBrandを紐付け
                            })->orWhereHas('mProduct.mBrand', function ($query) use ($search_word) {
                                // ブランド名
                                $query->where('m_brands.name', 'LIKE', '%' . $search_word . '%');

                            // mProductのmColorを紐付け
                            })->orWhereHas('mColor', function ($query) use ($search_word) {
                                // カラー名
                                $query->where('m_colors.name', 'LIKE', '%' . $search_word . '%')
                                // カラー名（英語）
                                    ->orWhere('m_colors.alphabet_name', 'LIKE', '%' . $search_word . '%');

                            // mShopを紐付け
                            })->orWhereHas('mShop', function ($query) use ($search_word) {
                                // 購入店舗名
                                $query->where('m_shops.name', 'LIKE', '%' . $search_word . '%');

                            // userを紐付け
                            })->orWhereHas('user', function ($query) use ($search_word) {
                                // 購入者名
                                $query->where('users.last_name', 'LIKE', '%' . $search_word . '%')
                                    ->orWhere('users.first_name', 'LIKE', '%' . $search_word . '%')
                                    ->orWhereRaw("CONCAT(users.last_name, ' ', users.first_name) LIKE ?", ['%' . $search_word . '%'])
                                    ->orWhereRaw("REPLACE(CONCAT(users.last_name, ' ', users.first_name), ' ', '') LIKE ?", ['%' . $search_word . '%']);
                            });
                    });
                }
            });
        }
    }

    /**
     * @param $query
     * @param $request
     * 絞り込み検索
     */
    public function scopeFilter($query, $request)
    {
        // ブランド名
        if ($request->filled('m_brand_id')) {
            // mProductの紐付け
            $query->whereHas('mProduct', function ($subQuery) use ($request) {
                $subQuery->whereIn('m_brand_id', $request->input('m_brand_id', []));
            });
        }
        // 製品名
        if ($request->filled('m_product_id')) {
                $query->whereIn('m_product_id', $request->input('m_product_id', []));
        }
        // 店舗名
        if ($request->filled('m_shop_id')) {
                $query->whereIn('m_shop_id', $request->input('m_shop_id', []));
        }
        // カラー
        if ($request->filled('m_color_id')) {
                $query->whereIn('m_color_id', $request->input('m_color_id', []));
        }
    }
}