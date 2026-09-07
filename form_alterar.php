<?php
$arquivo = 'alunos.json';
$matricula = $_GET['matricula'] ?? '';
$alunoAtual = null;

if (file_exists($arquivo) && $matricula) {
    $alunos = json_decode(file_get_contents($arquivo), true) ?: [];
    foreach ($alunos as $aluno) {
        if ($aluno['matricula'] == $matricula) {
            $alunoAtual = $aluno;
            break;
        }
    }
}

if (!$alunoAtual) {
    die("Aluno não encontrado! <a href='listar.php'>Voltar</a>");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alterar Aluno</title>
</head>
<body>
    <h2>Alterar Dados do Aluno</h2>
    <form action="alterar.php" method="POST">
        <input type="hidden" name="matricula_original" value="<?= htmlspecialchars($alunoAtual['matricula']) ?>">
        
        <label>Matrícula:</label><br>
        <input type="text" name="matricula" value="<?= htmlspecialchars($alunoAtual['matricula']) ?>" required><br><br>
        
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= htmlspecialchars($alunoAtual['nome']) ?>" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($alunoAtual['email']) ?>" required><br><br>
        
        <button type="submit">Salvar Alteração</button>
        <a href="listar.php">Cancelar</a>
    </form>
</body>
</html>