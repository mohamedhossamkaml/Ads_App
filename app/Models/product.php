<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table    ='products';
    protected $fillable =
    [
        'products_name',
        'description',
        'category_id',
    ];

    public function category()
    {
        return $this->hasOne('App\Models\category','id','category_id');
    }
}
