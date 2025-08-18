<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"]);
    $cidade = trim($_POST["cidade"]);

    if ($nome === "" || $cidade === "") {
        die("Erro: Nome e cidade são obrigatórios!");
    }

    $sql = "INSERT INTO times (nome, cidade) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $cidade]);

    header("Location: read_time.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Time</title>
</head>
<body>
  <h2>Novo Time</h2>
  <form method="post">
    Nome: <input type="text" name="nome" required><br>
    Cidade: <input type="text" name="cidade" required><br>
    <button type="submit">Salvar</button>
  </form>
</body>
</html>