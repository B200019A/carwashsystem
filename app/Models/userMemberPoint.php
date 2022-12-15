<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userMemberPoint extends Model
{
    use HasFactory;
    protected $fillable = ['totalPoint','currentPoint','memberLevel','userId'];
}
