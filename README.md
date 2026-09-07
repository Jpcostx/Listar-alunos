Sistema de Gerenciamento de Alunos
Um sistema simples e direto criado em PHP para listar, editar e excluir registros de alunos. O projeto armazena e manipula todas as informações dinamicamente em um arquivo JSON.

🚀 Como executar o projeto
Certifique-se de ter um servidor local instalado (como XAMPP ou WAMP).

Crie uma pasta para o projeto dentro do diretório público do seu servidor:

No XAMPP: C:\xampp\htdocs\escola (ou outro nome de sua preferência)

No WAMP: C:\wamp64\www\escola

Copie todos os arquivos do projeto para dentro desta pasta.

Abra o Painel de Controle do XAMPP/WAMP e inicie o serviço Apache.

Abra o seu navegador e acesse: http://localhost/escola/listar.php

📁 Estrutura de Arquivos
listar.php: Página principal que lê o arquivo JSON e exibe a tabela com os alunos cadastrados e os botões de ação.

form_alterar.php e alterar.php: Interface de formulário e script lógico responsáveis por atualizar os dados de um aluno existente.

form_excluir.php e excluir.php: Tela de confirmação e script lógico que removem definitivamente o registro do aluno.

estilo.css: Folha de estilos responsável pela aparência das tabelas, botões e formulários.

alunos.json: Arquivo de texto estruturado que atua como o banco de dados do sistema.