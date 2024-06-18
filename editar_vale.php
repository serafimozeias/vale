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
    <title>Editar Vale</title>
</head>
<body>
    <h1>Editar Vale</h1>
    <form action="atualizar_vale.php" method="post">
        <input type="hidden" name="id_vale" value="<?php echo htmlspecialchars($vale['id_vale']); ?>">
        <p>Descrição: <textarea name="descricao" required><?php echo htmlspecialchars($vale['descricao']); ?></textarea></p>
        <p>Data do Vale: <input type="date" name="data_vale" value="<?php echo htmlspecialchars($vale['data_vale']); ?>" required></p>
        <p>Valor: <input type="text" name="valor" value="<?php echo htmlspecialchars($vale['valor']); ?>" required></p>
        <p><input type="submit" value="Atualizar"></p>
    </form>
</body>
</html>
<?php else: ?>
    <p>Vale não encontrado.</p>
<?php endif; ?>