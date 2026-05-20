<?php

require_once 'config/conexao.php';
require_once 'includes/header.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recebe o ID digitado
    $id = $_POST['id'];

// 2. PREPARAR: 
// IMPORTANTE: Nunca esqueça o WHERE no DELETE, senão apaga a tabela toda!
    $sql = "DELETE FROM produtos WHERE id = :id";
    $stmt = $conexao->prepare($sql);

    // Executar
    $stmt->execute([
        ':id' => $id
    ]);

// 4. VERIFICAÇÃO:
// O rowCount nos diz se realmente alguma linha foi removida
    if ($stmt->rowCount() > 0) {

        echo "Sucesso! O produto ID $id foi removido do estoque.";

    } else {

        echo "Nenhum produto foi encontrado com o ID $id.";

    }
}

?>

<!-- Form -->
<h2>Excluir Produto</h2>

<form action="excluir.php" method="POST">

    <label>ID do Produto:</label><br>
    <input type="number" name="id" required>
    <br><br>

    <button type="submit">
        Excluir Produto
    </button>

</form>

<?php

require_once 'includes/footer.php';

?>