<?php

require_once 'config/conexao.php';
require_once 'includes/header.php';

// Variável da mensagem
$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recebendo dados
    $id = $_POST['id'];

    $nome = $_POST['nome'];

    $fabricante = $_POST['fabricante'];

    $preco = $_POST['preco'];

    $estoque = $_POST['estoque'];

    // UPDATE
    $sql = "UPDATE produtos
            SET
                nome = :nome,
                fabricante = :fabricante,
                preco = :preco,
                estoque = :estoque
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    // EXECUTAR
    $sucesso = $stmt->execute([

        ':nome' => $nome,

        ':fabricante' => $fabricante,

        ':preco' => $preco,

        ':estoque' => $estoque,

        ':id' => $id

    ]);

    // FEEDBACK
    if ($sucesso) {

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

                    Sucesso! O produto ID $id foi atualizado.

                </div>
            ";

        } else {

            $mensagem = "
                <div style='
                    margin-top: 20px;
                    padding: 15px;
                    background-color: #fff3cd;
                    color: #856404;
                    border-radius: 8px;
                    width: 100%;
                    max-width: 340px;
                '>

                    O comando funcionou, mas os dados eram iguais ou o ID não existe.

                </div>
            ";

        }

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

                Erro ao atualizar produto.

            </div>
        ";

    }

}

?>

<!-- FORM -->

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
            Editar Produto
        </h2>

        <form action="editar.php" method="POST">

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

            <label>
                Novo Nome:
            </label>

            <br><br>

            <input 
                type="text" 
                name="nome" 
                required

                style="
                    padding: 12px;
                    width: 100%;
                    border-radius: 6px;
                    border: 1px solid #ccc;
                "
            >

            <br><br>

            <label>
                Novo Fabricante:
            </label>

            <br><br>

            <input 
                type="text" 
                name="fabricante" 
                required

                style="
                    padding: 12px;
                    width: 100%;
                    border-radius: 6px;
                    border: 1px solid #ccc;
                "
            >

            <br><br>

            <label>
                Novo Preço:
            </label>

            <br><br>

            <input 
                type="number" 
                step="0.01" 
                name="preco" 
                required

                style="
                    padding: 12px;
                    width: 100%;
                    border-radius: 6px;
                    border: 1px solid #ccc;
                "
            >

            <br><br>

            <label>
                Novo Estoque:
            </label>

            <br><br>

            <input 
                type="number" 
                name="estoque" 
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

                    background-color: #e62232;

                    color: white;

                    border: none;

                    border-radius: 8px;

                    cursor: pointer;

                    font-size: 15px;
                "
            >
                Atualizar Produto
            </button>

        </form>

        <!-- MENSAGEM -->

        <?php echo $mensagem; ?>

    </div>

</div>

<?php

require_once 'includes/footer.php';

?>