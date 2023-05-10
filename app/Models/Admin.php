<?php

namespace App\Models;

use App\Http\Common\SerializeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use App\Notifications\Admin\Auth\ResetPasswordNotification;

class Admin extends Authenticatable
{
    use HasFactory,SoftDeletes;
    use Notifiable;
    use SerializeDate;

    protected $fillable = [
        'name',
        'email',
        'password',
        'authority',
    ];

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token, $this->email));
    }

    public function getDisplayCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y/m/d H:i');
    }

    public function getAuthorityLabelAttribute(): string
    {
        return data_get($this, 'authority') ? self::AUTHORITY_LIST[data_get($this, 'authority')] : '';
    }

    const MANAGER = 1;
    const GENERAL = 2;
    const AUTHORITY_LIST = [
        self::MANAGER => '管理者',
        self::GENERAL => '一般',
    ];

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
}
