const tempStructure = (data)=> {

    // Creando los elementos de la zona de temperatura

    const divMainTemp = document.createElement('article');
    const h2Temp = document.createElement('h2')
    const divTempSecundary = document.createElement('article');
    const tempMin =document.createElement('p');
    const tempFeel =document.createElement('p');
    const tempMax =document.createElement('p');

    // Agregando las clases

    divMainTemp.classList.add("main__temp-container");
    h2Temp.classList.add("main__temp");
    divTempSecundary.classList.add("main__temp-secundary");
    tempMin.classList.add("main__temp-min");
    tempFeel.classList.add("main__temp-feel-like");
    tempMax.classList.add("main__temp-max");

    // Agregando datos a los elementos

    h2Temp.textContent = `Temperatura Actual ${data.main.temp}°`;
    tempMin.textContent = `Temperatura minima ${data.main.temp_min}°`;
    tempFeel.textContent = `Se siente como unos ${data.main.feels_like}°`;
    tempMax.textContent = `Temperatura maxima ${data.main.temp_max}°`;

    // Organizando los contenedores

    divTempSecundary.appendChild(tempMin);
    divTempSecundary.appendChild(tempFeel);
    divTempSecundary.appendChild(tempMax);

    divMainTemp.appendChild(h2Temp);
    divMainTemp.appendChild(divTempSecundary);

    return divMainTemp;


}

const getData = async ()=> {
    const request = await fetch("api/");
    const data = await request.json();
    if(data.info == "La URL introducida no es válida") return false;
    else return data;
}

let clima = await getData();

if(clima == false) {
    alert('No se pudo detectar tu ubicacion')
}else {
    let data = tempStructure(clima);
    console.log(clima)
    let block = document.querySelector('.main__container');
    const fragment = document.createDocumentFragment();
    fragment.appendChild(data);
    block.appendChild(fragment)
}



