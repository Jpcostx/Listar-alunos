<?php
$arquivo = 'alunos.json';
$matricula = $_GET['matricula'] ?? '';
$alunoExcluir = null;

if (file_exists($arquivo) && $matricula) {
    $alunos = json_decode(file_get_contents($arquivo), true) ?: [];
    foreach ($alunos as $aluno) {
        if ($aluno['matricula'] == $matricula) {
            $alunoExcluir = $aluno;
            break;
        }
    }
}

if (!$alunoExcluir) {
    die("Aluno não encontrado! <a href='listar.php'>Voltar</a>");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Exclusão</title>
</head>
<body>
    <h2>Confirmar Exclusão de Aluno</h2>
    <p>Atenção! Você está prestes a excluir o seguinte aluno:</p>
    <ul>
        <li><strong>Matrícula:</strong> <?= htmlspecialchars($alunoExcluir['matricula']) ?></li>
        <li><strong>Nome:</strong> <?= htmlspecialchars($alunoExcluir['nome']) ?></li>
        <li><strong>Email:</strong> <?= htmlspecialchars($alunoExcluir['email']) ?></li>
    </ul>
    
    <form action="excluir.php" method="POST">
        <input type="hidden" name="matricula" value="<?= htmlspecialchars($alunoExcluir['matricula']) ?>">
        <button type="submit" style="background-color: red; color: white; padding: 10px;">Sim, Quero Excluir</button>
        <a href="listar.php">Cancelar</a>
    </form>
</body>
</html>