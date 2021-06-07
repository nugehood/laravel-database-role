<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    use HasFactory;

    protected $table = 'flowers';
    protected $fillable = ['name', 'real_name', 'habitat', 'img'];
}
