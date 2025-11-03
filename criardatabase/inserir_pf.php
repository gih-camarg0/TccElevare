<?php
 $nomePf = htmlspecialchars(trim($_POST["Nome completo"]));
 $cpf = htmlspecialchars(trim($_POST["CPF"]));   
 $escolaridade = htmlspecialchars(trim($_POST["Escolaridade"]));
 $telefonePf = htmlspecialchars(trim($_POST["Telefone"]));
 $emailPf = htmlspecialchars(trim($_POST["Email"]));
 $formacaoPf = htmlspecialchars(trim($_POST["Formação Profissional"]));
 $senhaPf = htmlspecialchars(trim($_POST["Senha de Acesso"]));

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
$stmt = $conn->prepare("INSERT INTO mensagens_contato (nomePf, cpf, escolaridade, telefonePf, emailPf, formacaoPf, sehaPf) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nomePf, $cpf, $escolaridade, $telefonePf, $emailPf, $formacaoPf, $senhaPf);
    $stmt->execute();

$stmt->close();
$conn->close();
?>