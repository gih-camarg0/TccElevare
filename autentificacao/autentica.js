const container = document.getElementById('container');
const empresaBtn = document.getElementById('empresa');
const pessoaBtn = document.getElementById('pes-fis');

empresaBtn.addEventListener('click', () => {
    container.classList.add("active");
});

pessoaBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

/*Ver senha login*/
let senhaV = document.querySelector('#verSenha')

senhaV.addEventListener('click', ()=>{
    let inputSenha = document.querySelector('#senha')

    if(inputSenha.getAttribute('type') == 'password'){
        inputSenha.setAttribute('type', 'text')
    }else{
        inputSenha.setAttribute('type', 'password')
    }
});

/*Ver senha cadastro*/
let senhaVer = document.querySelector('#SenhaVer')

senhaVer.addEventListener('click', ()=>{
    let inputSenha = document.querySelector('#senha')

    if(inputSenha.getAttribute('type') == 'password'){
        inputSenha.setAttribute('type', 'text')
    }else{
        inputSenha.setAttribute('type', 'password')
    }
});