<?php
session_start();

// 1. Ação de Logout
if (isset($_GET['acao']) && $_GET['acao'] === 'logout') {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// 2. Ação de Troca de Cor de Fundo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cor'])) {
    $_SESSION['cor'] = $_POST['cor'];
}

// 3. Processamento de Login
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario === 'admin' && $senha === '123456') {
        $_SESSION['usuario'] = $usuario;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}

$corFundo = $_SESSION['cor'] ?? '#ffffff';
$usuarioLogado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $usuarioLogado ? 'Perfil' : 'Login' ?></title>
</head>
<body style="background-color: <?= $corFundo ?>;">

    <?php if (!$usuarioLogado): ?>
        <!-- TELA DE LOGIN -->
        <h1>Login</h1>

        <?php if ($erro): ?>
            <p style="color: red;"><?= $erro ?></p>
        <?php endif; ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="login" value="1">
            
            <label for="usuario">Usuário</label>
            <input type="text" id="usuario" name="usuario"><br>
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha"><br>
            
            <button type="submit">Entrar</button>
        </form>

    <?php else: ?>
        <!-- TELA DE PERFIL -->
        <h1>Perfil do Usuário</h1>
        <p>Bem-vindo, <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>!</p>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="cor">Escolha a cor de fundo:</label>
            <input type="color" id="cor" name="cor" value="<?= $corFundo ?>"><br>
            <button type="submit">Salvar Cor</button>
        </form>

        <br>
        <a href="<?= $_SERVER['PHP_SELF'] ?>?acao=logout">Sair</a>
    <?php endif; ?>

</body>
</html>