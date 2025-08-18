<?php
require "db.php";

$id = (int)$_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM partidas WHERE id=?");
$stmt->execute([$id]);
$partida = $stmt->fetch();
if (!$partida) { die("Partida não encontrada!"); }

$times = $pdo->query("SELECT id, nome FROM times ORDER BY nome")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $casa = (int)$_POST["time_casa_id"];
    $fora = (int)$_POST["time_fora_id"];
    $data = $_POST["data_jogo"];
    $gols_casa = (int)$_POST["gols_casa"];
    $gols_fora = (int)$_POST["gols_fora"];

    if ($casa === $fora) {
        die("Erro: Não é permitido cadastrar partida entre o mesmo time!");
    }

    $sql = "UPDATE partidas 
            SET time_casa_id=?, time_fora_id=?, data_jogo=?, gols_casa=?, gols_fora=? 
            WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$casa, $fora, $data, $gols_casa, $gols_fora, $id]);

    header("Location: read_partida.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Partida</title>
</head>
<body>
  <h2>Editar Partida</h2>
  <form method="post">
    Time Casa:
    <select name="time_casa_id">
      <?php foreach ($times as $t): ?>
        <option value="<?= $t['id'] ?>" <?= $partida['time_casa_id']==$t['id']?'selected':'' ?>>
          <?= htmlspecialchars($t['nome']) ?>
        </option>
      <?php endforeach; ?>
    </select><br>

    Time Fora:
    <select name="time_fora_id">
      <?php foreach ($times as $t): ?>
        <option value="<?= $t['id'] ?>" <?= $partida['time_fora_id']==$t['id']?'selected':'' ?>>
          <?= htmlspecialchars($t['nome']) ?>
        </option>
      <?php endforeach; ?>
    </select><br>

    Data do Jogo: <input type="date" name="data_jogo" value="<?= $partida['data_jogo'] ?>"><br>
    Gols Casa: <input type="number" name="gols_casa" value="<?= $partida['gols_casa'] ?>"><br>
    Gols Fora: <input type="number" name="gols_fora" value="<?= $partida['gols_fora'] ?>"><br>

    <button type="submit">Salvar</button>
  </form>
</body>
</html>