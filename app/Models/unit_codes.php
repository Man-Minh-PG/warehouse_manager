<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unit_codes extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'status',
    ];
}
