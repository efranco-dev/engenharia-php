<?php
// Função para calcular o preço com desconto
function calcularDesconto($preco, $desconto) {
    return $preco - ($preco * ($desconto / 100));
}

// Lista de produtos e preços
$produtos = [
    "Notebook" => 3500,
    "Smartphone" => 2000,
    "Tablet" => 1500,
    "Mesa de Escritorio" => 1500
];

$descontoFixo = 20; // Desconto de 10%
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Desconto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: #fff;
            margin: 10px auto;
            padding: 15px;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
    <h2>Simulador de Preços com Desconto</h2>
    <ul>
        <?php
        foreach ($produtos as $produto => $preco) {
            $precoComDesconto = calcularDesconto($preco, $descontoFixo);
            echo "<li><strong>$produto</strong><br>
            De <del>R$ ".number_format($preco, 2, ',', '.')."</del> 
            por <span style='color: green; font-weight: bold;'>R$ ".number_format($precoComDesconto, 2, ',', '.')."</span></li>";
        }
        ?>
    </ul>
</body>
</html>
