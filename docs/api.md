# Uso de la API

Deberá crear un archivo denominado `.env` para colocar en él la `API_KEY`. El archivo debe ser creado fuera del directorio raíz del proyecto.

Es decir, se tiene la siguiente estructura:

```none
Proyectos
  - clima/
  - .env
```
Donde `clima` es el directorio raíz del proyecto y `.env` es el archivo donde se almacenará la clave de la API que se asignó durante el registro.

Por ejemplo:

```none
API_KEY = su api key acá sin comillas
```

Una vez hecho el paso anterior puede consultar por:

- Nombre de ciudad.
- Por ID de ciudad.
- Por coordenadas numéricas.
- Por código postal.

Las demás opciones de búsqueda se irán implementando progresivamente.

## Consulta por nombre de ciudad

Para buscar por el nombre ciudad deberá llamar a la API de la siguiente manera:

```none
api/?ciudad={nombre de la ciudad}
```

Es decir, que si utilizamos JavaScript podríamos consumirla así:

```javascript
const ciudad = "Nombre de la ciudad";
fetch(`api/?ciudad=${ciudad}`).
    then(respuesta => respuesta.json())
    then(data => {
        console.log( data );
    });
```

## Consulta por el ID de la ciudad

El `ID` de la ciudad es numérico y para buscar por él el procedimiento es similar al anterior.

Es decir:

```none
api/?id={ID numérico}
```

Con JavaScript lo podríamos implementar así:

```javascript
const id = "ID numérico de la ciudad";
fetch(`api/?id=${id}`).
    then(respuesta => respuesta.json())
    then(data => {
        console.log( data );
    });
```

## Consulta por coordenadas numéricas

En ese caso, debe introducir las coordenadas numéricas de la ciudad que va a consultar.

Por ejemplo:

```none
api/?coordenadas={coordenadas numéricas}
```

Con JavaScript lo podríamos implementar así:

```javascript
const coordenadas = "Por coordenadas numéricas";
fetch(`api/?coordenadas=${coordenadas}`).
    then(respuesta => respuesta.json())
    then(data => {
        console.log( data );
    });
```

## Consulta por código postal

Solo debe introducir el código de la siguiente manera:

```none
api/?postal={código postal}
```
Con JavaScript lo podríamos implementar así:

```javascript
const zipCode = "Código postal";
fetch(`api/?postal=${zipCode}`).
    then(respuesta => respuesta.json())
    then(data => {
        console.log( data );
    });
```