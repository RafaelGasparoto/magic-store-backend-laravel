<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'usuario_id',
        'quantidade_itens',
        'forma_pagamento',
        'total'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
