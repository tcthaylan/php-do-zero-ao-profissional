<?php 
require_once('config.php');

$ip = $_SERVER["REMOTE_ADDR"];
$hora = date("H:i:s");
$stmt = $conn->prepare("INSERT INTO acessos (ip, hora) VALUES (:ip, :hora)");
$stmt->bindValue(":ip", $ip);
$stmt->bindValue(":hora", $hora);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM acessos WHERE hora < :hora");
$stmt->bindValue(":hora", date("H:i:s", strtotime("-5 minutes")));
$stmt->execute();

$stmt = $conn->prepare("SELECT * FROM acessos WHERE hora > :hora GROUP BY ip");
$stmt->bindValue(":hora", date("H:i:s", strtotime("-5 minutes")));
$stmt->execute();
$contagem = $stmt->rowCount();

echo "Online: ".$contagem;