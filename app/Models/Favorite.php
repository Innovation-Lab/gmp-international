<?php

namespace App\Models;

use App\Http\Common\SerializeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SerializeDate;

    protected $fillable = [
        'id',
        'user_id',
        'code',
        'type',
        'client_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const CLIENT = 0;
    const BLOG = 1;
    const COUPON = 2;

    const TYPE = [
        self::CLIENT => 'client',
        self::BLOG => 'blog',
        self::COUPON => 'coupon',
    ];


    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
