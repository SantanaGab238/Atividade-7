<?php
session_start();

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_input =$_POST['usuario'] ?? '';
    $senha_input =$_POST['senha'] ?? '';
    $cor_input =$_POST['cor'] ?? '#ffffff';

    
    $host = 'localhost';$db   = 'exercicio';
    $user = 'root';$pass = 'Senai@118';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $stmt =$pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $stmt->execute([':usuario' =>$usuario_input]);
        $usuario_bd =$stmt->fetch(PDO::FETCH_ASSOC);

        
        if ($usuario_bd && ($senha_input ===$usuario_bd['senha'] || password_verify($senha_input,$usuario_bd['senha']))) {
            $_SESSION['usuario'] =$usuario_bd['usuario'];
            $_SESSION['cor_fundo'] =$cor_input;

            header("Location: 15d_perfil.php");
            exit;
        } else {
            $erro = "Usuário ou senha incorretos!";
        }
    } catch (PDOException $e) {$erro = "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Perfil de Usuário</title>
</head>
<body>
    <h2>Login do Sistema</h2>

    <?php if (!empty($erro)): ?>
        <p style="color: red;"><?php echo ($erro); ?></p>
    <?php endif; ?>

    <form action="15d_login.php" method="POST">
        <p>
            <label for="usuario">Usuário:</label><br>
            <input type="text" id="usuario" name="usuario" required>
        </p>
        <p>
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required>
        </p>
        <p>
            <label for="cor">Cor de Fundo da Página:</label><br>
            <input type="color" id="cor" name="cor" value="#ffffff">
        </p> 
        <button type="submit">Entrar</button>
    </form>
</body>
</html>