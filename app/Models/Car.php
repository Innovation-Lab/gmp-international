<?php

namespace App\Models;

use App\Http\Common\SerializeDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SerializeDate;

    protected $fillable = [
        'user_id',
        'brand',
        'brand_code',
        'car_name',
        'car_name_code',
        'grade',
        'grade_id',
        'color',
        'model',
        'frame_number',
        'number_plate',
        'displacement',
        'model_year',
        'mileage',
        'inspection_expiration_date',
        'vehicle_inspection_date',
        'photo_path',
    ];


    public function getFillableColumnNames() {
        return $this->fillable;
    }

    public function getDisplayInspExpDateAttribute()
    {
        return Carbon::parse($this->inspection_expiration_date)->format('Y年m月d日');
    }

    public function getDisplayVehiInsDateAttribute()
    {
        return Carbon::parse($this->vehicle_inspection_date)->format('Y年m月d日');
    }

    public function getDisplayCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y/m/d H:i');
    }

    public function getDisplayCarNameBreadAttribute()
    {
        if ( $this->brand || $this->car_name ) {
            return $this->brand.' / '.$this->car_name;
        }
        return '未設定';
    }

    public function getDisplayPhotoPathAttribute()
    {
        // そのまんまURLのまま表示する
        if ( $this->photo_path ) {
            return $this->photo_path;
        }
        return asset('img/no-photo/news.png');
    }

    public function getDisplayMileageAttribute()
    {
        return number_format($this->mileage);
    }

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
