<?php
require "db.php";

$stmt = $pdo->query("SELECT j.*, t.nome AS time_nome 
                     FROM jogadores j 
                     LEFT JOIN times t ON j.time_id = t.id");
$rows = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Jogadores</title>
</head>
<body>
  <h2>Jogadores</h2>
  <a href="cadastrar.php">Novo Jogador</a>
  <table border="1" cellpadding="5">
    <tr><th>Nome</th><th>Posição</th><th>Número</th><th>Time</th><th>Ações</th></tr>
    <?php foreach ($rows as $r): ?>
    <tr>
      <td><?= htmlspecialchars($r['nome']) ?></td>
      <td><?= $r['posicao'] ?></td>
      <td><?= $r['numero_camisa'] ?></td>
      <td><?= $r['time_nome'] ?></td>
      <td>
        <a href="update.php?id=<?= $r['id'] ?>">Editar</a> | 
        <a href="delete.php?id=<?= $r['id'] ?>" onclick="return confirm('Excluir jogador?')">Excluir</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>