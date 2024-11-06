<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIY</title>
</head>
<body>
    <a href="costumer-page.php">
        <h1>Compre</h1>
    </a>
    <form method="POST" action="seller-page.php" enctype="multipart/form-data">
        Nome do Produto: <input type="text" name="nome" id="nome" required> <br>
        Preço: <input type="number" name="preco" id="preco" required> <br>
        Descrição: <textarea name="descricao" id="descricao"  required></textarea> <br>
        Quantidade disponível do produto: <input type="number" name="quantidade_disponivel" id="quantidade_disponivel  required"> <br>
        Imagem do produto: <input type="file" name="imagem" id="imagem"> <br>
        <button type="submit">Anunciar Produto</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include("config.php");
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];
            $quantidade_disponivel = $_POST['quantidade_disponivel'];
            $ImagemTmp = $_FILES['imagem']['tmp_name'];
            $ImagemConteudo = addslashes(file_get_contents($ImagemTmp));

            $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade_disponivel, imagem) VALUES ('$nome', '$descricao', '$preco', '$quantidade_disponivel', '$ImagemConteudo')";

            if ($connection->query($sql) === TRUE) {
                echo "Produto anunciado com sucesso!";
            } else {
                echo "Erro ao anunciar o produto: " . $connection->error;
            }
            $connection->close();
        }
    ?>
</body>
</html>
