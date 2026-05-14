<?php 
require 'conexao.php';
session_start();
$mensagem = "";
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email=trim($_POST['email']);
    $password=trim($_POST['senha']);

    $sql="SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user && $password=$user['senha']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['tipo'] = $user ['tipo'];
        header("Location:painel.php");
        exit;
    } else {
        $mensagem = "<p class='error'>Email ou senha inválidos.</p>";
    }
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login - Biblioteca</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Login</h1>
    <?php echo $mensagem; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>