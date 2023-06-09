<?php

namespace App\Models;

use App\Traits\GetImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MColor extends Model
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
    
    
    /**
     * @return HasOne
     */
    public function colorUrls(): HasOne
    {
        return $this->hasOne(ColorUrl::class);
    }
    
    /**
     * @return string
     */
    public function getTypeColorPickerAttribute(): string
    {
        if(data_get($this, 'image_path')){
            $pick = 'mix';
        } else {
            $pick = data_get($this, 'color') && data_get($this, 'second_color') ? 'double' : 'single';
        }
        
        return $pick;
    }
    
    /**
     * @return string
     */
    public function getMainImageUrlAttribute(): string
    {
        if (!data_get($this, 'image_path')) {
            return asset('img/admin/noImage/brand.png');
        } else {
            return $this->getTemporaryImageUrl(data_get($this, 'image_path'));
        }
    }
}
