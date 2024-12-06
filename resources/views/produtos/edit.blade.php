@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
    <h1 class="title">Editar Produto</h1>
    <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="nome_produto">Nome do Produto:</label>
        <input type="text" name="nome_produto" id="nome_produto" value="{{ $produto->nome_produto }}" required><br>

        <label for="descricao_produto">Descrição:</label>
        <textarea name="descricao_produto" id="descricao_produto" required>{{ $produto->descricao_produto }}</textarea><br>

        <label for="preco_produto">Preço:</label>
        <input type="number" name="preco_produto" id="preco_produto" step="0.01" value="{{ $produto->preco_produto }}" required><br>

        <label for="categoria_produto">Categoria:</label>
        <select name="categoria_produto" id="categoria_produto" required>
            <option value="Bolos" {{ $produto->categoria_produto == 'Bolos' ? 'selected' : '' }}>Bolos</option>
            <option value="Salgados" {{ $produto->categoria_produto == 'Salgados' ? 'selected' : '' }}>Salgados</option>
            <option value="Docinhos" {{ $produto->categoria_produto == 'Docinhos' ? 'selected' : '' }}>Docinhos</option>
            <option value="Outros" {{ $produto->categoria_produto == 'Outros' ? 'selected' : '' }}>Outros</option>
        </select><br>

        <label for="imagem_produto">Imagem do Produto:</label>
        <input type="file" name="imagem_produto" id="imagem_produto" accept="image/*"><br>
        @if ($produto->imagem_produto)
            <p>Imagem atual:</p>
            <img src="{{ asset('storage/' . $produto->imagem_produto) }}" alt="Imagem do Produto" width="150">
        @endif

        <button type="submit">Salvar</button>
    </form>
@endsection