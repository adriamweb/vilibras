<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../public/images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../public/css/redefinirSenha.css">

    <title>VILIBRAS</title>
    <script src="https://kit.fontawesome.com/2bb7425346.js" crossorigin="anonymous"></script>
    <style>

    </style>
</head>

<body>

    <header>
        <?php
        require_once("../base/cabecalho.php");
        $status = $_GET['status'] ?? '';
        $message = $_GET['message'] ?? '';
        ?>
    </header>

    <main>


        <div class="container" id="container">
            <h2>Redefinição de Senha</h2>
            <form action="../../actions/senha/novoRecuperarSenha.php" method="POST">
                <div class="form-group">
                    <span class="emoji">📧</span>
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="Digite o seu melhor email" required>
                </div>
                <button type="submit">Enviar</button>
            </form>

        <?php if ($message): ?>
            <div id="status-message" class="status-message <?= htmlspecialchars($status) ?>" style="display: block;">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php else: ?>
            
        <div id="status-message" class="status-message" style="display: none;"></div>
                <?php endif; ?>
        <div id="status-message" class="status-message" style="display: none;"></div>
        </div>


    </main>


</body>

</html>