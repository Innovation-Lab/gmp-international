<?php

namespace App\Models;

use App\Traits\GetImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MColor;

class MProduct extends Model
{
    use HasFactory, GetImageTrait;

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
        return $this->hasMany(MColor::class)->withTrashed();
    }
    
    /**
     * @return HasMany
     */
    public function SalesProduct(): HasMany
    {
        return $this->hasMany(SalesProduct::class);
    }
    
    /**
     * @param $color_id
     */
    public function getColorUrl($color_id)
    {
        return $this->hasOne(ColorUrl::class)
            ->where('m_color_id', $color_id)
            ->first();
    }
    
    /**
     * @return mixed
     */
    public function getFirstColorUrlAttribute(): mixed
    {
        return ColorUrl::query()->where('m_product_id', $this->id)
            ->orderBy('id', 'ASC')
            ->first();
    }
    
    /**
     * @return string
     */
    public function getColorAttribute(): string
    {
        $color_array = $this->color_array;
        $colors = explode(',', $color_array);

        $alphabet_name = '';
        if (count($colors) > 0) {
            foreach ($colors as $key => $color) {
                $name = MColor::withTrashed()->find($color)->alphabet_name;
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
     * @return array
     */
    public function getColorBallWithNameAttribute(): array
    {
        $color_array = $this->color_array;
        $colors = explode(',', $color_array);
        
        $ballWithName = [];
        
        if (count($colors) > 0) {
            foreach ($colors as $key => $color) {
                $record = MColor::withTrashed()->find($color);
                $ballWithName[data_get($record,'id')] = [
                    'id' => data_get($record, 'id'),
                    'name' => data_get($record, 'name'),
                    'alphabet_name' => data_get($record, 'alphabet_name'),
                    'color' => data_get($record, 'color'),
                    'second_color' => data_get($record, 'second_color'),
                    'image_path' => data_get($record, 'image_path'),
                    'url' => data_get($record, 'colorUrls.url'),
                ];
            }
        }

        return $ballWithName;
    }
    
    /**
     * @return int
     */
    public function getColorCountAttribute(): int
    {
        $color_array = $this->color_array;
        $colors = explode(',', $color_array);

        return count($colors);
    }
    
    /**
     * @param $id
     * @return bool
     */
    public function isCheckGuide($id): bool
    {
        return isset(self::find($id)->serial_guide_type) && self::find($id)->serial_guide_type;
    }
    
    /**
     * @return string
     */
    public function getMainImageUrlAttribute(): string
    {
        if (!data_get($this, 'image_path')) {
            return asset('img/admin/noImage/product.png');
        } else {
            return $this->getTemporaryImageUrl(data_get($this, 'image_path'));
        }
    }
    
    /**
     * @return array
     */
    public function getSelectTyingColorsAttribute()
    {
        $color_array = explode(',', $this->color_array);
        $colors = MColor::whereIn('id', $color_array)
            ->get()
            ->pluck('name', 'id')
            ->toArray();

        return $colors;
    }
}
