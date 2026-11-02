<?php
// Função para exibir produtos
function mostrarProdutos($produtos) {
    foreach ($produtos as $produto => $dados) {
        echo "<li><strong>$produto</strong><br>Preço: R$ ".number_format($dados['preco'], 2, ',', '.') . "<br>Estoque: " . $dados['quantidade'] . " unidades</li>";
    }
}

// Função para adicionar um produto ao carrinho
function adicionarAoCarrinho(&$carrinho, $nome_produto, $quantidade) {
    if (!isset($carrinho[$nome_produto])) {
        $carrinho[$nome_produto] = 0;
    }
    $carrinho[$nome_produto] += $quantidade;
}


// Função para calcular o valor total do carrinho
function calcularTotal($carrinho, $produtos) {
    $total = 0;
    foreach ($carrinho as $nome_produto => $quantidade) {
        $total += $produtos[$nome_produto]['preco'] * $quantidade;
    }
    return $total;
}

// Função para aplicar um desconto ao carrinho
function aplicarDesconto($total, $percentualDesconto) {
    return $total - ($total * ($percentualDesconto / 100));
}

// Produtos disponíveis
$produtos = [
    'Notebook' => ['preco' => 3500, 'quantidade' => 10],
    'Smartphone' => ['preco' => 2000, 'quantidade' => 15],
    'Tablet' => ['preco' => 1500, 'quantidade' => 20],
];

// Carrinho de compras (inicialmente vazio)
$carrinho = [];

// Adicionando produtos ao carrinho
adicionarAoCarrinho($carrinho, 'Notebook', 2);
adicionarAoCarrinho($carrinho, 'Smartphone', 1);

// Calculando o total
$total = calcularTotal($carrinho, $produtos);

// Aplicando um desconto de 10%
$totalComDesconto = aplicarDesconto($total, 10);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Produtos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #4CAF50;
            font-size: 2em;
            margin-bottom: 20px;
        }
        ul {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            list-style: none;
            padding: 0;
        }
        li {
            background: #fff;
            margin: 10px;
            padding: 20px;
            width: 250px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s ease;
        }
        li:hover {
            transform: scale(1.05);
        }
        .produto-info {
            margin: 10px 0;
            color: #555;
        }
        .total {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            font-size: 18px;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-top: 20px;
        }
        .desconto {
            color: #FF6347;
            font-size: 20px;
        }
        .carrinho {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .carrinho ul {
            width: 300px;
            padding: 0;
            margin: 0;
        }
        .carrinho li {
            background-color: #e6f7e6;
            margin: 10px 0;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Catálogo de Produtos</h2>
    <ul>
        <?php mostrarProdutos($produtos); ?>
    </ul>
    <div class="carrinho">
        <h3>Resumo do Carrinho</h3>
        <ul>
            <?php
            foreach ($carrinho as $produto => $quantidade) {
                echo "<li>$produto: $quantidade unidade(s)</li>";
            }
            ?>
        </ul>
        <p class="total">Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></p>
        <p class="total desconto">Total com Desconto: R$ <?php echo number_format($totalComDesconto, 2, ',', '.'); ?></p>
    </div>
</body>
</html>