<?php
$arquivo = 'alunos.json';
$alunos = [];

if (file_exists($arquivo)) {
    $conteudo = file_get_contents($arquivo);
    $alunos = json_decode($conteudo, true) ?: [];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Alunos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h2>Lista de Alunos</h2>
    <table>
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($alunos)): ?>
                <tr><td colspan="4">Nenhum aluno encontrado no arquivo.</td></tr>
            <?php else: ?>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?= htmlspecialchars($aluno['matricula']) ?></td>
                        <td><?= htmlspecialchars($aluno['nome']) ?></td>
                        <td><?= htmlspecialchars($aluno['email']) ?></td>
                        <td>
                            <a href="form_alterar.php?matricula=<?= urlencode($aluno['matricula']) ?>" class="btn btn-alt">Alterar</a>
                            <a href="form_excluir.php?matricula=<?= urlencode($aluno['matricula']) ?>" class="btn btn-exc">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>