import { TicketApi } from "../api/TicketApi.js";
import { base_url } from "../vars.js";

function videoStart() {
    let video = document.querySelector(".h-video")
    if (video) {
        video.muted = true;
        video.loop = true;
            video.play();
       
    }

}

async function itineraireLoad(offre) {
    let resultArray = [];
    for (const itinerary of offre.itineraries) {
        let fullTime = itinerary.duration.split("PT").pop();
        let hours = fullTime.split("H").shift();
        let minutes = fullTime.replace(hours + "H", "").replace("M", "");
        let arrivalSegment = itinerary.segments.length - 1
        let depart = itinerary.segments[0].departure.at;
        let arrival = itinerary.segments[arrivalSegment].arrival.at;
        let date1 = new Date(depart);
        let date2 = new Date(arrival);
        // let departurTime = date1.toLocaleString().split(",").pop();
        // let arrivalTime = date2.toLocaleString().split(",").pop();
        let departurTime = date1.toString().substring(0, 11);
        let arrivalTime = date2.toString().substring(0, 11);

        let iataCodeDeparture = itinerary.segments[0].departure.iataCode;
        let urlDeparture = `${base_url()}/airport/${iataCodeDeparture}`;

        let iataCodeArrival = itinerary.segments[arrivalSegment].arrival.iataCode;
        let urlArrival = `${base_url()}/airport/${iataCodeArrival}`;
        let carrierCode = itinerary.segments[0].carrierCode;
        const reponseDeparture = await fetch(urlDeparture);
        const airportDeparture = (await reponseDeparture.json()).data;
        const reponseArrival = await fetch(urlArrival);
        const airportArrival = (await reponseArrival.json()).data;
        resultArray.push({
            "departurTime": departurTime,
            "arrivalTime": arrivalTime,
            "airportDeparture": airportDeparture,
            "airportArrival": airportArrival,
            "carrierCode": carrierCode,
            "duration": itinerary.duration,
            "segments": itinerary.segments,
            "hours": hours,
            "minutes": minutes,
        });
    }

    return resultArray;
}



async function loadOffres(list) {
    const url = new URL(location.href);
    const exists = url.searchParams.has("way");
    if (exists) {
        //$way = null, $originLocationCode = null, $destinationLocationCode = null, $departureDate = null, $returnDate = null, $adults = null, $children = null, $infants = null, $travelClass = null, $includedAirlineCodes = null, $excludedAirlineCodes = null, $nonStop = null, $currencyCode = null,$maxPrice=null,$max=null
        let way = url.searchParams.get("way")
        let depart = url.searchParams.get("originLocationCode")
        let arrival = url.searchParams.get("destinationLocationCode")
        let departDate = url.searchParams.get("departur_date")
        let returnDate = url.searchParams.get("return_date")
        let adult = url.searchParams.get("adults")
        let children = url.searchParams.get("children")
        let infants = url.searchParams.get("infants")
        let xhr = await new TicketApi(way, depart, arrival, departDate, returnDate, adult, children, infants).getOffres()

        if (xhr.readyState == 1) {
            list.innerHTML = ""
            list.append(document.createElement("app-load"))
            list.append(document.createTextNode("Loading"))

        }

        xhr.onload = () => {
            if (xhr.status === 200) {
                list.innerHTML = ""
                let obj = null
                try {
                    obj = JSON.parse(xhr.response)
                    if (obj.msg == 1) {
                        let data = obj.data;
                        data.forEach((offre) => {
                            let card = document.createElement("ticket-card")
                            itineraireLoad(offre).then((itineraries) => {
                                let ities = JSON.stringify(itineraries)
                                let ofr = JSON.stringify(offre)
                                card.setAttribute("itineraires", encodeURIComponent(ities))
                                card.setAttribute("offre", encodeURIComponent(ofr))
                                card.setAttribute("class", "card-ticket")
                                list.append(card)
                            })

                        });

                    } else {
                        list.innerHTML = `<div class=" d-flex flex-column justify-content-center align-items-center m-4 mt-5">
                        <p class="text-center fs-3 text-secondary">
                          <span class="material-symbols-outlined fs-1">
                            sentiment_very_dissatisfied
                          </span> <br>
                          Sorry No Trips Found
                
                        </p>
                      </div>`
                    }
                } catch (e) {
                    console.log(e);
                    console.log(xhr.response);
                }
            }

        }
    }

}


export { videoStart, loadOffres }