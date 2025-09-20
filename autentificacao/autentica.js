const container = document.getElementById('container');
const empresaBtn = document.getElementById('empresa');
const pessoaBtn = document.getElementById('pes-fis');

empresaBtn.addEventListener('click', () => {
    container.classList.add("active");
});

pessoaBtn.addEventListener('click', () => {
    container.classList.remove("active");
});