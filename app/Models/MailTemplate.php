<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailTemplate extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'from_address',
        'from_name',
        'title',
        'body',
    ];

    protected $guarded = [
        'id',
    ];
    
}
