<?php
require "db.php";

$stmt = $pdo->query("SELECT * FROM times ORDER BY nome");
$rows = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Times</title>
</head>
<body>
  <h2>Times</h2>
  <a href="cadastrar_time.php">Novo Time</a>
  <table border="1" cellpadding="5">
    <tr><th>ID</th><th>Nome</th><th>Cidade</th><th>Ações</th></tr>
    <?php foreach ($rows as $r): ?>
    <tr>
      <td><?= $r['id'] ?></td>
      <td><?= htmlspecialchars($r['nome']) ?></td>
      <td><?= htmlspecialchars($r['cidade']) ?></td>
      <td>
        <a href="update_time.php?id=<?= $r['id'] ?>">Editar</a> | 
        <a href="delete_time.php?id=<?= $r['id'] ?>" onclick="return confirm('Excluir este time?')">Excluir</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>