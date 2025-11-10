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