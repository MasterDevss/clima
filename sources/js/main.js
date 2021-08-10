// const tempStructure = (data)=> {

//     // Creando los elementos de la zona de temperatura

//     const divMainTemp = document.createElement('article');
//     const h2Temp = document.createElement('h2')
//     const divTempSecundary = document.createElement('article');
//     const tempMin =document.createElement('p');
//     const tempFeel =document.createElement('p');
//     const tempMax =document.createElement('p');

//     // Agregando las clases

//     divMainTemp.classList.add("main__temp-container");
//     h2Temp.classList.add("main__temp");
//     divTempSecundary.classList.add("main__temp-secundary");
//     tempMin.classList.add("main__temp-min");
//     tempFeel.classList.add("main__temp-feel-like");
//     tempMax.classList.add("main__temp-max");

//     // Agregando datos a los elementos

//     h2Temp.textContent = `Temperatura Actual ${data.main.temp}°`;
//     tempMin.textContent = `Temperatura minima ${data.main.temp_min}°`;
//     tempFeel.textContent = `Se siente como unos ${data.main.feels_like}°`;
//     tempMax.textContent = `Temperatura maxima ${data.main.temp_max}°`;

//     // Organizando los contenedores

//     divTempSecundary.appendChild(tempMin);
//     divTempSecundary.appendChild(tempFeel);
//     divTempSecundary.appendChild(tempMax);
//     divMainTemp.appendChild(h2Temp);
//     divMainTemp.appendChild(divTempSecundary);

//     return divMainTemp;

// }

// const weatherStructure = (data)=> {

//     // Creando los elementos de la zona de temperatura

//     const mainArticle = document.createElement('article');
//     const imgContainer = document.createElement('article')
//     const img = document.createElement('img');
//     const DescriptionCont =document.createElement('article');
//     const generalWeather =document.createElement('h2');
//     const description =document.createElement('h2');

//     // Agregando las clases

//     mainArticle.classList.add("main__wheather-container");
//     imgContainer.classList.add("main_wheather-img-container");
//     img.classList.add("main__wheather-img");
//     DescriptionCont.classList.add("main__wheather-description-container");
//     generalWeather.classList.add("main__wheather-title");
//     description.classList.add("main__wheather-main");

//     // Agregando datos a los elementos

//     img.src = data.weather[0].iconos.iconD;
//     generalWeather.textContent = data.weather[0].main;
//     description.textContent = data.weather[0].description;

//     // Organizando los contenedores

//     mainArticle.appendChild(imgContainer);
//     imgContainer.appendChild(img);
//     DescriptionCont.appendChild(generalWeather);
//     DescriptionCont.appendChild(description);
//     mainArticle.appendChild(DescriptionCont);
    
//     return mainArticle;
// } 

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
    
    // let block = document.querySelector('.main__container');

    // let dataTemp = tempStructure(clima);
    // const fragmentTemp = document.createDocumentFragment();
    // fragmentTemp.appendChild(dataTemp);
    // block.appendChild(fragmentTemp);

    // console.log(clima);

    // let dataWeather = weatherStructure(clima);
    // const fragmentWeather = document.createDocumentFragment();
    // fragmentWeather.appendChild(dataWeather);
    // block.appendChild(fragmentWeather);
    
    // Empezar a Trabajar desde aqui
    
}



