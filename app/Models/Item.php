<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'pedido_id',
        'carta_id',
        'quantidade',
        'preco'
    ];

    public function carta()
    {
        return $this->belongsTo(Carta::class);
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
