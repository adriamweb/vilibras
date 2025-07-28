<?php
require_once '../../config/conecta.php'; 

conecta();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];

    $stmt = $mysqli->prepare("SELECT id_usuario FROM usuario WHERE reset_token =? AND reset_expiration > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        desconecta();
        header("Location: ../../pages/senha/recuperarSenhaForm.php?status=error&message=Token inválido ou expirado.");
        exit;
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("UPDATE usuario SET senha =?, reset_token = NULL, reset_expiration = NULL WHERE reset_token =?");
    $stmt->bind_param("ss", $hashed_password, $token);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        desconecta();
        header("Location: ../../pages/usuario/login.php?status=success&message=Senha redefinida com sucesso.");
    } else {
        desconecta();
        header("Location: ../../pages/senha/recuperarSenhaForm.php?status=error&message=Erro ao redefinir senha.");
    }
}

desconecta();
?>
