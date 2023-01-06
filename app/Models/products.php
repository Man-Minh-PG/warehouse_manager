<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class products extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'price',
        'unit_id',
        'product_id',
        'amount',
        'status'
    ];
}
