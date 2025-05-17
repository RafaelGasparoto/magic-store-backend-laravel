@extends('base')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Cadastrar Carta</h1>

    <form action="{{ route('cartas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" required></textarea>
        </div>
        <div class="form-group">
            <label for="imagem_url">Imagem Url</label>
            <input type="text" class="form-control" id="imagem_url" name="imagem_url" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
        </div>
        <div class="form-group">
            <label for="tipo_id">Tipo</label>
            <select class="form-control" id="tipo_id" name="tipo_id" required>
                @foreach ($tipos as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection
