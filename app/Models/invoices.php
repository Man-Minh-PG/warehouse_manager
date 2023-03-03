<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    use HasFactory;

    /**
     * status 
     * = 0 is import
     * = 1 is export
     */
    protected $fillable = [
        'id',
        'amount',
        'total',
        'note',
        'status'
    ];
}
