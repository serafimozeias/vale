<?php
require_once 'conexao.php';

// Conectar ao banco de dados
$con = con::con();

$sql = "SELECT id_vale, descricao, data_vale, valor, data_cadastro FROM vales";
$stmt = $con->prepare($sql);
$stmt->execute();

$vales = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_valor = 0;
foreach ($vales as $vale) {
    $total_valor += floatval($vale['valor']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>gerenciar vales</title>
</head>
<body>
    <h1>cadastrar Vale</h1>

    <form action="salvar_vale.php" method="post">
        <div>
            <label>Descrição</label>
            <input type="text" name="descricao">
        </div>
        <div>
            <label>Data do Vale</label>
            <input type="date" name="data_vale" required>
        </div>
        <div>
            <label>Valor</label>
            <input type="text" name="valor" required>
        </div>
        <div>
            <input type="submit" value="Cadastrar">
        </div>
    </form>

    <h1>Lista de Vales</h1>

    <table border="1">
        <tr>
            <th>Descrição</th>
            <th>Data do Vale</th>
            <th>Valor</th>
            <th>Data do Cadastro</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($vales as $vale): ?>
        <tr>
            <td><?php echo htmlspecialchars($vale['descricao']); ?></td>
            <td><?php echo htmlspecialchars($vale['data_vale']); ?></td>
            <td><?php echo htmlspecialchars($vale['valor']); ?></td>
            <td><?php echo htmlspecialchars($vale['data_cadastro']); ?></td>
            <td>
                <a class="v" href="visualizar_vale.php?id=<?php echo $vale['id_vale']; ?>">Visualizar</a>
                <a class="e" href="editar_vale.php?id=<?php echo $vale['id_vale']; ?>">Editar</a>
                <a class="d" href="deletar_vale.php?id=<?php echo $vale['id_vale']; ?>">Deletar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p>Total dos Vales: <?php echo number_format($total_valor, 2, ',', '.'); ?></p>
</body>
</html>