<?php
require "db.php";

$id = (int)$_GET["id"];
$stmt = $pdo->prepare("DELETE FROM jogadores WHERE id=?");
$stmt->execute([$id]);

header("Location: read.php");
exit;