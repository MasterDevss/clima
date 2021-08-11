<<<<<<< HEAD
import { Weather } from "./weather_request.js";
import { DateInfo } from "./date_info.js";

const updateDateInfo = (data)=> { 
    // Funcion que modifica los datos de la fecha instanciando a la clase DateInfo()
    document.querySelector(".header__day").textContent = data[0];
    document.querySelector(".header__date-day").textContent = data[1];
    document.querySelector(".header__date-month").textContent = data[2];
    document.querySelector(".header__date-year").textContent = data[3];
}

const updateWeatherInfo =  async ()=> {
    // Funcion que modifica los datos del clima de manera asincrona instanciando a la clase Weather()
    let weatherInfo = await new Weather("api/").getWeather();
    if(weatherInfo == false) {
        alert('No se pudo detectar tu ubicacion, verifica tu conexion a internet y recarga la pagina');
        clearInterval(interval);
    }else {
        document.querySelector(".main__temp").textContent = `${weatherInfo.main.temp}`;
        document.querySelector(".main__weather").textContent = `${weatherInfo.weather[0].description}`;
        document.querySelector(".main__humidity").textContent = `${weatherInfo.main.humidity}`;
        document.querySelector(".main__wind").textContent = `${weatherInfo.wind.speed}`;
        document.querySelector(".main__city-name").textContent = `${weatherInfo.city}`;
    }
}

updateDateInfo(new DateInfo().getActualDate());

updateWeatherInfo(); // Se llama a la funcion para que muestre por primera ves los datos del clima
// Se establece un intervalo para que el clima se actualice cada 30 minutos
const interval = setInterval(updateWeatherInfo, 1800000);


=======
"use strict";

// Geolocalizacion por el fronted

// const position = navigator.geolocation;

// const getPosition = (pos)=> {
//     let coordenadas = `${pos.coords.latitude},${pos.coords.longitude}`;
//     fetch(`api/?coordenadas=${coordenadas}`)
//     .then(respuesta => respuesta.json())
//     .then(data => {
//         console.log( data );
//     });
// }
// const getErrorPosition = ()=> {
//     return "Error ocurrido"
// }

// position.getCurrentPosition(getPosition,getErrorPosition);

// Obtener datos por el codigo postal de la ciudad 
>>>>>>> ae13935bc4df0e205526be2ccba88726bb354528



