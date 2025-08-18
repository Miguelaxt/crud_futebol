<?php
require "db.php";

$sql = "SELECT p.*, 
               tc.nome AS time_casa, 
               tf.nome AS time_fora
        FROM partidas p
        JOIN times tc ON p.time_casa_id = tc.id
        JOIN times tf ON p.time_fora_id = tf.id
        ORDER BY p.data_jogo DESC";
$rows = $pdo->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Partidas</title>
</head>
<body>
  <h2>Partidas</h2>
  <a href="cadastrar_partida.php">Nova Partida</a>
  <table border="1" cellpadding="5">
    <tr>
      <th>ID</th><th>Time Casa</th><th>Gols Casa</th>
      <th>Time Fora</th><th>Gols Fora</th><th>Data</th><th>Ações</th>
    </tr>
    <?php foreach ($rows as $r): ?>
    <tr>
      <td><?= $r['id'] ?></td>
      <td><?= htmlspecialchars($r['time_casa']) ?></td>
      <td><?= $r['gols_casa'] ?></td>
      <td><?= htmlspecialchars($r['time_fora']) ?></td>
      <td><?= $r['gols_fora'] ?></td>
      <td><?= $r['data_jogo'] ?></td>
      <td>
        <a href="update_partida.php?id=<?= $r['id'] ?>">Editar</a> | 
        <a href="delete_partida.php?id=<?= $r['id'] ?>" onclick="return confirm('Excluir partida?')">Excluir</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>