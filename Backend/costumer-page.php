<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIY</title>
</head>
<body>
    <a href="seller-page.php">
        <h1>Venda</h1>
    </a>
    <?php
        include("config.php");
        if ($connection->connect_error) {
            die("Conexão falhou: " . $connection->connect_error);
        }
        $sql = "SELECT * FROM produtos";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            echo "<h1>Produtos anunciados:</h1><br>";
            while ($row = $result->fetch_assoc()) {
                echo "Nome: " . $row["nome"] . "<br>";
                echo "Descrição: " . $row["descricao"] . "<br>";
                echo "Preço: R$ " . $row["preco"]."<br>";
                echo "Quantidade disponível: " . $row["quantidade_disponivel"] . "<br>";
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" width="200"/><br>';
                echo "<hr>";
            }
        } else {
            echo "Nenhum produto encontrado.";
        }
        $connection->close();
    ?>
</body>
</html>
