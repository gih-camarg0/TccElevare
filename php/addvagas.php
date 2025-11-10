<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "add_vagas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection_failed");
}

$empresa = $_POST['empresa'] ?? '';
$funcao = $_POST['funcao'] ?? '';
$cidade = $_POST['cidade'] ?? '';
$estado = $_POST['estado'] ?? '';
$atuacao = $_POST['atuacao'] ?? '';
$requisitos = $_POST['requisitos'] ?? '';
$informacoes = $_POST['informacoes'] ?? '';
$nivel = $_POST['nivel'] ?? '';
$carga = $_POST['carga'] ?? '';
$setor = $_POST['setor'] ?? '';

$sql = "INSERT INTO vaga (empresa, funcao, cidade, estado, atuacao, requisitos, informacoes, nivel, carga, setor)
VALUES ('$empresa', '$funcao', '$cidade', '$estado', '$atuacao', '$requisitos', '$informacoes', '$nivel', '$carga', '$setor')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error: " . $conn->error;
}

$conn->close();
?>
