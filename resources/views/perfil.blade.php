@extends('base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Perfil </div>

                <div class="card-body">
                    <h3>Dados pessoais</h3>
                    <p>Nome: {{ $usuario->nome }}</p>


                    <h3>Pedidos</h3>
                    <div class="list-group">
                        @foreach($usuario->pedidos as $pedido)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Pedido nº {{ $pedido->id }}</h5>
                                <small>{{ $pedido->created_at->format('d/m/Y H:i') }}</small>
                            </div>
                            <p class="mb-1">Forma de pagamento: {{ $pedido->forma_pagamento }}</p>
                            <p class="mb-1">Valor total: R$ {{ number_format($pedido->total, 2, ',', '.') }}</p>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
