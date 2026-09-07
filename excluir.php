<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $arquivo = 'alunos.json';
    $matricula = $_POST['matricula'];

    if (file_exists($arquivo)) {
        $alunos = json_decode(file_get_contents($arquivo), true) ?: [];
        $novaLista = [];
        
        foreach ($alunos as $aluno) {
            if ($aluno['matricula'] != $matricula) {
                $novaLista[] = $aluno;
            }
        }
        
        file_put_contents($arquivo, json_encode($novaLista, JSON_PRETTY_PRINT));
    }
    
    header("Location: listar.php");
    exit;
}
?>