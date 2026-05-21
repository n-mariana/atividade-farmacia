<?php 

require_once 'config/conexao.php';
require_once 'includes/header.php';

?>

<link rel="stylesheet" href="style.css">

<div
    class="container"

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
            max-width: 1100px;

            background-color: white;

            padding: 35px;

            border-radius: 12px;

            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);

            text-align: center;
        "
    >

        <h1
            style="
                color: #223f8d;
                margin-bottom: 15px;
            "
        >
            Gerenciador de Estoque da Farmácia
        </h1>

        <p
            style="
                margin-bottom: 35px;
                color: #555;
                line-height: 1.6;
            "
        >
            Aqui você pode gerenciar os produtos
            de forma rápida e organizada.
        </p>

        <h2
            style="
                color: #223f8d;
                margin-bottom: 25px;
            "
        >
            Lista de Produtos
        </h2>

        <?php 

            $sql = "SELECT * FROM produtos ORDER BY id ASC";

            $stmt = $conexao->prepare($sql);

            $stmt->execute();

            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($produtos){

        ?>

            <div
                class="tabela-responsiva"

                style="
                    width: 100%;
                    overflow-x: auto;
                "
            >

                <table
                    style="
                        width: 100%;
                        border-collapse: collapse;
                        min-width: 700px;
                    "
                >

                    <tr>

                        <th
                            style="
                                background-color: #c0392b;
                                color: white;

                                padding: 16px;

                                border: 1px solid white;
                            "
                        >
                            ID
                        </th>

                        <th
                            style="
                                background-color: #223f8d;
                                color: white;

                                padding: 16px;

                                border: 1px solid white;
                            "
                        >
                            Nome
                        </th>

                        <th
                            style="
                                background-color: #223f8d;
                                color: white;

                                padding: 16px;

                                border: 1px solid white;
                            "
                        >
                            Fabricante
                        </th>

                        <th
                            style="
                                background-color: #223f8d;
                                color: white;

                                padding: 16px;

                                border: 1px solid white;
                            "
                        >
                            Preço
                        </th>

                        <th
                            style="
                                background-color: #223f8d;
                                color: white;

                                padding: 16px;

                                border: 1px solid white;
                            "
                        >
                            Estoque
                        </th>

                    </tr>

                    <?php
                        foreach($produtos as $registro){
                    ?>

                        <tr
                            style="
                                background-color: #f9f9f9;
                            "
                        >

                            <td
                                style="
                                    padding: 16px;

                                    border: 1px solid #ddd;

                                    color: #c0392b;

                                    font-weight: bold;
                                "
                            >
                                <?php echo $registro['id']; ?>
                            </td>

                            <td
                                style="
                                    padding: 16px;

                                    border: 1px solid #ddd;
                                "
                            >
                                <?php echo $registro['nome']; ?>
                            </td>

                            <td
                                style="
                                    padding: 16px;

                                    border: 1px solid #ddd;
                                "
                            >
                                <?php echo $registro['fabricante']; ?>
                            </td>

                            <td
                                style="
                                    padding: 16px;

                                    border: 1px solid #ddd;

                                    color: #27ae60;

                                    font-weight: bold;
                                "
                            >
                                R$ <?php echo number_format($registro['preco'], 2, ',', '.'); ?>
                            </td>

                            <td
                                style="
                                    padding: 16px;

                                    border: 1px solid #ddd;
                                "
                            >
                                <?php echo $registro['estoque']; ?>
                            </td>

                        </tr>

                    <?php
                        }
                    ?>

                </table>

            </div>

        <?php

            } else {

                echo "

                    <div
                        style='
                            background-color: #f8d7da;

                            color: #721c24;

                            padding: 15px;

                            border-radius: 8px;

                            margin-top: 20px; 
                        '
                    >

                        A lista de produtos está vazia.

                    </div>

                ";

            }

        ?>

    </div>

</div>

<?php require_once 'includes/footer.php'; ?>