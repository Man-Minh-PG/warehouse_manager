<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class acccount_historys extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'content',
        'user_id',
        'status'
    ];
}
