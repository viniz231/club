<?php
// Conectar ao banco de dados
$servername = "sql213.infinityfree.com";
$username = "if0_37799874";
$password = "32743245nike";
$dbname = "if0_37799874_cadastro_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Receber os dados via POST
$novoLogin = $_POST['login'];
$novaSenha = $_POST['senha'];

// Aqui você deve pegar o ID do usuário logado de alguma forma, por exemplo, através de uma sessão.
$idUsuario = 1; // Exemplo de ID do usuário (substitua com a sessão real)

$sql = "UPDATE usuarios SET login='$novoLogin', senha='$novaSenha' WHERE id=$idUsuario";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro atualizado com sucesso!";
} else {
    echo "Erro ao atualizar cadastro: " . $conn->error;
}

$conn->close();
?>
