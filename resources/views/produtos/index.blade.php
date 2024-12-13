@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
    <h1 class="title">Lista de Produtos</h1>

    <!--Questão 01: !-->
    <div class="row mb-4">
        <form action="{{ route('produtos.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-3">
                    <select name="tipo" class="form-select">
                        <option value="nome_produto">Nome</option>
                        <option value="categoria_produto">Categoria</option>
                    </select>
                </div>
                <div class="col-4">
                    <input type="text" name="valor" class="form-control" placeholder="Digite o valor para busca...">
                </div>

                <div class="col-5">
                    <button type="submit" class="btn btn-dark">Buscar</button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div class="mb-5">
        <a target="_blank" href="{{ route('produtos.relatorio') }}" class="btn btn-info">Gerar Relatório</a>
    </div>
<br>
    <a href="{{ route('produtos.create') }}">Adicionar Produto</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Imagem</th>
                <th>Status<th> <!--Questão 04-->
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
                    <!--Questão 04-->
                    <td>
                        @if($produto->status == 1)
                            <span>Disponível</span>
                        @else
                            <span>Indisponível</span>
                        </td>
                        @endif
                    <td>
                        <a href="{{ route('produtos.alterarStatus', $produto->id) }}">Alterar Status</a>
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