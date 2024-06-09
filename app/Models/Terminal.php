<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;
    protected $table = 'tbl_terminal';
    protected $primaryKey = 'term_id';
    protected $fillable = [
     'term_name',
     'term_location',
     'term_status',
    ];
}
