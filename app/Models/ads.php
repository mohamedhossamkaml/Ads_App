<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    use HasFactory;
    protected $table    ='ads';
    protected $fillable =
    [
        'type',
        'title',
        'description',
        'products',
        'start_date',
        'advertiser_id',
        'category_id',
        'user_id',
    ];

    public function tags()
    {
        return $this->belongsToMany(tags::class , 'ads_tags');
    }
    public function advertiser()
    {
        return $this->hasOne('App\Models\advertiser','id','advertiser_id');
    }
    public function user()
    {
        return $this->hasOne('App\Models\user','id','user_id');
    }
    public function category()
    {
        return $this->hasOne('App\Models\category','id','category_id');
    }

}
