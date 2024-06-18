<?php
require_once 'conexao.php';

// Obtém o ID do vale a partir da URL
$id = $_GET['id'];

// Conecta ao banco de dados
$con = con::con();

$sql = "SELECT * FROM vales WHERE id_vale = :id";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$vale = $stmt->fetch(PDO::FETCH_ASSOC);

if ($vale):
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Visualizar Vale</title>
</head>
<body>
    <h1>Visualizar Vale</h1>
    <p>Descrição: <?php echo htmlspecialchars($vale['descricao']); ?></p>
    <p>Data do Vale: <?php echo htmlspecialchars($vale['data_vale']); ?></p>
    <p>Valor: <?php echo htmlspecialchars($vale['valor']); ?></p>
    <p>Data do Cadastro: <?php echo htmlspecialchars($vale['data_cadastro']); ?></p>
</body>
</html>
<?php else: ?>
    <p>Vale não encontrado.</p>
<?php endif; ?>