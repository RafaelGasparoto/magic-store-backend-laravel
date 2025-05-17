<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome',
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
