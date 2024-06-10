<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'tbl_customer';
    protected $primaryKey = 'cust_id';
    protected $fillable = [
     'cust_firstname',
     'cust_lastname',
     'cust_username',
     'cust_password',
     'cust_pic',
     'cust_status',
    ];
}
