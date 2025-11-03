<?php
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
$dbname = "DBElevare";

//criar conexao
$conn = new mysqli($servername, $username, $password, $dbname);

//verifique a conexao
if ($conn->connect_error) {
    die("Falha na conexão " . $conn->connect_error);
}

// inserir dados
$stmt = $conn->prepare("INSERT INTO mensagens_contato (nomeEm, segmentoem, localizacao, cnpj, site, emailem, telefoneem, senhaem) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nomeEm, $segmentoem, $localizacao, $cnpj, $site, $emailem, $telefoneem, $senhaem);
    $stmt->execute();

$stmt->close();
$conn->close();
?>