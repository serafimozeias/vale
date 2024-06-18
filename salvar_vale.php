<?php
require_once 'conexao.php';

// Obtém os dados do formulário
$descricao = $_POST['descricao'];
$data_vale = $_POST['data_vale'];
$valor = $_POST['valor'];

// Conecta ao banco de dados
$con = con::con();

$sql = "INSERT INTO vales (descricao, data_vale, valor) VALUES (:descricao, :data_vale, :valor)";
$stmt = $con->prepare($sql);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':data_vale', $data_vale);
$stmt->bindParam(':valor', $valor);
$stmt->execute();

header('Location: index.php');
exit();
?>