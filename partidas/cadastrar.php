<?php
require "db.php";

// Buscar times para o select
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

    $sql = "INSERT INTO partidas (time_casa_id, time_fora_id, data_jogo, gols_casa, gols_fora) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$casa, $fora, $data, $gols_casa, $gols_fora]);

    header("Location: read_partida.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Partida</title>
</head>
<body>
  <h2>Nova Partida</h2>
  <form method="post">
    Time Casa:
    <select name="time_casa_id" required>
      <?php foreach ($times as $t): ?>
        <option value="<?= $t['id'] ?>"><?= htmlspecialchars($t['nome']) ?></option>
      <?php endforeach; ?>
    </select><br>

    Time Fora:
    <select name="time_fora_id" required>
      <?php foreach ($times as $t): ?>
        <option value="<?= $t['id'] ?>"><?= htmlspecialchars($t['nome']) ?></option>
      <?php endforeach; ?>
    </select><br>

    Data do Jogo: <input type="date" name="data_jogo" required><br>
    Gols Casa: <input type="number" name="gols_casa" value="0"><br>
    Gols Fora: <input type="number" name="gols_fora" value="0"><br>

    <button type="submit">Salvar</button>
  </form>
</body>
</html>