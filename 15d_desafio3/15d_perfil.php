<?php
session_start();

// Redireciona para o login caso o usuário não esteja logado
if (!isset($_SESSION['usuario'])) {
    header("Location: 15d_login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$cor_fundo = $_SESSION['cor_fundo'] ?? '#ffffff';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
</head>
<body style="background-color: <?php echo ($cor_fundo); ?>;">
    <h1>Bem-vindo, <?php echo ($usuario); ?>!</h1>
    <p>Esta é a minha página personalizavel.</p>
    
    <br>
    <a href="15d_logout.php">Sair</a>
</body>
</html>