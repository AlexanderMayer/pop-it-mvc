<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_phone extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_phone';
    protected $guarded = [];
}