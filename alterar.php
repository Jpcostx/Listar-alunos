<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $arquivo = 'alunos.json';
    $matricula_original = $_POST['matricula_original'];
    
    $novosDados = [
        'matricula' => $_POST['matricula'],
        'nome'      => $_POST['nome'],
        'email'     => $_POST['email']
    ];

    if (file_exists($arquivo)) {
        $alunos = json_decode(file_get_contents($arquivo), true) ?: [];
        
        foreach ($alunos as $key => $aluno) {
            if ($aluno['matricula'] == $matricula_original) {
                $alunos[$key] = $novosDados;
                break;
            }
        }
        
        file_put_contents($arquivo, json_encode($alunos, JSON_PRETTY_PRINT));
    }
    
    header("Location: listar.php");
    exit;
}
?>