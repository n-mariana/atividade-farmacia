<?php

require_once 'config/conexao.php';
require_once 'includes/header.php';

// Variável da mensagem
$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recebe o ID digitado
    $id = $_POST['id'];

    // DELETE
    $sql = "DELETE FROM produtos WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    // Verificação
    if ($stmt->rowCount() > 0) {

        $mensagem = "
            <div style='
                margin-top: 20px;
                padding: 15px;
                background-color: #d4edda;
                color: #155724;
                border-radius: 8px;
                width: 100%;
                max-width: 340px;
            '>

                Sucesso! O produto ID $id foi removido do estoque.

            </div>
        ";

    } else {

        $mensagem = "
            <div style='
                margin-top: 20px;
                padding: 15px;
                background-color: #f8d7da;
                color: #721c24;
                border-radius: 8px;
                width: 100%;
                max-width: 340px;
            '>

                Nenhum produto foi encontrado com o ID $id.

            </div>
        ";

    }

}

?>

<!-- FORMULÁRIO -->

<div 
    class="centralizar"

    style="
        width: 100%;

        min-height: 70vh;

        display: flex;
        justify-content: center;
        align-items: center;

        padding: 40px 20px;
    "
>

    <div
        style="
            width: 100%;
            max-width: 420px;

            background-color: white;

            padding: 35px;

            border-radius: 12px;

            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);

            text-align: center;
        "
    >

        <h2
            style="
                color: #223f8d;
                margin-bottom: 30px;
            "
        >
            Excluir Produto
        </h2>

        <form action="excluir.php" method="POST">

            <label>
                ID do Produto:
            </label>

            <br><br>

            <input 
                type="number" 
                name="id" 
                required

                style="
                    padding: 12px;
                    width: 100%;
                    border-radius: 6px;
                    border: 1px solid #ccc;
                "
            >

            <br><br>

            <button 
                type="submit"

                style="
                    width: 100%;

                    padding: 14px;

                    background-color: #c0392b;

                    color: white;

                    border: none;

                    border-radius: 8px;

                    cursor: pointer;

                    font-size: 15px;
                "
            >
                Excluir Produto
            </button>

        </form>

        <!-- MENSAGEM -->

        <?php echo $mensagem; ?>

    </div>

</div>

<?php

require_once 'includes/footer.php';

?>