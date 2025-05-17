@extends('base')

@section('content')
<h1 class="mb-4 text-center">Meus Cards</h1>
<div class="row g-4">
    @foreach ($cartas as $item)
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card h-100 shadow-sm">
            <img src="{{ $item->imagem_url }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $item->nome }}</h5>
                <p class="card-text">{{ $item->preco }}</p>
                <p class="card-text">{{ $item->descricao }}</p>
                <p class="card-text">Tipo: {{ $item->tipo->nome }}</p>
                <label>Quantidade:</label>
                <form action="{{ route('carrinho.store') }}" method="POST">
                    @csrf
                    <input type="number" name="quantidade" value="{{ $item->quantidade }}" min="0" max="99" class="form-control mb-2">
                    <input type="hidden" name="carta_id" value="{{ $item->id }}">
                    <input type="hidden" name="preco" value="{{ $item->preco }}">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Comprar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

<style>
    .card .card-img-top {
        object-fit: cover;
        height: 150px;
    }
</style>
@endsection
