<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'guest_number',
        'res_date',
        'tel_number',
        'table_id',
        'email'
    ];

    protected $date = [
        'res_date'
    ];

    function table(){
        return $this->belongsTo(Table::class);
    }
}
