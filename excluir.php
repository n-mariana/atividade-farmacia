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

// O ID que queremos apagar (geralmente viria de um link ou formulário)
$idParaExcluir = 4;

// 2. PREPARAR: 
// IMPORTANTE: Nunca esqueça o WHERE no DELETE, senão apaga a tabela toda!
$sql = "DELETE FROM produtos WHERE id = :id";
$stmt = $pdo->prepare($sql);

// 3. EXECUTAR:
$stmt->execute([':id' => $idParaExcluir]);

// 4. VERIFICAÇÃO:
// O rowCount nos diz se realmente alguma linha foi removida
if ($stmt->rowCount() > 0) {
    echo "Sucesso! O contato ID $idParaExcluir foi removido da agenda.";
} else {
    echo "Nenhum contato foi encontrado com o ID $idParaExcluir.";
}
?>
