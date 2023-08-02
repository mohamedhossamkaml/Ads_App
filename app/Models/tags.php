<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    use HasFactory;
    protected $table    ='tags';
    protected $fillable =
    [
        'tags_name',
        'description',
    ];

    public function ads()
    {
        return $this->belongsToMany(ads::class , 'ads_tags');
    }

}
