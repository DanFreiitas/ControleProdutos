document.addEventListener("DOMContentLoaded", function () {
    const selectCategoria = document.getElementById("categoria");
    const divNovaCategoria = document.getElementById("divNovaCategoria");

    const labelNovaCategoria = document.createElement("label");
    labelNovaCategoria.textContent = "Nova categoria: *";
    labelNovaCategoria.className = "mt-3";
    const inputNovaCategoria = document.createElement("input");
    inputNovaCategoria.type = "text";
    inputNovaCategoria.name = "novaCategoria";
    inputNovaCategoria.className = "form-control";
    inputNovaCategoria.placeholder = "Digite o nome da nova categoria";

    function novaCategoria() {
        if (selectCategoria.value === "novaCategoria") {

            divNovaCategoria.appendChild(labelNovaCategoria);
            divNovaCategoria.appendChild(inputNovaCategoria);
            divNovaCategoria.style.display = "block";
        } else {

            divNovaCategoria.style.display = "none";
            divNovaCategoria.innerHTML = ""; // Remove o conteúdo da div
        }
    }

    selectCategoria.addEventListener("change", novaCategoria);

    novaCategoria();
});
