<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'tbl_booking';
    protected $primaryKey = 'booking_id';
    protected $fillable = [
     'route_id',
     'booking_firstname',
     'booking_surname',
     'booking_email',
     'booking_contact',
     'booking_seats',
     'booking_code',
     'booking_status',
    ];
}
