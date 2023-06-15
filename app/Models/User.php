<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
     * 最初に登録した製品
     * @return HasOne
     */
    public function firstSalesProduct(): HasOne
    {
        return $this->hasOne(SalesProduct::class)
            ->orderBy('created_at');
    }
    
    
    /**
     * @return HasMany
     * 購入者の選択表示
     */
    public function getSelectUserAttribute()
    {
        return $this->getFullNameAttribute() . ' （会員番号：' . $this->id . '）';
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
        return $this->prefecture . $this->address_city . $this->address_block . $this->address_building;
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
        } else {
            $formatted_tel = '';
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

    /**
     * 登録製品件数
     */
    public function getProductCountAttribute()
    {
        return $this->salesProducts->count();
    }
    
    /**
     * @return int
     * その他の登録製品
     */
    public function getOtherProductCountAttribute(): int
    {
        return $this->salesProducts->count() -1;
    }
    
    /**
     * @return array|mixed
     * 各ユーザーが最初に登録した製品
     */
    public function getFirstProductAttribute(): mixed
    {
        $sales_product = $this->salesProducts
            ->sortBy('created_at')
            ->first();

        return data_get($sales_product, 'mProduct');
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
    
            $query->orderBy('users.id', 'ASC');
    
            $query->where(function ($query) use ($search_array) {
                foreach ($search_array as $search_word) {
                    $query->where(function ($query) use ($search_word) {
                        $query->where('users.last_name', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('users.first_name', 'LIKE', '%' . $search_word . '%')
                            ->whereRaw("CONCAT(users.first_name, ' ', users.last_name) LIKE '%" . $search_word . "%'")
                            ->orWhereRaw("REPLACE(CONCAT(users.last_name, users.first_name), ' ', '') LIKE ?", ["%{$search_word}%"])
                            ->orWhere('users.last_name_kana', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('users.first_name_kana', 'LIKE', '%' . $search_word . '%')
                            ->whereRaw("CONCAT(users.last_name_kana, ' ', users.first_name_kana) LIKE '%" . $search_word . "%'")
                            ->orWhereRaw("REPLACE(CONCAT(users.last_name_kana, users.first_name_kana), ' ', '') LIKE ?", ["%{$search_word}%"])
                            ->orWhere('users.zip_code', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('users.prefecture', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('users.address_city', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('users.address_block', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('users.address_building', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('users.tel', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('users.email', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('users.is_dm', 'LIKE', '%' . $search_word . '%')
                            ->orWhereHas('salesProducts', function ($query) use ($search_word) {
                                $query->whereHas('mProduct', function ($query) use ($search_word) {
                                    $query->where('name', 'LIKE', '%' . $search_word . '%');
                                })->orWhereHas('mProduct.mBrand', function ($query) use ($search_word) {
                                    $query->where('name', 'LIKE', '%' . $search_word . '%');
                                });
                            });
                    });
                }
            });
        }

        return $query;
    }

    /**
     * @param $query
     * @param $request
     * 絞り込み検索
     */
    public function scopeFilter($query, $request)
    {
        if ($request->filled('name')) {
            $name = $request->input('name');
            $query->where(function ($query) use ($name) {
                $query->where('users.last_name', 'LIKE', "%{$name}%")
                    ->orWhere('users.first_name', 'LIKE', "%{$name}%")
                    ->orWhereRaw("CONCAT(users.last_name, ' ', users.first_name) LIKE ?", ["%{$name}%"])
                    ->orWhereRaw("REPLACE(CONCAT(users.last_name, users.first_name), ' ', '') LIKE ?", ["%{$name}%"]);
            });
        }

        if ($request->filled('kana')) {
            $kana = $request->input('kana');
            $query->where(function ($query) use ($kana) {
                $query->where('users.last_name_kana', 'LIKE', "%{$kana}%")
                    ->orWhere('users.first_name_kana', 'LIKE', "%{$kana}%")
                    ->orWhereRaw("CONCAT(users.last_name_kana, ' ', users.first_name_kana) LIKE ?", ["%{$kana}%"])
                    ->orWhereRaw("REPLACE(CONCAT(users.last_name_kana, users.first_name_kana), ' ', '') LIKE ?", ["%{$kana}%"]);
            });
        }

        if ($request->filled('tel')) {
            $query->where('users.tel', 'LIKE', '%' . $request->input('tel') . '%');
        }

        if ($request->filled('email')) {
            $query->where('users.email', 'LIKE', '%' . $request->input('email') . '%');
        }

        if ($request->filled('registr_number1')) {
            $query->whereHas('salesProducts', function ($subQuery) use ($request) {
                $subQuery->where('users.registr_number1', 'LIKE', '%' . $request->input('registr_number1') . '%');
            });
        }

        if ($request->filled('registr_number2')) {
            $query->whereHas('salesProducts', function ($subQuery) use ($request) {
                $subQuery->where('users.registr_number2', 'LIKE', '%' . $request->input('registr_number2') . '%');
            });
        }

        if ($request->filled('registr_number3')) {
            $query->whereHas('salesProducts', function ($subQuery) use ($request) {
                $subQuery->where('users.registr_number3', 'LIKE', '%' . $request->input('registr_number3') . '%');
            });
        }

        if ($request->filled('purchase_date_from')) {
            $query->whereHas('salesProducts', function ($subQuery) use ($request) {
                $subQuery->whereDate('purchase_date', '>=', $request->input('purchase_date_from'));
            });

        }

        if ($request->filled('purchase_date_to')) {
            $query->whereHas('salesProducts', function ($subQuery) use ($request) {
                $subQuery->whereDate('purchase_date', '<=', $request->input('purchase_date_to'));
            });
        }

        if ($request->filled('m_brand_id')) {
            $query->whereHas('salesProducts', function ($subQuery) use ($request) {
                $subQuery->whereHas('mProduct', function ($subSubQuery) use ($request) {
                    $subSubQuery->where('m_brand_id', $request->input('m_brand_id'));
                });
            });
        }

        if ($request->filled('m_product_id')) {
            $query->whereHas('salesProducts', function ($subQuery) use ($request) {
                    $subQuery->where('m_product_id', $request->input('m_product_id'));
                });
        }

        if ($request->filled('is_dm')) {
            $query->where('users.is_dm', $request->input('is_dm'));
        }
    }
}