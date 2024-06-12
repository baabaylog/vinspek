<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stub extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_id',
        'inspector_id',
        'order_id',
        'name',
        'amount',
        'received',
        'paid',
        'status',
    ];
}
