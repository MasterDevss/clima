export class DateInfo { // Clase para obtener los datos de la fecha 
    constructor() {
        this.month = new Date().getMonth();
        this.day = new Date().getDay();
        this.monthName = "";
        this.dayNames = {
            0 : "Domingo",
            1 : "Lunes",
            2 : "Martes",
            3 : "Miercoles",
            4 : "Jueves",
            5 : "Viernes",
            6 : "Sabado"
        };
        this.dateArr = [];
    }
    getActualDate() {
        const date = new Date();

        if(this.month >= 0 || this.month <= 12) {
            date.setMonth(this.month);
            this.monthName = Intl.DateTimeFormat("es-ES",{ month : 'long' }).format(date);
        }
        
        this.dateArr[0] = this.dayNames[this.day];
        this.dateArr[1] = date.getDate();
        this.dateArr[2] = this.monthName;
        this.dateArr[3] = date.getFullYear();
        
        return this.dateArr;
    }
}