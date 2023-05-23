<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MColor;

class MProduct extends Model
{
    use HasFactory;

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
    public function mBrand(): BelongsTo
    {
        return $this->belongsTo(MBrand::class, 'brand_id');
    }

    /**
     * @return HasMany
     */
    public function mColors(): HasMany
    {
        return $this->hasMany(MColor::class);
    }

    /**
     * @return HasOne
     */
    public function SalesProduct(): BelongsTo
    {
        return $this->belongsTo(SalesProduct::class);
    }

    public function getColorAttribute()
    {
        $color_array = $this->color_array;
        $colors = explode(',', $color_array);

        $alphabet_name = '';
        if (count($colors) > 0) {
            foreach ($colors as $key => $color) {
                $name = MColor::find($color)->alphabet_name;
                if ($key == 0) {
                    $alphabet_name = $name;
                } else {
                    $alphabet_name = $alphabet_name.' '.$name;
                }
            }
        }

        return $alphabet_name;
    }
}
