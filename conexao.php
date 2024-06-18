<?php
require_once 'conexao.php';

// Obtém os dados do formulário
$id_vale = $_POST['id_vale'];
$descricao = $_POST['descricao'];
$data_vale = $_POST['data_vale'];
$valor = $_POST['valor'];

// Conecta ao banco de dados
$con = con::con();

$sql = "UPDATE vales SET descricao = :descricao, data_vale = :data_vale, valor = :valor WHERE id_vale = :id_vale";
$stmt = $con->prepare($sql);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':data_vale', $data_vale);
$stmt->bindParam(':valor', $valor);
$stmt->bindParam(':id_vale', $id_vale, PDO::PARAM_INT);
$stmt->execute();

header('Location: index.php');
exit();
?>