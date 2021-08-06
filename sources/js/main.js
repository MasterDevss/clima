const getData = async ()=> {
    const request = await fetch("api/");
    const data = await request.json();
    if(data.info == "La URL introducida no es válida") return "No se pudo detectar tu ubicacion"
    else return data
}

let clima = await getData();
console.log(clima);


