const probar = document.querySelector("#probar");

const ruta = "api/";

if (probar) {
    probar.onclick = () => {
        if (probar) {
            fetch(ruta)
                .then(respuesta => respuesta.json())
                .then(data => {
                    console.clear();
                    console.log(data);
                });
        }
    }
}