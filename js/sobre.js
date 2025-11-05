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