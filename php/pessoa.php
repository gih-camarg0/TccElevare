<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "add_vagas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM vaga ORDER BY id DESC";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elevare - Pessoa Física</title>
    
    <link rel="shortcut icon" type="imagex/png" href="../assets/logotipo.png">

    <link rel="stylesheet" href="../css/empresas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header> <!-- HEADER -->
        <div class="header" id="header">
            <button onclick="toggleSidebar()" class="btn_icon_header">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="logo_header">
                <img src="assets/logo.png" alt="">
            </div>
            <div class="navigation_header" id="navigation_header">
                <button onclick="toggleSidebar()" class="btn_icon_header">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                    <a href="index.html">Home</a>
                    <a href="pesfis.html">Vacancies</a>
                    <a href="sobre.html">Sobre nós</a>
                    <a href="autentificacao/login.html"><i class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </header>

    <div id="geral_container">
        <div class="initial-icons">
            <div class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="input_field" class="input-field" placeholder="Pesquisar">
            </div>
    
            <button class="btn-ajuda">
                <a href="#"><i class="fa-solid fa-question"></i></a>
            </button>
        </div>            
            
        <div id="container">;
            <div class="lista-vagas">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<ul class="vagas">';
                    echo '<li class="vaga">';
                    echo '<img class="vaga-logo" src="projetos/logos/Vitalatte.jpg" alt="logo da empresa">';
                    echo '<div class="vaga-content">';
                    echo '<p data-content="content1" class="vaga-title">' . htmlspecialchars($row['funcao']) . '</p>';
                    echo '<p class="vaga-contratante">' . htmlspecialchars($row['empresa']) . '</p>';
                    echo '<p class="vaga-tempo">Há 10 horas.</p>';
                    echo '</div>';
                    echo '</li>';
                    echo '<li id="no_results">';
                    echo '<p>Nenhum resultado encontrado</p>';
                    echo '</li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '<div class="card-vagas">';
                    echo '<div id="content1" class="content">';
                    echo '<div class="topo">';
                    echo '<img class="topo-logo" src="projetos/logos/Vitalatte.jpg" alt="logo da empresa">';
                    echo '<div class="topo-text">';
                    echo '<p class="topo-title">' . htmlspecialchars($row['funcao']) . '</p>';
                    echo '<p class="topo-contratante">' . htmlspecialchars($row['empresa']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<button class="btn-card">Cadrastrar-se</button>';
                    echo '<div class="vagas-informacoes">';
                    echo '<div class="info-vaga">';
                    echo '<p class="titulo-info">Responsabilidade e atuação</p>';
                    echo '<p class="text-info">' . htmlspecialchars($row['atuacao']) . '</p>';
                    echo '<p class="titulo-info">Requisitos e qualificações</p>';
                    echo '<p class="text-info">' . htmlspecialchars($row['requisitos']) . '</p>';
                    echo '<p class="titulo-info">Informações adicionais</p>';
                    echo '<p class="text-info">' . htmlspecialchars($row['informacoes']) . '</p>';
                    echo '</div>';
                    echo '<button id="read_button">Read more</button>';
                    echo '</div>';
                    echo '<div class="desc-vaga">';
                    echo '<div class="desc">';
                    echo '<p class="title-desc">Nível de experiência</p>';
                    echo '<p class="text-desc"> . htmlspecialchars($row['nivel']) . '</p>';
                    echo '</div>';
                    echo '<div class="desc">';
                    echo '<p class="title-desc">Função</p>';
                    echo '<p class="text-desc"> . htmlspecialchars($row['funcao']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="desc-vaga2">';
                    echo '<div class="desc">';
                    echo '<p class="title-desc">Carga horária</p>';
                    echo '<p class="text-desc"> . htmlspecialchars($row['carga']) . '</p>';
                    echo '</div>';
                    echo '<div class="desc">';
                    echo '<p class="title-desc">Setor</p>';
                    echo '<p class="text-desc"> . htmlspecialchars($row['setor']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
            }
                }else {
                echo '<p class="sem-vagas">Nenhuma vaga disponível no momento.</p>';
            }
                $conn->close();
            ?>
    </div>

    <footer> <!-- FOOTER -->
        <div id="copyright">
            &#169
            2025
            ELEVARE.
       </div>
    </footer>

    <script src="../js/pesfis.js"></script>
</body>
</html>