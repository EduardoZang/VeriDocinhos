<!--Questão 03-->
<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Relatório de Produtos</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome_produto }}</td>
                    <td>{{ $produto->categoria_produto }}</td>
                    <td>{{ $produto->preco_produto}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>