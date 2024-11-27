<?php
// Conexão com o banco de dados
$servername = "sql213.infinityfree.com";
$username = "if0_37799874"; // ou o nome de usuário do seu banco de dados
$password = "32743245nike"; // ou a senha do seu banco de dados
$dbname = "if0_37799874_cadastro_db6"; // Nome do seu banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados via POST
$novoLogin = $_POST['login'];
$novaSenha = $_POST['senha'];

// Sanitize inputs
$novoLogin = $conn->real_escape_string($novoLogin);
$novaSenha = password_hash($novaSenha, PASSWORD_DEFAULT); // Criptografa a senha

// Atualiza o banco de dados
session_start();
$usuario_email = $_SESSION['usuario_email'];

// Atualiza o e-mail e a senha no banco de dados
$sql = "UPDATE usuarios SET login = '$novoLogin', senha = '$novaSenha' WHERE login = '$usuario_email'";

if ($conn->query($sql) === TRUE) {
    // Atualiza a sessão com o novo e-mail
    $_SESSION['usuario_email'] = $novoLogin;
    echo "Cadastro alterado com sucesso!";
} else {
    echo "Erro ao atualizar cadastro: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
