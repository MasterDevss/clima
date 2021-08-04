const probar = document.querySelector("#probar");

const ruta = "api/";

fetch( ruta )
.then(respuesta => respuesta.json())
.then(data => {
    console.clear();
    console.log( data );
});
