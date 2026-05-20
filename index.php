<?php 
require_once 'config/conexao.php';
require_once 'includes/header.php';
?>

<link rel="stylesheet" href="style.css">

<div class="container" align="center">

    <h1>Gerenciador de Estoque da Farmácia</h1>

    <p>
        Aqui você pode gerenciar os produtos de forma rápida e organizada.
    </p>

    <?php 
        $sql = "SELECT * FROM produtos ORDER BY id ASC";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h2>Lista de Produtos</h2>";

        if($produtos){
    ?>

        <table>

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Preço</th>
                <th>Estoque</th>
            </tr>

            <?php
                foreach($produtos as $registro){
            ?>

            <tr>
                <td><?php echo $registro['id']; ?></td>

                <td><?php echo $registro['nome']; ?></td>

                <td><?php echo $registro['fabricante']; ?></td>

                <td class="preco">
                    R$ <?php echo number_format($registro['preco'], 2, ',', '.'); ?>
                </td>

                <td><?php echo $registro['estoque']; ?></td>
            </tr>

            <?php
                }
            ?>

        </table>

    <?php
        } else {
            echo "<div class='sem-produto'>
                    A lista de produtos está vazia.
                  </div>";
        }

        require_once 'includes/footer.php';
    ?>

</div>