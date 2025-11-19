<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "conexaoL.php";

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$sql = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $dados = $result->fetch_assoc();
    if (!password_verify($senha, $dados['senha'])) {
        header("Location: ../login.html?erro=1");
        exit;
    }

    $_SESSION['usuario'] = $dados['id'];
    $_SESSION['tipo'] = $dados['tipo'];

    if ($dados['tipo'] == "empresa") {
        if (headers_sent($file, $line)) {
            error_log("Headers já enviados em $file na linha $line");
        }
        header("Location: ../empresas.html");
        exit;
    }

    else if ($dados['tipo'] === "pessoa_fisica") {
        header("Location: ../php/pessoa.php");
        exit;
    }
}
exit;
