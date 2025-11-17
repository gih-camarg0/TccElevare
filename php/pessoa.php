<?php
    // conexão
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

    // trazer todas as vagas para um array para podermos usar a primeira vaga no card e também listar
    $rows = [];
    if ($result && $result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    }

    // fechar conexao depois do uso (vai fechar ao final também)
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elevare - Pessoa Física</title>
    <link rel="shortcut icon" type="imagex/png" href="../assets/logotipo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Alegreya:wght@400;700&display=swap');

    :root{
        --alternative-color:#001511;
        --primary-color:#1FB19B;
        --secondary-color:#207E70;
        --text-color:#C5C5C5;
    }

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Alegreya", serif;
    }

    body{
        background: #ffffff;
        color: #222;
    }

    /* HEADER */
    .header{
        padding: 25px 80px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo_header img{
        width: 210px;
    }

    .navigation_header{
        display: flex;
        gap: 45px;
        align-items: center;
    }

    .navigation_header a{
        font-size: 22px;
        text-decoration: none;
        color: #00473E;
        font-weight: 700;
    }

    .navigation_header a:hover{
        color: var(--secondary-color);
    }

    /* SEARCH */
    .initial-icons{
        margin: 10px 80px;
        width: calc(100% - 160px);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .search{
        display: flex;
        align-items: center;
        width: 420px;
        background: #E0E0E0;
        height: 45px;
        border-radius: 30px;
        padding: 0 20px;
    }

    .search i{
        font-size: 24px;
        margin-right: 10px;
        color: #333;
    }

    .search input{
        width: 100%;
        border: none;
        outline: none;
        background: transparent;
        font-size: 18px;
    }

    .btn-ajuda{
        width: 50px;
        height: 50px;
        background: #E0E0E0;
        border: none;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-ajuda i{
        font-size: 22px;
        color: #003028;
    }

    /* CONTAINER */
    #container{
        display: flex;
        padding: 20px 80px;
        gap: 40px;
        align-items: flex-start;
    }

    /************* LISTA DE VAGAS *************/
    .lista-vagas{
        width: 50%;
    }

    .vagas{
        list-style: none;
    }

    .vaga{
        display: flex;
        gap: 15px;
        padding: 18px 0;
        border-bottom: 1px solid #DDD;
        cursor: pointer;
        align-items: center;
    }

    .vaga:hover{
        background: #FAFAFA;
    }

    .vaga-logo{
        width: 70px;
        height: 70px;
        object-fit: contain;
        border-radius: 6px;
        background: #fff;
        padding: 5px;
        box-shadow: 0 0 0 1px #eee;
    }

    .vaga-content{
        display: flex;
        flex-direction: column;
    }

    .vaga-title{
        font-size: 20px;
        font-weight: bold;
        color: #2B2B2B;
    }

    .vaga-contratante,
    .vaga-tempo{
        font-size: 15px;
        color: #464646;
    }

    #no_results {
        display: none;
        text-align: center;
        padding: 20px 0;
        color: #777;
    }

    /************** CARD DA DIREITA **************/
    .card-vagas{
        width: 50%;
        background: #F3F3F3;
        padding: 24px;
        border-radius: 6px;
        min-height: 480px;
    }

    .topo{
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .topo-logo{
        width: 75px;
        height: 75px;
        object-fit: contain;
    }

    .topo-text{
        display: flex;
        flex-direction: column;
    }

    .topo-title{
        font-size: 22px;
        font-weight: 700;
        color: #2B2B2B;
    }

    .topo-contratante{
        font-size: 16px;
        color: #5A5A5A;
    }

    .btn-card{
        margin-top: 18px;
        background: var(--primary-color);
        border: none;
        padding: 8px 18px;
        font-size: 16px;
        font-weight: bold;
        color: white;
        border-radius: 25px;
        cursor: pointer;
    }

    .btn-card:hover{
        background: var(--secondary-color);
    }

    .info-vaga{
        margin-top: 20px;
        font-size: 15px;
        color: #3B3B3B;
    }

    .titulo-info{
        font-size: 17px;
        font-weight: bold;
        margin-top: 12px;
    }

    .text-info{
        margin-bottom: 10px;
    }

    .desc-vaga,
    .desc-vaga2{
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .desc{
        flex: 1;
    }

    .title-desc{
        font-weight: bold;
        font-size: 15px;
        color: #222;
    }

    .text-desc{
        font-size: 15px;
        color: #333;
    }

    /* FOOTER */
    #copyright{
        margin-top: 50px;
        padding: 25px;
        text-align: center;
        background-color: var(--alternative-color);
        color: var(--text-color);
        font-size: 18px;
    }

    /* responsividade básica */
    @media (max-width: 900px){
        .header, .initial-icons { padding: 20px; }
        #container{ flex-direction: column; padding: 10px 20px; }
        .lista-vagas, .card-vagas { width: 100%; }
        .search{ width: 60%; }
    }
    </style>
</head>
<body>
    <header>
        <div class="header" id="header">
            <div class="logo_header">
                <a href="../index.html"><img src="../assets/logo.png" alt="Elevare"></a>
            </div>

            <div class="navigation_header" id="navigation_header">
                <a href="../index.html">Home</a>
                <a href="pesfis.php">Vagas</a>
                <a href="../sobre.html">Sobre nós</a>
                <a href="../autenticacao/login.html"><i class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </header>

    <div class="initial-icons">
        <div class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="input_field" placeholder="Pesquisar">
        </div>

        <a class="btn-ajuda" href="../ajuda.html" title="Ajuda">
            <i class="fa-solid fa-question"></i>
        </a>
    </div>

    <main id="container">
        <section class="lista-vagas" aria-label="Lista de vagas">
            <ul class="vagas" id="listaVagas">
                <?php if (count($rows) === 0): ?>
                    <li id="no_results"><p>Nenhuma vaga disponível no momento.</p></li>
                <?php else: ?>
                    <?php foreach ($rows as $index => $row): 
                        // preparar campo logo (se não existir, usar default)
                        $logoFile = !empty($row['logo']) ? $row['logo'] : 'default.png';
                        // caminho seguro
                        $logoPath = 'projetos/logos/' . htmlspecialchars($logoFile, ENT_QUOTES);
                        // atributos data para JS
                        $dataAttr = htmlspecialchars(json_encode([
                            'funcao' => $row['funcao'] ?? '',
                            'empresa' => $row['empresa'] ?? '',
                            'atuacao' => $row['atuacao'] ?? '',
                            'requisitos' => $row['requisitos'] ?? '',
                            'informacoes' => $row['informacoes'] ?? '',
                            'nivel' => $row['nivel'] ?? '',
                            'carga' => $row['carga'] ?? '',
                            'setor' => $row['setor'] ?? '',
                            'logo' => $logoPath
                        ], JSON_UNESCAPED_UNICODE|JSON_HEX_APOS|JSON_HEX_QUOT), ENT_QUOTES);
                    ?>
                        <li class="vaga" tabindex="0" data-vaga='<?php echo $dataAttr; ?>' aria-label="<?php echo htmlspecialchars($row['funcao']); ?>">
                            <img class="vaga-logo" src="<?php echo $logoPath; ?>" alt="Logo <?php echo htmlspecialchars($row['empresa']); ?>">
                            <div class="vaga-content">
                                <p class="vaga-title"><?php echo htmlspecialchars($row['funcao']); ?></p>
                                <p class="vaga-contratante"><?php echo htmlspecialchars($row['empresa']); ?></p>
                                <p class="vaga-tempo">Há 10 horas</p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </section>

        <!-- CARD único que será preenchido via JS -->
        <aside class="card-vagas" id="cardVaga" aria-live="polite">
            <?php
            // preencher card inicialmente com a primeira vaga, se existir
            if (count($rows) > 0) {
                $first = $rows[0];
                $firstLogo = !empty($first['logo']) ? $first['logo'] : 'default.png';
                $firstLogoPath = 'projetos/logos/' . htmlspecialchars($firstLogo, ENT_QUOTES);
            ?>
                <div class="topo">
                    <img class="topo-logo" id="cardLogo" src="<?php echo $firstLogoPath; ?>" alt="Logo <?php echo htmlspecialchars($first['empresa']); ?>">
                    <div class="topo-text">
                        <p class="topo-title" id="cardTitulo"><?php echo htmlspecialchars($first['funcao']); ?></p>
                        <p class="topo-contratante" id="cardEmpresa"><?php echo htmlspecialchars($first['empresa']); ?></p>
                    </div>
                </div>

                <button class="btn-card" id="btnCandidatar">Cadastrar-se</button>

                <div class="vagas-informacoes">
                    <div class="info-vaga">
                        <p class="titulo-info">Responsabilidade e atuação</p>
                        <p class="text-info" id="cardAtuacao"><?php echo nl2br(htmlspecialchars($first['atuacao'])); ?></p>

                        <p class="titulo-info">Requisitos e qualificações</p>
                        <p class="text-info" id="cardRequisitos"><?php echo nl2br(htmlspecialchars($first['requisitos'])); ?></p>

                        <p class="titulo-info">Informações adicionais</p>
                        <p class="text-info" id="cardInformacoes"><?php echo nl2br(htmlspecialchars($first['informacoes'])); ?></p>
                    </div>
                </div>

                <div class="desc-vaga">
                    <div class="desc">
                        <p class="title-desc">Nível de experiência</p>
                        <p class="text-desc" id="cardNivel"><?php echo htmlspecialchars($first['nivel']); ?></p>
                    </div>
                    <div class="desc">
                        <p class="title-desc">Função</p>
                        <p class="text-desc" id="cardFuncao"><?php echo htmlspecialchars($first['funcao']); ?></p>
                    </div>
                </div>

                <div class="desc-vaga2">
                    <div class="desc">
                        <p class="title-desc">Carga horária</p>
                        <p class="text-desc" id="cardCarga"><?php echo htmlspecialchars($first['carga']); ?></p>
                    </div>
                    <div class="desc">
                        <p class="title-desc">Setor</p>
                        <p class="text-desc" id="cardSetor"><?php echo htmlspecialchars($first['setor']); ?></p>
                    </div>
                </div>
            <?php } else { ?>
                <p>Nenhuma vaga disponível.</p>
            <?php } ?>
        </aside>
    </main>

    <footer>
        <div id="copyright">
            &#169; 2025 ELEVARE.
        </div>
    </footer>

    <script>
    // Funções JS para atualizar o card quando clicar em uma vaga
    (function(){
        // helper para parse do data-vaga (JSON string)
        function parseDataAttr(str){
            try {
                return JSON.parse(str);
            } catch(e) {
                return {};
            }
        }

        const lista = document.getElementById('listaVagas');
        const vagaItems = lista ? lista.querySelectorAll('.vaga') : [];
        // elementos do card
        const cardLogo = document.getElementById('cardLogo');
        const cardTitulo = document.getElementById('cardTitulo');
        const cardEmpresa = document.getElementById('cardEmpresa');
        const cardAtuacao = document.getElementById('cardAtuacao');
        const cardRequisitos = document.getElementById('cardRequisitos');
        const cardInformacoes = document.getElementById('cardInformacoes');
        const cardNivel = document.getElementById('cardNivel');
        const cardFuncao = document.getElementById('cardFuncao');
        const cardCarga = document.getElementById('cardCarga');
        const cardSetor = document.getElementById('cardSetor');

        function preencherCard(data) {
            if (!data) return;
            if (cardLogo && data.logo) cardLogo.src = data.logo;
            if (cardTitulo) cardTitulo.textContent = data.funcao || '';
            if (cardEmpresa) cardEmpresa.textContent = data.empresa || '';
            if (cardAtuacao) cardAtuacao.innerHTML = (data.atuacao || '').replace(/\n/g, '<br>');
            if (cardRequisitos) cardRequisitos.innerHTML = (data.requisitos || '').replace(/\n/g, '<br>');
            if (cardInformacoes) cardInformacoes.innerHTML = (data.informacoes || '').replace(/\n/g, '<br>');
            if (cardNivel) cardNivel.textContent = data.nivel || '';
            if (cardFuncao) cardFuncao.textContent = data.funcao || '';
            if (cardCarga) cardCarga.textContent = data.carga || '';
            if (cardSetor) cardSetor.textContent = data.setor || '';
        }

        // evento click em cada vaga
        vagaItems.forEach(function(item){
            item.addEventListener('click', function(){
                const raw = this.getAttribute('data-vaga');
                const data = parseDataAttr(raw);
                preencherCard(data);

                // destacar item ativo visualmente (opcional)
                vagaItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });

            // também permitir seleção via teclado (Enter)
            item.addEventListener('keydown', function(e){
                if (e.key === 'Enter' || e.keyCode === 13) {
                    this.click();
                }
            });
        });

        // Pesquisa simples: esconder / mostrar vagas com base no input
        const input = document.getElementById('input_field');
        const noResults = document.getElementById('no_results');
        input && input.addEventListener('input', function(){
            const q = this.value.trim().toLowerCase();
            let shown = 0;
            vagaItems.forEach(function(item){
                const title = (item.querySelector('.vaga-title')?.textContent || '').toLowerCase();
                const company = (item.querySelector('.vaga-contratante')?.textContent || '').toLowerCase();
                if (title.includes(q) || company.includes(q)) {
                    item.style.display = 'flex';
                    shown++;
                } else {
                    item.style.display = 'none';
                }
            });
            if (noResults) {
                noResults.style.display = shown === 0 ? 'block' : 'none';
            }
        });

    })();
    </script>

</body>
</html>