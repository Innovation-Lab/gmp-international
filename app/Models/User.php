<?php

namespace App\Models;

use App\Http\Common\SerializeDate;
use App\Http\Common\UtilClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;
use App\Notifications\Api\Auth\ResetPasswordNotification;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    use SerializeDate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'tel',
        'password',
        'firebase_uid',
        'last_name',
        'first_name',
        'last_name_kana',
        'first_name_kana',
        'gender',
        'birthday',
        'zipcode',
        'address1',
        'address2',
        'address3',
        'address4',
        'jititai_id',
        'jititai_name',
        'profile_image_path',
        'ios_token',
        'android_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'gender' => 'int',
    ];

    public function sendPasswordResetNotification($token): void
    {
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
}
