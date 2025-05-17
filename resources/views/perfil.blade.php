@extends('base')

@section('content')
<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil</div>

                <div class="card-body">
                    <h3>Dados pessoais</h3>
                    <p>Nome: {{ $usuario->nome }}</p>

                    <h3>Pedidos</h3>
                    <div class="list-group">
                        @foreach($usuario->pedidos as $pedido)
                            <a href="#" class="list-group-item list-group-item-action"
                               data-bs-toggle="collapse"
                               data-bs-target="#pedido-{{ $pedido->id }}"
                               aria-expanded="false"
                               aria-controls="pedido-{{ $pedido->id }}">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Pedido nº {{ $pedido->id }}</h5>
                                    <small>{{ $pedido->created_at->format('d/m/Y H:i') }}</small>
                                </div>
                                <p class="mb-1">Forma de pagamento: {{ $pedido->forma_pagamento }}</p>
                                <p class="mb-1">Valor total: R$ {{ number_format($pedido->total, 2, ',', '.') }}</p>
                            </a>
                            <div class="collapse mb-4" id="pedido-{{ $pedido->id }}">
                                <div class="card card-body">
                                    <h3>Itens do pedido</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Quantidade</th>
                                                <th>Preço</th>
                                                <th>SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pedido->items as $item)
                                            <tr>
                                                <td>{{ $item->carta->nome }}</td>
                                                <td>{{ $item->quantidade }}</td>
                                                <td>R$ {{ number_format($item->preco, 2, ',', '.') }}</td>
                                                <td>R$ {{ number_format($item->quantidade * $item->preco, 2, ',', '.') }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
