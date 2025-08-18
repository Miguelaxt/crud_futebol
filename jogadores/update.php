<?php
// update.php
require "db.php";

$id = (int)$_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM jogadores WHERE id=?");
$stmt->execute([$id]);
$jogador = $stmt->fetch();

if (!$jogador) { die("Jogador não encontrado!"); }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $posicao = $_POST["posicao"];
    $numero = (int)$_POST["numero_camisa"];
    $time_id = (int)$_POST["time_id"];

    if ($numero < 1 || $numero > 99) {
        die("Erro: número da camisa deve estar entre 1 e 99!");
    }

    $sql = "UPDATE jogadores SET nome=?, posicao=?, numero_camisa=?, time_id=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $posicao, $numero, $time_id, $id]);

    header("Location: read.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Jogador</title>
</head>
<body>
  <h2>Editar Jogador</h2>
  <form method="post">
    Nome: <input type="text" name="nome" value="<?= htmlspecialchars($jogador['nome']) ?>"><br>
    Posição: 
    <select name="posicao">
      <?php foreach (['GOL','ZAG','LAT','MEI','ATA'] as $p): ?>
        <option value="<?= $p ?>" <?= $jogador['posicao']===$p?'selected':'' ?>><?= $p ?></option>
      <?php endforeach; ?>
    </select><br>
    Número da Camisa: <input type="number" name="numero_camisa" value="<?= $jogador['numero_camisa'] ?>"><br>
    ID do Time: <input type="number" name="time_id" value="<?= $jogador['time_id'] ?>"><br>
    <button type="submit">Salvar</button>
  </form>
</body>
</html>