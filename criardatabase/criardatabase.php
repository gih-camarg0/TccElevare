<?php
if ($_server["REQUEST_METHOD"] == "POST") {

    $nomePf = htmlspecialchars(trim($_POST["Nome completo"]));
    $cpf = htmlspecialchars(trim($_POST["CPF"]));   
    $escolaridade = htmlspecialchars(trim($_POST["Escolaridade"]));
    $telefonePf = htmlspecialchars(trim($_POST["Telefone"]));
    $emailPf = htmlspecialchars(trim($_POST["Email"]));
    $formacaoPf = htmlspecialchars(trim($_POST["Formação Profissional"]));
    $senhaPf = htmlspecialchars(trim($_POST["Senha de Acesso"]));


    $nomeEm = htmlspecialchars(trim($_POST["Nome da empresa"]));
    $segmentoem = htmlspecialchars(trim($_POST["Segmento da empresa"])); 
    $localizacao = htmlspecialchars(trim($_POST["Localização"]));
    $cnpj = htmlspecialchars(trim($_POST["CNPJ"])); 
    $site = htmlspecialchars(trim($_POST["Site / rede oficial"]));
    $emailem = htmlspecialchars(trim($_POST["Email"]));
    $telefoneem = htmlspecialchars(trim($_POST["Telefone"]));
    $senhaem = htmlspecialchars(trim($_POST["Senha para Acesso"]));
    

$servername = "localhost";
$username = "root";
$password = "";

//criar conexao
$conn = new mysqli($servername, $username, $password);

//verifique a conexao
if ($conn->connect_error) {
    die("Falha na conexão " . $conn->connect_error);
}

//criar banco de dados
$sql = "CREATE DATABASE IF NOT EXISTS DBElevare;
USE DBElevare;

CREATE TABLE IF NOT EXISTS tblPf(
nome varchar(100) not null,
cpf varchar(11) not null primary key,
escolaridade varchar(100) not null,
telefone varchar(20) not null,
email varchar(50) not null,
formacao varchar(200) not null,
senha varchar(100) not null
);
CREATE TABLE IF NOT EXISTS tblEmpresa(
nome varchar(100) not null,
segmento varchar(100) not null,
localizacao varchar(100) not null,
cnpj varchar(11) not null primary key,
redeoficial varchar(200) not null,
email varchar(50) not null,
telefone varchar(20) not null,
senha varchar(100) not null
);
";

$stmt = $conn->prepare("INSERT INTO tblPf (nome, cpf, escolaridade, telefone, email, formacao, senha) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sss", )

$conn->close();
} else {
    header("Location: autentificacao/cadastro.html");
    exit();
}
?>