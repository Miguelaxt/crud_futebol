<?php
require "db.php";

$id = (int)$_GET["id"];
$stmt = $pdo->prepare("DELETE FROM partidas WHERE id=?");
$stmt->execute([$id]);

header("Location: read_partida.php");
exit;