<?php

require_once 'config/conexao.php';
require_once 'includes/header.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recebendo dados
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

// 2. PREPARAR (UPDATE): 
// Usamos "SET" para definir os novos valores onde o ID for igual ao selecionado
    $sql = "UPDATE produtos
            SET
                nome = :nome,
                fabricante = :fabricante,
                preco = :preco,
                estoque = :estoque
            WHERE id = :id";
    $stmt = $conexao->prepare($sql);

// 3. EXECUTAR:
// Vinculamos os valores aos apelidos 
    $sucesso = $stmt->execute([
        ':nome' => $nome,
        ':fabricante' => $fabricante,
        ':preco' => $preco,
        ':estoque' => $estoque,
        ':id' => $id
    ]);

// 4. FEEDBACK:
// É importante avisar ao usuário se deu certo
    if ($sucesso) {

        if ($stmt->rowCount() > 0) {
            echo "Sucesso! O produto ID $id foi atualizado.";
        } else {
            echo "O comando funcionou, mas os dados eram iguais ou o ID não existe.";
        }

    } else {
        echo "Erro ao atualizar produto.";
    }
}

?>

<!-- Form -->
<h2>Editar Produto</h2>

<form action="editar.php" method="POST">

    <label>ID do Produto:</label><br>
    <input type="number" name="id" required>
    <br><br>

    <label>Novo Nome:</label><br>
    <input type="text" name="nome" required>
    <br><br>

    <label>Novo Fabricante:</label><br>
    <input type="text" name="fabricante" required>
    <br><br>

    <label>Novo Preço:</label><br>
    <input type="number" step="0.01" name="preco" required>
    <br><br>

    <label>Novo Estoque:</label><br>
    <input type="number" name="estoque" required>
    <br><br>

    <button type="submit">Atualizar Produto</button>

</form>

<?php

require_once 'includes/footer.php';

?>