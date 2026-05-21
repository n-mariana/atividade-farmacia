<?php

require_once 'config/conexao.php';
require_once 'includes/header.php';

// Variável da mensagem
$mensagem = "";

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

    // Mensagem de sucesso
    $mensagem = "
        <div style='
            margin-top: 20px;
            padding: 15px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 8px;
            width: 100%;
            max-width: 320px;
        '>

            Produto cadastrado com sucesso!

        </div>
    ";

}

?>

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
            Cadastro de Produtos
        </h2>

        <form action="cadastro.php" method="POST">

            <label>
                Nome do Produto:
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
                Fabricante:
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
                Preço:
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
                Estoque:
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
                Salvar Produto
            </button>

        </form>

        <!-- MENSAGEM -->

        <?php echo $mensagem; ?>

    </div>

</div>

<?php

require_once 'includes/footer.php';

?>