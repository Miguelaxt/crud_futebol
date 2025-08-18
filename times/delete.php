<?php
require "db.php";

$id = (int)$_GET["id"];
$stmt = $pdo->prepare("DELETE FROM times WHERE id=?");
$stmt->execute([$id]);

header("Location: read_time.php");
exit;