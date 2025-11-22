function toast(msg, error=false) {
    const t = document.getElementById("toast");
    t.innerHTML = msg;
    t.className = error ? "error" : "";
    t.style.opacity = "1";
    setTimeout(()=> t.style.opacity = "0", 3000);
  }
  
  document.getElementById("vagaForm").addEventListener("submit", function(e){
    e.preventDefault();
  
    fetch("php/addvagas.php", {
        method: "POST",
        body: new FormData(this)
    })
    .then(r => r.text())
    .then(res => {
        if (res.includes("success")) {
            toast("✅ Vaga cadastrada com sucesso!");
            this.reset();
        } else {
            toast("❌ Erro ao cadastrar vaga", true);
            console.log(res);
        }
    })
    .catch(() => toast("❌ Falha de conexão", true));
  });

  const botao = document.getElementById('btnLeitor');
  const textoBotao = document.getElementById('textoBotao');
  let lendo = false;
  let synth = window.speechSynthesis;

  botao.addEventListener('click', toggleLeitura);

  // Atalho: Alt + L
  document.addEventListener('keydown', (e) => {
    if (e.altKey && e.key.toLowerCase() === 'l') {
      e.preventDefault();
      toggleLeitura();
    }
  });

  function toggleLeitura() {
    if (!lendo) {
      let areaPrincipal = document.querySelector('main, .conteudo, #conteudo');
      let texto = areaPrincipal ? areaPrincipal.innerText : document.body.innerText;

      const fala = new SpeechSynthesisUtterance(texto);
      fala.lang = 'pt-BR';
      fala.rate = 1;
      fala.pitch = 1;

      synth.speak(fala);
      textoBotao.textContent = 'Parar Leitura';
      botao.setAttribute('aria-label', 'Parar leitura em voz alta');
      lendo = true;

      fala.onend = () => resetLeitura();
    } else {
      synth.cancel();
      resetLeitura();
    }
  }

  function resetLeitura() {
    textoBotao.textContent = 'Ler Página';
    botao.setAttribute('aria-label', 'Ativar leitura em voz alta');
    lendo = false;
  }