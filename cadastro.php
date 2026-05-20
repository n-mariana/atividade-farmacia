<?php

require_once 'config/conexao.php';
require_once 'includes/header.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recebendo os dados do formulário
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    // SQL de inserção
    $sql = "INSERT INTO produtos
            (nome, fabricante, preco, estoque)
            VALUES
            (:nome, :fabricante, :preco, :estoque)";

    // Preparar SQL
    $stmt = $conexao->prepare($sql);

    // Executar
    $stmt->execute([
        ':nome' => $nome,
        ':fabricante' => $fabricante,
        ':preco' => $preco,
        ':estoque' => $estoque
    ]);

    echo "<p>Produto cadastrado com sucesso!</p>";
}

?>

<h2>Cadastro de Produtos</h2>

<form action="cadastro.php" method="POST">

    <label>Nome do Produto:</label><br>
    <input type="text" name="nome" required>
    <br><br>

    <label>Fabricante:</label><br>
    <input type="text" name="fabricante" required>
    <br><br>

    <label>Preço:</label><br>
    <input type="number" step="0.01" name="preco" required>
    <br><br>

    <label>Estoque:</label><br>
    <input type="number" name="estoque" required>
    <br><br>

    <button type="submit">Salvar Produto</button>

</form>

<?php

require_once 'includes/footer.php';

?>