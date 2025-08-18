<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $posicao = $_POST["posicao"];
    $numero = (int)$_POST["numero_camisa"];
    $time_id = (int)$_POST["time_id"];

    if ($numero < 1 || $numero > 99) {
        die("Erro: número da camisa deve estar entre 1 e 99!");
    }

    $sql = "INSERT INTO jogadores (nome, posicao, numero_camisa, time_id) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $posicao, $numero, $time_id]);

    header("Location: read.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Jogador</title>
</head>
<body>
  <h2>Novo Jogador</h2>
  <form method="post">
    Nome: <input type="text" name="nome" required><br>
    Posição: 
    <select name="posicao" required>
      <option value="GOL">Goleiro</option>
      <option value="ZAG">Zagueiro</option>
      <option value="LAT">Lateral</option>
      <option value="MEI">Meio-campo</option>
      <option value="ATA">Atacante</option>
    </select><br>
    Número da Camisa: <input type="number" name="numero_camisa" required><br>
    Nome do Time: <input type="text" name="time_nome" required><br>
    <button type="submit">Salvar</button>
  </form>
</body>
</html>