<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'tbl_feedback';
    protected $primaryKey = 'fb_id';
    protected $fillable = [
     'fb_fname',
     'fb_surname',
     'fb_email',
     'fb_message',
    ];
}
