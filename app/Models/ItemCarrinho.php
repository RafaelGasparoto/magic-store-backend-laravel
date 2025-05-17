<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCarrinho extends Model
{
    protected $fillable = [
        'carrinho_id',
        'carta_id',
        'quantidade',
        'preco'
    ];

    public function carta()
    {
        return $this->belongsTo(Carta::class);
    }

    public function carrinho()
    {
        return $this->belongsTo(Carrinho::class);
    }
}
