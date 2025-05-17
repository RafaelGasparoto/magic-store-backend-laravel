@extends('base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Carrinho</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th>SubTotal</th>
                                    <th>Remover</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($items))
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->carta->nome }}</td>
                                        <td>{{ $item->quantidade }}</td>
                                        <td>R$ {{ number_format($item->preco, 2, ',', '.') }}</td>
                                        <td>R$ {{ number_format($item->quantidade * $item->preco, 2, ',', '.') }}</td>
                                        <td>
                                            <form action="{{ route('item-carrinho.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Remover</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                        <p>Valor Total: R$ {{ isset($total) ? number_format($total, 2, ',', '.') : '0.00' }}</p>

                        <form action="{{ route('pedido.comprar') }}" method="post">
                            @csrf
                            <label for="forma_pagamento">Forma de Pagamento:</label>
                            <select id="forma_pagamento" name="forma_pagamento">
                                <option value="boleto">Boleto</option>
                                <option value="cartao">Cartão de Crédito</option>
                            </select>
                            <button type="submit">Pagar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
