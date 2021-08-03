# Traducción de la documentación de la API

Esta es una traducción de [Current Weather Data][title]. Además, se agrega información adicional para clarificar la documentación.

[title]: https://openweathermap.org/current "Ir a la fuente original"

## Datos meteorológicos actuales

Acceda a los datos meteorológicos actuales de cualquier lugar de la Tierra, incluidos más de 200.000 ciudades! Recopilamos y procesamos datos meteorológicos de diferentes fuentes, como modelos meteorológicos globales y locales, satélites, radares y una amplia red de estaciones meteorológicas. Los datos están disponibles en los formatos JSON, XML o HTML.

## Llame a los datos meteorológicos actuales para una ubicación

### Por nombre de ciudad

Puede llamar por nombre de ciudad o nombre de ciudad, código de estado y código de país. Tenga en cuenta que la búsqueda por estados solo está disponible para las ubicaciones de EE.UU.

Llamada de API

---

Búsqueda por ciudad:

```none
api.openweathermap.org/data/2.5/weather?q={city name}&appid={API key}
```

Donde `{city name}` es el nombre de la ciudad y `{API key}` la que te proporciona el servicio al momento de registrarse.

Si además, deseas realizar la búsqueda por código de estado `{state code}` podríamos consumir la API de la siguiente manera:

```none
api.openweathermap.org/data/2.5/weather?q={city name},{state code}&appid={API key}
```

También se puede incluir el código de país:

```none
api.openweathermap.org/data/2.5/weather?q={city name},{state code},{country code}&appid={API key}
```

Donde `{country code}` es el código del país.

#### **Parámetros**

| Parámetro | ¿Obligatorio?        | Descripción                                                                                                                                                                                                                                                                                                                                                                                                               |
| --------- | -------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `q`       | Si                   | Nombre de la ciudad, código de estado y código de país dividido por comas. Consulte la norma ISO 3166 para conocer los códigos de estado o de país.<br><br>Puede especificar el parámetro no solo en inglés. En este caso, la respuesta de la API debe devolverse en el mismo idioma que el idioma del nombre de la ubicación solicitada si la ubicación está en nuestra lista predefinida de más de 200,000 ubicaciones. |
| `appid`   | Sí                   | Su clave API única (siempre puede encontrarla en la página de su cuenta en la pestaña "Clave API" ).                                                                                                                                                                                                                                                                                                                      |
| `mode`    | No. <br>Es opcional  | Es el formato de respuesta. Los valores posibles son `xml` y `html`. Si no utiliza el parámetro `mode`, el formato por defecto será **JSON**.                                                                                                                                                                                                                                                                             |
| `units`   | No. <br>Es opcional  | Son unidades de medida. Las unidades`standard`, `metric` e `imperial` están disponibles. Si no utiliza el parámetro `units`, la unidade `standard` se aplicará de forma predetermina.                                                                                                                                                                                                                                     |
| `lang`    | No. <br> Es opcional | Puede utilizar este parámetro para obtener el idioma de salida.                                                                                                                                                                                                                                                                                                                                                           |

#### **Ejemplos de llamada de API**

```none
api.openweathermap.org/data/2.5/weather?q=London&appid={API key}
```

Donde `London` es la ciudad a consultar y `{API key}` es la que le proporciona el servicio al momento de registrarse en él.

En el siguiente ejemplo:

```none
api.openweathermap.org/data/2.5/weather?q=London,uk&appid={API key}
```

Donde `London` es la ciudad de Londres y `uk` es el código del país.

### Llamadas por ID de ciudad

Puede realizar una llamada API por `ID` de ciudad. La lista de `ID` de ciudad 'city.list.json.gz' se puede descargar aquí .

Recomendamos llamar a API por ID de ciudad para obtener un resultado inequívoco para su ciudad.

#### **Llamada a la API**

```none
api.openweathermap.org/data/2.5/weather?id={city id}&appid={API key}
```

Donde `{cidy id}` es ID de la ciudad y `{API key}`

#### **Parámetros**

| Parámetro | ¿Obligatorio?   | Descripción                                                                                                                                                           |
| --------- | --------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `id`      | Si              | **ID** de la ciudad. La lista de **ID** de ciudad `city.list.json.gz` [se puede descargar aquí][lista-id].                                                            |
| `appid`   | Si              | Su clave API única (siempre puede encontrarla en la página de su cuenta en la [pestaña "Clave API"][apikey]).                                                         |
| `mode`    | No. Es opcional | Formato de respuesta. Los valores posibles son `xml` y `html`. Si no usa el parámetro `mode` el formato predeterminado será **JSON**.                                 |
| `units`   | No. Es opcional | Unidades de medida. Las unidades `standard`, `metric` e `imperial` están disponibles. Si no usa el parámetro `units`, de forma predeterminada se aplicará `standard`. |
| `lang`    | No. Es opcional | Puede utilizar este parámetro para obtener el idioma de salida.                                                                                                       |

#### **Ejemplos de llamada de API**

```none
api.openweathermap.org/data/2.5/weather?id=2172797&appid={API key}
```

Donde `{API key}` es la clave asignada durante el registro.

[lista-id]: http://bulk.openweathermap.org/sample/ "Descargar lista de ID de ciudades"
[apikey]: https://home.openweathermap.org/api_keys "Ir a la clave de la API"

### Por coordenadas geográficas

#### **Llamada de API**

---

```none
api.openweathermap.org/data/2.5/weather?lat={lat}&lon={lon}&appid={API key}
```

Donde `lat={lat}` es la latitud, `lon={lon}` es la longitud y `appid={API key}` es la API asignada durante el registro.

#### **Parámetros**

| Parámetro     | ¿Obligatorio?   | Descripción                                                                                                                                                           |
| ------------- | --------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `lat` y `lon` | Si              | Coordenadas geográficas (latitud, longitud).                                                                                                                          |
| `appid`       | Si              | Su clave API única (siempre puede encontrarla en la página de su cuenta en la [pestaña "Clave API"][apikey])                                                          |
| `mode`        | No. Es opcional | Formato de respuesta. Los valores posibles son `xml` y `html`. Si no usa el parámetro `mode` el formato predeterminado será **JSON**.                                 |
| `units`       | No. Es opcional | Unidades de medida. Las unidades `standard`, `metric` e `imperial` están disponibles. Si no usa el parámetro `units`, de forma predeterminada se aplicará `standard`. |
| `lang`        | No. Es opcional | Puede utilizar este parámetro para obtener el idioma de salida.                                                                                                       |

#### **Ejemplos de llamada a la API**

```none
api.openweathermap.org/data/2.5/weather?lat=35&lon=139&appid={API key}
```

### Por código postal

Tenga en cuenta que si no se especifica el país, la búsqueda funciona para EE. UU. De forma predeterminada.

#### **Llamada a la API**

```none
api.openweathermap.org/data/2.5/weather?zip={zip code},{country code}&appid={API key}
```

#### **Parámetros**

| Parámetro | ¿Obligatorio?   | Descripción                                                                                                                                                           |
| --------- | --------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| zip       | Si              | Código postal                                                                                                                                                         |
| `appid`   | Si              | Su clave API única (siempre puede encontrarla en la página de su cuenta en la [pestaña "Clave API"][apikey])                                                          |
| `mode`    | No. Es opcional | Formato de respuesta. Los valores posibles son `xml` y `html`. Si no usa el parámetro `mode` el formato predeterminado será **JSON**.                                 |
| `units`   | No. Es opcional | Unidades de medida. Las unidades `standard`, `metric` e `imperial` están disponibles. Si no usa el parámetro `units`, de forma predeterminada se aplicará `standard`. |
| `lang`    | No. Es opcional | Puede utilizar este parámetro para obtener el idioma de salida.                                                                                                       |

#### **Ejemplos de llamada de API**

```none
api.openweathermap.org/data/2.5/weather?zip=94040,us&appid={API key}
```

## Llame a los datos meteorológicos actuales de varias ciudades

Si solicita datos meteorológicos para varias ubicaciones, obtendrá la respuesta solo en formato **JSON** (los formatos **XML** y **HTML** no están disponibles para estos casos).

### Ciudades dentro de una zona rectangular

La API devuelve los datos de las ciudades dentro del rectángulo definido especificado por las coordenadas geográficas.

#### **Llamada a la API**

```none
api.openweathermap.org/data/2.5/box/city?bbox={bbox}&appid={API key}
```

Donde `{bbox}` es el cuadro delimitador.

#### **Parámetros**

| Parámetro | ¿Obligatorio?   | Descripción                                                                                                                                                           |
| --------- | --------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `bbox`    | Sí              | Cuadro delimitador `[lon-left,lat-bottom,lon-right,lat-top,zoom]`                                                                                                     |
| `appid`   | Si              | Su clave API única (siempre puede encontrarla en la página de su cuenta en la [pestaña "Clave API"][apikey])                                                          |
| `units`   | No. Es opcional | Unidades de medida. Las unidades `standard`, `metric` e `imperial` están disponibles. Si no usa el parámetro `units`, de forma predeterminada se aplicará `standard`. |
| `lang`    | No. Es opcional | Puede utilizar este parámetro para obtener el idioma de salida.                                                                                                       |

#### **Ejemplo de llamada a la API**

```none
api.openweathermap.org/data/2.5/box/city?bbox=12,32,15,37,10&appid={API key}
```

> Hay un límite de 25 grados cuadrados para los gratuitos y de planes inicio .

### Ciudades en círculo

La API devuelve datos de ciudades ubicadas dentro de un círculo definido que se especifica por el punto central (`lat`, `lon`) y número esperado de ciudades (`cnt`) alrededor de este punto.

#### **Llamada a la API**

```none
api.openweathermap.org/data/2.5/find?lat={lat}&lon={lon}&cnt={cnt}&appid={API key}
```

#### **Parámetros**

| Parámetro  | ¿Obligatorio?   | Descripción                                                                                                                                                           |
| ---------- | --------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `lat, lon` | Sí              | Coordenadas geográficas (latitud, longitud).                                                                                                                          |
| `appid`    | Si              | Su clave API única (siempre puede encontrarla en la página de su cuenta en la [pestaña "Clave API"][apikey])                                                          |
| `cnt`      | No. Es opcional | Número de ciudades alrededor del punto que deben devolverse. El número predeterminado de ciudades es 5, el máximo es 50.                                              |
| `mode`     | No. Es opcional | Formato de respuesta. Los valores posibles son `xml` y `html`. Si no usa el parámetro `mode` el formato predeterminado será **JSON**.                                 |
| `units`    | No. Es opcional | Unidades de medida. Las unidades `standard`, `metric` e `imperial` están disponibles. Si no usa el parámetro `units`, de forma predeterminada se aplicará `standard`. |
| `lang`     | No. Es opcional | Puede utilizar este parámetro para obtener el idioma de salida.                                                                                                       |

#### **Ejemplo de llamada a la API**

```none
api.openweathermap.org/data/2.5/find?lat=55.5&lon=37.5&cnt=10&appid={API key}
```

[Visite la fuente para leer la documentación original][fuente]

[fuente]: https://openweathermap.org/current "Visite la fuente para obtener documentación original | Open Weather Map"

---

### Importante

Los iconos se pueden obtener mediante la siguiente URL:

```none
https://openweathermap.org/img/wn/10d@2x.png
```

Por lo tanto, en JavaScript podría hacer lo siguiente:

```js
const icono = `https://openweathermap.org/img/wn/${icon}@2x.png`;
```

Sin embargo, se agregarán las rutas de las imágenes relacionadas al clima de la cliudad consultada. Por lo tanto, pasaría de las siguientes líneas:

```json
{
  ...

  "weather": [
    {
      "id": 800,
      "main": "Clear",
      "description": "cielo claro",
      "icon": "01d"
    }
  ],
  ...
}
```

A estas otras:

```json
{
  ...

  "weather": [
    {
      "id": 800,
      "main": "Clear",
      "description": "cielo claro",
      "icon": "01d",
      "iconos": {
        "iconD": "https://openweathermap.org/img/wn/01d@2x.png",
        "iconN": "https://openweathermap.org/img/wn/01n@2x.png"
      }
    }
  ],
  ...
}
```

Por lo tanto, se tiene ahora la representación gráfica del clima diurno y nocturno.