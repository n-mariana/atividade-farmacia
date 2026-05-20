<?php

$servidor = "localhost";
$banco = "farmacia";
$usuario = "root";
$senha = "";

try {

    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco",
        $usuario,
        $senha
    );

} catch(PDOException $erro) {

    echo "Erro na conexão: " . $erro->getMessage();

}

?>