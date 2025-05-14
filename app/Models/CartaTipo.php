<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartaTipo extends Model
{
    protected $fillable = [
        'nome',
    ];

    public function cartas()
    {
        return $this->hasMany(Carta::class);
    }
}
