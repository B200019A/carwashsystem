<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userPackageSubscription extends Model
{
    use HasFactory;
    protected $fillable = ['userId','packageId','times','price','paymentStatus'];
}
