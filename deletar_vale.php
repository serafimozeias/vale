<?php
require_once 'conexao.php';

// Obtém o ID do vale a partir da URL
$id = $_GET['id'];

// Conecta ao banco de dados
$con = con::con();

$sql = "DELETE FROM vales WHERE id_vale = :id";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

header('Location: index.php');
exit();
?>