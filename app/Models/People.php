<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['name', 'mobile_number', 'email', 'description', 'created_by'];
    use HasFactory;
}
