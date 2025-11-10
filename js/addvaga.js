function showToast(message, error = false) {
    const toast = document.getElementById("toast");
    toast.textContent = message;
    toast.classList.toggle("error", error);
    toast.style.opacity = "1";
    
    setTimeout(() => {
        toast.style.opacity = "0";
    }, 3000);
}

document.querySelector("form").addEventListener("submit", function(e){
    e.preventDefault();

    const formData = new FormData(this);

    fetch("php/addvagas.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(response => {
        if(response.trim() === "success"){
            showToast("✅ Vaga cadastrada com sucesso!");
            this.reset();
        } else {
            showToast("❌ Erro ao cadastrar vaga", true);
        }
    })
    .catch(() => showToast("❌ Falha de conexão", true));
});