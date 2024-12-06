@extends('layouts.app')

@section('title', 'Adicionar Produto')

@section('content')
    <h1 class="title">Adicionar Produto</h1>
    <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nome_produto">Nome do Produto:</label>
        <input type="text" name="nome_produto" id="nome_produto" required><br>

        <label for="descricao_produto">Descrição:</label>
        <textarea name="descricao_produto" id="descricao_produto" required></textarea><br>

        <label for="preco_produto">Preço:</label>
        <input type="number" name="preco_produto" id="preco_produto" step="0.01" required><br>

        <label for="categoria_produto">Categoria:</label>
        <select name="categoria_produto" id="categoria_produto" required>
            <option value="Bolos">Bolos</option>
            <option value="Salgados">Salgados</option>
            <option value="Docinhos">Docinhos</option>
            <option value="Outros">Outros</option>
        </select><br>

        <label for="imagem_produto">Imagem do Produto:</label>
        <input type="file" name="imagem_produto" id="imagem_produto" accept="image/*"><br>

        <button type="submit">Salvar</button>
    </form>
@endsection