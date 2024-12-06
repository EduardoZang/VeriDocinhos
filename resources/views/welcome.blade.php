<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veri Docinhos</title>
    
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: 700;
        }

        nav {
            background-color: #f8f9fa;
            padding: 15px;
            margin-top: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 1.1rem;
        }

        nav ul li a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        main {
            flex-grow: 1; 
            margin-top: 40px;
            text-align: center;
        }

        main p {
            font-size: 1.2rem;
            color: #333;
            margin-top: 20px;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    
    <header>
        <h1>Bem-vindo ao Veri Docinhos</h1>
    </header>
    <main>
        <nav>
            <ul>
                <li><a href="{{ route('produtos.index') }}">Gerenciar Produtos</a></li>
                <li><a href="{{ route('clientes.index') }}">Gerenciar Clientes</a></li>
                <li><a href="{{ route('pedidos.index') }}">Gerenciar Pedidos</a></li>
            </ul>
        </nav>
        <p>Use as opções acima para navegar pelo sistema.</p>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Veri Docinhos</p>
    </footer>
</body>
</html>