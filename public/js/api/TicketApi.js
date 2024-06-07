import { base_url } from "../vars.js";
class TicketApi {
    constructor($way = null, $originLocationCode = null, $destinationLocationCode = null, $date_of = null, $date_Back = null, $adult = null) {
        this.originLocationCode = $originLocationCode;
        this.destinationLocationCode = $destinationLocationCode;
        this.date_of = $date_of;
        this.date_Back = $date_Back;
        this.adult = $adult;
        this.way = $way;
    }

    async getOffres() {
        let xhr = new XMLHttpRequest()
        let link = `${base_url()}/offres?way=${this.way}&originLocationCode=${this.originLocationCode}&destinationLocationCode=${this.destinationLocationCode}&date_of=${this.date_of}&date_Back=${this.date_Back}&adult=${this.adult}`

        xhr.open("GET", link)
        xhr.send();
        return xhr
    }

}

export { TicketApi }