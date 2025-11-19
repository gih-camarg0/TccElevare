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

# Coletando dados do formulário
$tipo          = $_POST['tipo'] ?? '';
$nome          = $_POST['nome'] ?? '';
$email         = $_POST['email'] ?? '';
$senha         = $_POST['senha'] ?? '';
$documento     = $_POST['documento'] ?? '';
$telefone      = $_POST['telefone'] ?? '';
$escolaridade  = $_POST['escolaridade'] ?? '';
$formacao      = $_POST['formacao'] ?? '';
$segmento      = $_POST['segmento'] ?? '';
$site          = $_POST['site'] ?? '';
$localizacao   = $_POST['localizacao'] ?? '';

# Validação mínima
if (empty($nome) || empty($email) || empty($senha) || empty($tipo)) {
    die("Erro: Preencha todos os campos obrigatórios.");
}

# Senha criptografada
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

# Preparando o SQL
$sql = "INSERT INTO usuarios 
(nome, email, senha, tipo, documento, telefone, escolaridade, formacao, segmento, site, localizacao)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssssssssss",
    $nome,
    $email,
    $senha_hash,
    $tipo,
    $documento,
    $telefone,
    $escolaridade,
    $formacao,
    $segmento,
    $site,
    $localizacao
);

if ($stmt->execute()) {
    // Redireciona de volta para o login após cadastrar
    header("Location: ../login.html?cadastro=sucesso");
    exit;
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
