<?php

namespace App\Models;

use App\Http\Common\SerializeDate;
use App\Http\Common\UtilClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    public function cars()
    {
        return $this->hasMany('App\Models\Car');
    }

    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }

    public function reads()
    {
        return $this->hasMany('App\Models\Read');
    }





    public function getDisplayCreatedAtAttribute()
    {
        return $this->created_at ? Carbon::parse($this->created_at)->format('Y/m/d H:i') : '未設定';
    }
    
    public function getDisplayCountAttribute()
    {
        return $this->cars->count();
    }

    public function getDisplayNameAttribute()
    {
        if ($this->last_name || $this->first_name) {
            return $this->last_name . ' ' . $this->first_name;
        }
        return '未設定';
    }

    public function getDisplayNameKanaAttribute()
    {
        if ($this->last_name_kana || $this->first_name_kana) {
            return $this->last_name_kana . ' ' . $this->first_name_kana;
        }
        return '未設定';
    }

    public function getDisplayEmailAttribute()
    {
        if ( $this->email ) {
            return $this->email;
        }
        return '未設定';
    }

    public function getDisplayTelAttribute()
    {
        if ( $this->tel ) {
            return UtilClass::phone_template_format($this->tel);
        }
        return '未設定';
    }

    public function getDisplayAddressLiveAttribute()
    {
        if ($this->address1 || $this->address2) {
            return $this->address1.' '.$this->address2;
        }
        return '未設定';
    }

    public function getDisplayAddressAttribute()
    {
        if ($this->zipcode || $this->address3 || $this->address4) {
            return $this->zipcode."<br>" .$this->address3."<br>" .$this->address4;
        }
        return '未設定';
    }

    public function getDisplayBirthdayAttribute()
    {
        return $this->birthday ? Carbon::parse($this->birthday)->format('Y/m/d') : '未設定';
    }

    public function getGenderLabelAttribute(): string
    {
        return data_get($this, 'gender') ? self::GENDER_LIST[data_get($this, 'gender')] : '未設定';
    }

    const MALE = 1;
    const FEMALE = 2;
    const GENDER_LIST = [
        self::MALE => '男性',
        self::FEMALE => '女性',
    ];

    public function getFrozenLabelAttribute(): string
    {
        return data_get($this, 'frozen') ? self::FROZEN_LIST[data_get($this, 'frozen')] : '';
    }

    const NORMAL = 1;
    const FROZEN= 2;
    const FROZEN_LIST = [
        self::NORMAL => '',
        self::FROZEN => '凍結',
    ];

    public function isFrozen(): bool
    {
        return $this->frozen == self::FROZEN;
    }

}
