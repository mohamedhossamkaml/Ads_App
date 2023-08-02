<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advertiser extends Model
{
    use HasFactory;
    protected $table    ='advertisers';
    protected $fillable =
    [
        'advertiser_name',
        'description'
    ];
}
