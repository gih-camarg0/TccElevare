<?php
session_start();

if (!file_exists("conexaoL.php")) {
    if (!file_exists("../conexaoL.php")) {
        die("Erro: arquivo conexaoL.php não encontrado.");
    } else {
        include "../conexaoL.php";
    }
} else {
    include "conexaoL.php";
}

if (!isset($conn)) {
    die("Erro: conexão com o banco não foi estabelecida.");
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $dados = $result->fetch_assoc();
    $_SESSION['usuario'] = $dados['id'];
    $_SESSION['tipo'] = $dados['tipo'];

    if ($dados['tipo'] === "empresa") {
        header("Location: ../empresas.html");
        exit;
    } else {
        header("Location: pessoa.php");
        exit;
    }

} else {
    header("Location: ../login.html?erro=1");
    exit;
}
?>
