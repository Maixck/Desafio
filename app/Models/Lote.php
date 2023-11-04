<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lote extends Model
{
    public function ciudad(): HasOne
    {
        return $this->hasOne(Ciudad::class, 'id', 'ciudad_id');
    }

    public function propietario(): HasOne
    {
        return $this->hasOne(Propietario::class, 'id', 'propietario_id');
    }
//    public $timestamps = false;
    protected $fillable = ['codigo','valor','ciudad_id', 'propietario_id'];
}
