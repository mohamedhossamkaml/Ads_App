<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ads_tags extends Model
{
    use HasFactory;
    protected $table    ='ads_tags';
    protected $fillable =
    [
        'ads_id',
        'tags_id',
    ];
}
