<?php
    $nomecnt = htmlspecialchars(trim($_POST["Nome"]));
    $emailcnt = htmlspecialchars(trim($_POST["E-mail"]));
    $telefonecnt = htmlspecialchars(trim($_POST["Telefoe"]));
    $perfilcnt = htmlspecialchars(trim($_POST["Perfil"]));
    $proprietario = htmlspecialchars(trim($_POST["Função da pessoa que entrou em contato"]));
    

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
$sql = "CREATE TABLE IF NOT EXISTS tblContato(
nome varchar(100) not null,
email varchar(50)  not null ,
telefone varchar(20)  not null,
perfil varchar(150),
proprietario enum ('Proprietário', 'Gerente', 'Coordenador', 'Vendedor', 'Assistente') not null,
proposta text
)";

$sql = ("INSERT INTO tblContato (nome, email, telefone, perfil, proprietario, proposta) VALUES (?, ?, ?, ?, ?, ?)");
$stmt = $conn->prepare ($sql);
if ($stmt === false) {
    die ("Erro" . $conn-> error);
}
$stmt->bind_param("ssssss", $nomecnt, $emailcnt, $telefonecnt , $perfilcnt , $proprietario );

if ($stmt->execute ()) {
    header ("Location: iaction.php");
}

$conn->close();
?>