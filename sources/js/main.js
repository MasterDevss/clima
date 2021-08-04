const probar = document.querySelector("#probar");

const ruta = "api/";

fetch( ruta )
.then(respuesta => respuesta.json())
.then(data => {
    if(data.info && data.tipo) {
        console.log("Error ocurrido al detectar la ubicacion")
    }
})
