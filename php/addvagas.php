<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "add_vagas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $funcao = $_POST['funcao'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $atuacao = $_POST['atuacao'];
    $requisitos = $_POST['requisitos'];
    $informacoes = $_POST['informacoes'];
    $nivel = $_POST['nivel'];
    $carga = $_POST['carga'];
    $setor = $_POST['setor'];

    $sql = "INSERT INTO contatos (funcao, cidade, estado, atuacao, requisitos, informacoes, nivel, carga, setor) VALUES ('$funcao', '$cidade', '$estado', '$atuacao', '$requisitos', '$informacoes', '$nivel', '$carga', '$setor')";

    if ($conn->query($sql) === TRUE) {
        echo "Informações salvas com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>