Perfil de Usuário com Banco de Dados - Desafio 3 Sistema simples de autenticação de usuários e personalização de perfil desenvolvido em PHP e MySQL. O sistema valida as credenciais cadastradas no banco de dados e permite ao usuário definir uma cor de fundo personalizada para a sua sessão.

🛠️ Tecnologias Utilizadas PHP 7+ (Sessões, PDO e controle de acesso)

MySQL (Armazenamento de usuários)

HTML5 / CSS3 (Interface do formulário e estilização dinâmica)

📂 Estrutura do Projeto 15d_login.php — Formulário de login com campos de usuário, senha e seletor de cor. Faz a validação com o banco de dados e inicia a sessão.

15d_perfil.php — Página protegida por verificação de sessão. Apresenta mensagem de boas-vindas e aplica a cor de fundo configurada.

15d_logout.php — Encerra e destrói a sessão do usuário, redirecionando para a tela de login.

🗄️ Configuração do Banco de Dados Credenciais Host: localhost

Banco de dados: exercicio

Usuário MySQL: root

Senha MySQL: Senai@118

Script SQL para Criação Caso precise recriar a estrutura do banco e da tabela usuarios:

SQL CREATE DATABASE IF NOT EXISTS exercicio; USE exercicio;

CREATE TABLE IF NOT EXISTS usuarios ( id INT AUTO_INCREMENT PRIMARY KEY, usuario VARCHAR(50) NOT NULL UNIQUE, senha VARCHAR(255) NOT NULL );

-- Exemplo de usuário para teste (senha em texto puro ou hash) INSERT INTO usuarios (usuario, senha) VALUES ('admin', 'Senai@118'); 🚀 Como Executar Mova os arquivos 15d_login.php, 15d_perfil.php e 15d_logout.php para o diretório do seu servidor web local (ex: htdocs no XAMPP ou www no WAMP).
