<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = 'tbl_bus';
    protected $primaryKey = 'bus_id';
    protected $fillable = [
     'bus_code',
     'bus_type',
     'bus_seats',
     'bus_status'
    ];
}
