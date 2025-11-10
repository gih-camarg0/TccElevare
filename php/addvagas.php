<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "add_vagas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $sql = "INSERT INTO vaga (empresa, funcao, cidade, estado, atuacao, requisitos, informacoes, nivel, carga, setor)
                VALUES ('$empresa', '$funcao', '$cidade', '$estado', '$atuacao', '$requisitos', '$informacoes', '$nivel', '$carga', '$setor')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Vaga cadastrada com sucesso!";
        } else {
            echo "Erro ao cadastrar vaga: " . $conn->error;
        }
    }
    
    $conn->close();
    ?>