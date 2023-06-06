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
    
    public const GUIDE = [
        1 => 'coco', // COCOシリーズ
        2 => 'cube', // CUBEシリーズ
        3 => 'gowalker', // gowalkerシリーズ
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
        return $this->belongsTo(MBrand::class);
    }

    /**
     * @return HasMany
     */
    public function mColors(): HasMany
    {
        return $this->hasMany(MColor::class);
    }
    
    /**
     * @return HasMany
     */
    public function SalesProduct(): HasMany
    {
        return $this->hasMany(SalesProduct::class);
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
    
    /**
     * @param $id
     * @return bool
     */
    public function isCheckGuide($id): bool
    {
        return isset(self::find($id)->serial_guide_type) && self::find($id)->serial_guide_type;
    }
}
