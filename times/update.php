<?php
require "db.php";

$id = (int)$_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM times WHERE id=?");
$stmt->execute([$id]);
$time = $stmt->fetch();

if (!$time) { die("Time não encontrado!"); }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"]);
    $cidade = trim($_POST["cidade"]);

    if ($nome === "" || $cidade === "") {
        die("Erro: Nome e cidade são obrigatórios!");
    }

    $sql = "UPDATE times SET nome=?, cidade=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $cidade, $id]);

    header("Location: read_time.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Time</title>
</head>
<body>
  <h2>Editar Time</h2>
  <form method="post">
    Nome: <input type="text" name="nome" value="<?= htmlspecialchars($time['nome']) ?>"><br>
    Cidade: <input type="text" name="cidade" value="<?= htmlspecialchars($time['cidade']) ?>"><br>
    <button type="submit">Salvar</button>
  </form>
</body>
</html>