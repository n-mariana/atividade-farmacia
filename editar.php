<?php
// 1. Conexão
    $dsn = "mysql:host=localhost;dbname=database;charset=utf8";
    $usuario = "root";
    $senha = "";
    
    // Conexão com o Banco de Dados
    try {
        // Criamos o objeto PDO
        $pdo = new PDO($dsn, $usuario, $senha);
    } catch (PDOException $e) { //Apenas será executado se acontecer algum erro
        die("Erro ao conectar: " . $e->getMessage());
    }

// Dados que queremos atualizar
$idParaAlterar = 4;
$novoNome = "Carlos Alberto (Etec)";
$novoNumero = "11 98888-7777";

// 2. PREPARAR (UPDATE): 
// Usamos "SET" para definir os novos valores onde o ID for igual ao selecionado
$sql = "UPDATE produtos SET nome = :novo_nome, numero = :novo_num WHERE id = :id";
$stmt = $pdo->prepare($sql);

// 3. EXECUTAR:
// Vinculamos os valores aos apelidos (:novo_nome, :novo_num, :id)
$sucesso = $stmt->execute([
    ':novo_nome' => $novoNome,
    ':novo_num'  => $novoNumero,
    ':id'         => $idParaAlterar
]);

// 4. FEEDBACK:
// É importante avisar ao usuário se deu certo
if ($sucesso) {
    // rowCount() conta quantas linhas foram afetadas no banco
    if ($stmt->rowCount() > 0) {
        echo "Sucesso! O contato ID $idParaAlterar foi atualizado.";
    } else {
        echo "O comando funcionou, mas os dados eram iguais ou o ID não existe.";
    }
} else {
    echo "Erro ao tentar atualizar.";
}
?>
