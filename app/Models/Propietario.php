<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;


class Propietario extends Model
{
//    use HasFactory;
    protected $fillable = ['nombre','email','telefono'];
}
