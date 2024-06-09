<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;
    protected $table = 'tbl_route';
    protected $primaryKey = 'route_id';
    protected $fillable = [
     'term_id_from',
     'term_id_to',
     'bus_id',
     'route_departure_time',
     'route_departure_date',
     'route_code',
     'route_status',
    ];
}
