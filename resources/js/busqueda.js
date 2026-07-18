document.addEventListener("DOMContentLoaded", function () {
    const buscador = document.getElementById("buscador");
    const listaArticulos = document.getElementById("listaArticulos");
    const mensajeNoEncontrado = document.getElementById("mensajeNoEncontrado");
  
    // Ocultar la lista y el mensaje al principio
    listaArticulos.style.display = "none";
    mensajeNoEncontrado.style.display = "none";
  
    // Agregar un evento input para manejar la entrada del buscador
    buscador.addEventListener("input", function (e) {
        const searchTerm = e.target.value.toLowerCase();
        let found = false;
  
        document.querySelectorAll(".articulo").forEach(fruta => {
            const frutaTexto = fruta.textContent.toLowerCase();
  
            if (frutaTexto.includes(searchTerm)) {
                fruta.classList.remove("filtro");
                found = true;
            } else {
                fruta.classList.add("filtro");
            }
        });

        // Mostrar u ocultar la lista y el mensaje dependiendo de si hay un término de búsqueda
        if (searchTerm.trim() !== "") {
            if (found) {
                listaArticulos.style.display = "block";
                mensajeNoEncontrado.style.display = "none";
            } else {
                listaArticulos.style.display = "none";
                mensajeNoEncontrado.style.display = "block";
            }
        } else {
            listaArticulos.style.display = "none";
            mensajeNoEncontrado.style.display = "none";
        }
    });
  
    // Agregar un evento para manejar la recarga de la página
    window.addEventListener("load", function () {
        // Ocultar la lista y el mensaje si el buscador está vacío al cargar la página
        if (buscador.value.trim() === "") {
            listaArticulos.style.display = "none";
            mensajeNoEncontrado.style.display = "none";
        } else {
            listaArticulos.style.display = "block";
            mensajeNoEncontrado.style.display = "none";
        }
    });
});
