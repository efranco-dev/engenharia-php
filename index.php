<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integrando PHP com HTML</title>
</head>
<body>
    <h1>Integrando PHP com HTML</h1>
</body>
</html>


<?php
// Exemplo de integração de PHP com HTML
echo "<p>Este é um parágrafo gerado pelo PHP.</p>";

//operadores logicos

$email = "m@gmail.com";
$senha = "123456";

if($email == "m@gmail.com" && $senha == "123456") {
    echo "<p>Login bem-sucedido!</p>";
} else {
    echo "<p>Credenciais inválidas.</p>";
}


?>