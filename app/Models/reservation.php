<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    protected $fillable = [ 'userId', 'branchId','carPlate','Services','timeSlot','price','date','orderId','status'];
}
