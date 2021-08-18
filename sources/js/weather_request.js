export class Weather {
    constructor(url) {
        this.url = url;
    }

    async getWeather() {
        const request = await fetch(this.url);
        const data = await request.json();
        if(data.info == "La URL introducida no es válida") return false;
        else return data;
    }
}