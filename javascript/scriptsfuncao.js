function mostrarSenha() {
    const senhaOculta = document.getElementById('senha-oculta');
    const senhaReal = document.getElementById('senha-real');
    const botao = document.getElementById('mostrar-btn');
    
    if (senhaReal.style.display === "none") {
        senhaOculta.style.display = "none";
        senhaReal.style.display = "inline";
        botao.textContent = "Ocultar";
    } else {
        senhaOculta.style.display = "inline";
        senhaReal.style.display = "none";
        botao.textContent = "Mostrar";
    }
}