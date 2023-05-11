<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesProduct extends Model
{
    use HasFactory, SoftDeletes, Sortable;

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
}
