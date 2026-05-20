<?php 
  require 'config/conexao.php'; // Puxa o banco
  require 'includes/header.php'; // Puxa o topo visual
?>

<h2>Bem-vindo ao Gerenciador de Estoque da Farmácia</h2>
<p>Aqui você pode gerenciar os produtos de forma rápida.</p>

<?php 
    $sql = "SELECT * FROM produtos ORDER BY id ASC";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h2>Lista de Produtos</h2>";

    if($produtos){
        foreach ($produtos as $registro){
            echo "ID: " . $registro['id'] . " | ";
            echo "Nome: " . $registro['nome'] . " | ";
            echo "Fabricante: " . $registro['fabricante'] . " | ";
            echo "Preço: " . $registro['preco'] . " | ";
            echo "Estoque: " . $registro['estoque']  . "<br>";
            echo "------------------------------------------------------------------------------------------------------<br>";
        }
    }
    
    else{
    echo "A lista de produtos está vazia.";
    }
    require 'includes/footer.php'; // Puxa o final do site
?>
