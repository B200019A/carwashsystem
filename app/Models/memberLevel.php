<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memberLevel extends Model
{
    use HasFactory;
    protected $fillable = ['memberLevel', 'targetPoint','discount'];
}
