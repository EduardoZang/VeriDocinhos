@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
    <h1 class="title">Lista de Produtos</h1>
    <a href="{{ route('produtos.create') }}">Adicionar Produto</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome_produto }}</td>
                    <td>{{ $produto->categoria_produto }}</td>
                    <td>R$ {{ number_format($produto->preco_produto, 2, ',', '.') }}</td>
                    <td>
                        @if ($produto->imagem_produto)
                            <img src="{{ asset('storage/' . $produto->imagem_produto) }}" alt="Imagem do Produto" width="100">
                        @else
                            <span>Sem Imagem</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection