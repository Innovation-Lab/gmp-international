<?php

namespace App\Models;

use App\Http\Common\SerializeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Read extends Model
{
    use HasFactory;
    use SerializeDate;

    protected $fillable = [
        'id',
        'user_id',
        'notification_id',
        'completed',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const COMPLETED = 1;

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function notification()
    {
        return $this->belongsTo('App\Models\Notification');
    }
}
