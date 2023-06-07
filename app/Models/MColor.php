<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MColor extends Model
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
}
