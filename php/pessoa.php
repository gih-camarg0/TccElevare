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
            
            <?php
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "
                <div id="container">
                    <div class="lista-vagas">
                        <ul class="vagas">
                            <li class="vaga">
                                <img class="vaga-logo" src="projetos/logos/Vitalatte.jpg" alt="logo da empresa">
                                <div class="vaga-content">
                                    <p data-content="content1" class="vaga-title">Atendente | São Paulo - SP</p>
                                    <p class="vaga-contratante">Krónes</p>
                                    <p class="vaga-tempo">Há 10 horas.</p>
                                </div>
                            </li>

                            <li id="no_results">
                                <p>Nenhum resultado encontrado</p>
                            </li>
                        </ul>
                    </div>

                    <div class="card-vagas">
                    <div id="content1" class="content">
                        <div class="topo">
                            <img class="topo-logo" src="projetos/logos/Vitalatte.jpg" alt="logo da empresa">
                            <div class="topo-text">
                                <p class="topo-title">{$row['funcao']} | {$row['cidade']} - {$row['estado']}</p>
                                <p class="topo-contratante">Krónes</p>
                            </div>
                        </div>
                        <button class="btn-card">Cadrastrar-se</button>
                        <div class="vagas-informacoes">
                            <div class="info-vaga">
                                <p class="titulo-info">Responsabilidade e atuação</p>
                                <p class="text-info">{$row['atuacao']}</p>

                                <p class="titulo-info">Requisitos e qualificações</p>
                                <p class="text-info">{$row['requisitos']}</p>

                                <p class="titulo-info">Informações adicionais</p>
                                <p class="text-info">{$row['informacoes']}</p>
                            </div>
                                <button id="read_button">Read more</button>
                            </div>
                            <div class="desc-vaga">
                                <div class="desc">
                                    <p class="title-desc">Nível de experiência</p>
                                    <p class="text-desc">{$row['nivel']}</p>
                                </div>

                                <div class="desc">
                                    <p class="title-desc">Função</p>
                                    <p class="text-desc">{$row['funcao']}</p>
                                </div>
                            </div>

                            <div class="desc-vaga2">
                                <div class="desc">
                                    <p class="title-desc">Carga horária</p>
                                    <p class="text-desc">{$row['carga']}</p>
                                </div>

                                <div class="desc">
                                    <p class="title-desc">Setor</p>
                                    <p class="text-desc">{$row['setor']}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>"
            }
                } else {
                    echo "<li id="no_results">
                            <p>Nenhum resultado encontrado</p>
                        </li>";
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