<?php
session_start();
include "conexao.php"; // ajuste se o nome for diferente

$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta no banco
$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $dados = $result->fetch_assoc();
    $_SESSION['usuario'] = $dados['id'];
    $_SESSION['tipo'] = $dados['tipo']; // pessoa_fisica ou empresa

    // Redirecionar empresa
    if ($dados['tipo'] === "empresa") {
        header("Location: ../empresas.html");
        exit;
    }

    // Redirecionar pessoa física
    header("Location: pessoa.php");
    exit;

} else {
    header("Location: ../login.html?erro=1");
    exit;
}
?>
