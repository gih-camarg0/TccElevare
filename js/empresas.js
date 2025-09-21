const searchInput = document.getElementById('input_field');

searchInput.addEventListener('input', (event) => {
    const value = formatString(event.target.value);

    const vagas = document.querySelectorAll('.vagas .vaga');
    const noResults = document.getElementById('no_results');

    let hasResults = false;

    if(value != '') {
        vagas.forEach(vaga => {
            const vagaTitle = vaga.querySelector('.vaga-title').textContent;

            if(formatString(vagaTitle).indexOf(value) !== -1) {
                vaga.style.display = 'flex';

                hasResults = true;
            }else{
                vaga.style.display = 'none';
            }
        })

        if (hasResults) {
            noResults.style.display = 'none';
        } else {
            noResults.style.display = 'block';
        }
    } else {
        vagas.forEach(vaga => vaga.style.display = 'flex');

        noResults.style.display = 'none';
    }
});

function formatString(value) {
    return value
    .toLowerCase()
    .trim()
    .normalize('NFD')
    .replace(/(\u0300-\u036f)/g, '');
}

// JAVA descrição da vaga
const Titlevaga = document.querySelectorAll('.vaga-title');
const contents = document.querySelectorAll('.content');

Titlevaga.forEach(vaga => {
  vaga.addEventListener('click', () => {
    const contentId = vaga.dataset.content;

    // Oculta todos os conteúdos
    contents.forEach(content => {
      content.style.display = 'none';
    });

    // Exibe o conteúdo correspondente à aba clicada
    document.getElementById(contentId).style.display = 'block';
  });
});

// JAVA botão ler mais/menos
var buttonread = document.getElementById('read_button');

buttonread.addEventListener('click', function() {
    var infovaga = document.querySelector('.vagas-informacoes');

    // adiciona ou remove a Class Active
    infovaga.classList.toggle('active');

    if (infovaga.classList.contains('active')) {
        // caso tenha muda para o texto para ler menos
        return buttonread.textContent = 'Read less';
    }
    
    // caso não tenha deixa o texto ler mais
    buttonread.textContent = 'Read more';
});