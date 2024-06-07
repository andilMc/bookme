import { base_url, monthNames, dayNames } from "../vars.js";

class TicketCard extends HTMLElement {
    constructor() {
        super();
    }

    getAirportInfo(iataCode) {
        // const url =`${base_url()}/airport/${iataCode}`;
        // $.ajax({
        //     type: "GET",
        //     url: `${url}`,
        //     data: "",
        //     dataType: "dataType",
        //     success: function (response) {
        //         console.log(response);
        //     }
        // });
        // const url = `https://airport-info.p.rapidapi.com/airport?iata=${iataCode}`;
        // console.log(url);
        // const options = {
        //     method: 'GET',
        //     headers: {
        //         'X-RapidAPI-Key': '145a223c42mshe5e000061c08d0bp111e05jsnf69c2f938e9f',
        //         'X-RapidAPI-Host': 'airport-info.p.rapidapi.com'
        //     }
        // };

        // try {
        //     // const response =  fetch(url, options);

        //     const response = await fetch(url);
        //     let rp = await response.text();
        //     console.log(rep.data);
        //     const result = JSON.parse(rp) ;
        //     return {
        //         name: result.name,
        //         country: result.country
        //     };

        // } catch (error) {
        //     console.error(error);
        // }

    }

    async connectedCallback() {
        let offre = JSON.parse(decodeURIComponent(this.getAttribute("offre")));
        let offreCipher = this.getAttribute("offre");
        let itineraries = JSON.parse(decodeURIComponent(this.getAttribute("itineraires")));
        let imgs = "";
        let itins = "";
        let mID = offre.type + "-" + offre.id
        let date;

        itineraries.forEach(itinerary => {
            imgs += `
            <img src="//fastui.cltpstatic.com/image/upload/resources/images/logos/air-logos/svg_logos/${itinerary.carrierCode}.svg" style="width:50px; height: 50px;">
            `
        });

        let departureAiport = itineraries[0].segments[0].departure.iataCode
        let arrivalArport = itineraries[itineraries.length - 1].segments[itineraries[itineraries.length - 1].segments.length - 1].arrival.iataCode
        let departureDate = itineraries[0].segments[0].departure.at
        let arrivalDate = itineraries[itineraries.length - 1].segments[itineraries[itineraries.length - 1].segments.length - 1].arrival.at
        let dDate = new Date(departureDate);
        let aDate = new Date(arrivalDate);

        date = `
            <h5 class="m-0">${dDate.getHours()}:${dDate.getMinutes()}&nbsp;-&nbsp;${aDate.getHours()}:${aDate.getMinutes()} <sup class="text-danger">${aDate.getDate()} ${monthNames[aDate.getMonth()]}</sup> </h5>
            `
        const responseDepartureAiport = await fetch(`${base_url()}/airport/${departureAiport}`);
        const responseArrivalArport = await fetch(`${base_url()}/airport/${arrivalArport}`);
        let airportDepartureAiportInfo = await responseDepartureAiport.json();
        let airportArrivalArportInfo = await responseArrivalArport.json();

        let dureeHours = itineraries[0].hours;
        let dureeMin = itineraries[0].minutes;
        if (itineraries.length > 1) {
            dureeHours = eval(itineraries[0].hours + "+" + itineraries[itineraries.length - 1].hours)
            dureeMin = eval(itineraries[0].minutes + "+" + itineraries[itineraries.length - 1].minutes)
        }

        (offre.itineraries).forEach(itinerary => {
            const cleanedString = (itinerary.duration).replace("PT", "").replace("H", ":").replace("M", "");
            const [hours, minutes] = cleanedString.split(":").map(Number);
            // console.log(itinerary);
            itins += `<li>
                    ${hours}h:${minutes}m
                `
            let segm = `<ul>
                `;
            (itinerary.segments).forEach(async segment => {
                   
                    segm += `
                                <li>${segment.id} :
                                    <ul>
                                        <li>Airport Dep :${segment.departure.iataCode}   </li>
                                         ${segment.departure.terminal ? "<li>Terminal :" + segment.departure.terminal + "</li>" : ""}
                                    </ul>
                                    <ul>
                                        <li>Airport Arrive : ${segment.arrival.iataCode} </li>
                                        ${segment.arrival.terminal ? "<li>Terminal :" + segment.arrival.terminal + "</li>" : ""}
                                    </ul>
                                    <ul>
                                        <li>Carrier : ${segment.carrierCode} </li>
                                    </ul>
                                </li>
                            `

            })
            segm += `</ul>`
            itins += `
              ${segm}
             </li>
            `
        });

        let card = `
        <div class="card w-100 p-3">
            <div class="d-flex justify-content-between align-items-center flex-nowrap gap-3 pb-3">
                <div class="d-flex flex-column align-items-center ">
                    <div class="d-flex justify-content-center gap-2">
                        ${imgs}
                    </div>
                    <span class="mt-2" style="line-height: 14px;font-size: 13px;">Airline</span>
                </div>
                    <div class="">
                        ${date}
                        <div class="">
                            <span class="">${departureAiport} - ${arrivalArport}</span>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-nowrap gap-2">
                        <p class="m-0 ">${dureeHours}h ${dureeMin}m</p>
                        <div class="d-flex gap-3">
                            <span class="d-flex align-items-center gap-1 ">
                                <span class="material-symbols-outlined fs-5">
                                    airline_seat_recline_extra
                                </span>
                                <span> Manama / Bahrain</span>
                            </span>
                            <span class="d-flex align-items-center gap-1 ">
                                <span class="material-symbols-outlined fs-5">
                                    directions_run
                                </span>
                                <span> Addis Ababa</span>
                            </span>
                            <span class="d-flex align-items-center gap-1 ">
                                <span class="material-symbols-outlined fs-5">
                                    airline_seat_recline_extra
                                </span>
                                <span> Dar Es Salaam</span>
                            </span>
                        </div>
                    </div>
                <div class="d-flex flex-column align-items-center jutify-content-center gap-3">
                <h4 class="m-0 p-0 text-center"><b>
                ${offre.price.currency} ${offre.price.total}
                    </b></h4>
                <a href="${base_url()}/flight-book?offre=${this.getAttribute("offre")}" class="btn btn-blue w-100">Book</a>
            </div>
            </div>
            <div class="d-flex justify-content-end border-top pt-2">
                <a href="#m=${mID}" class="btn btn-sm btn-outline-blue pe-3 ps-3" onclick="document.getElementById('${mID}').showModal()" > Flight Details <span class="material-symbols-outlined fs-6">arrow_forward_ios</span> </a>
            </div>
        </div>
        <dialog id="${mID}">
            <div class="right-modal">
                <div class="p-2 d-flex flex-start position-absolute top-0 end-0 start-0 border-bottom">
                    <a href="#" class="btn btn-outline-secondary btn-sm d-flex jutify-centent-center align-items-center" onclick="document.getElementById('${mID}').close()"><span class="material-symbols-outlined">close</span> </a>
                </div>
                <div class=" position-absolute  end-0 start-0 overflow-auto " style="top:60px;bottom:70px">
                    <div class="position-sticky top-0" style="background-color:var(--gray-0)">
                        <h2 class="ms-3" >${airportDepartureAiportInfo.data[0].address.cityName} <span class="material-symbols-outlined">trending_flat</span> ${airportArrivalArportInfo.data[0].address.cityName}</h2>
                    </div>    
                    <div class="p-3 d-flex gap-3 align-items-center" style="background-color:var(--pink-0)">
                        <div class="d-flex flex-column align-items-center ">
                            <div class="d-flex justify-content-center gap-2">
                                ${imgs}
                            </div>
                            <span class="mt-2" style="line-height: 14px;font-size: 13px;">Airline</span>
                        </div>
                        <div>
                            <div class="fs-4">${dayNames[dDate.getDay()]}, ${monthNames[dDate.getMonth()]} ${dDate.getDate()}</div>
                            <div class="fs-6">
                                <span>${airportDepartureAiportInfo.data[0].address.cityName} - ${airportArrivalArportInfo.data[0].address.cityName}</span>・<span>${dureeHours}h ${dureeMin}m (3 stops)</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <ul>
                        ${itins}
                        </ul>
                    </div>
                   
                </div>
                <div class=" d-flex justify-content-between align-items-center p-3 ps-4 pe-4 position-absolute end-0 start-0 bottom-0 shadow">
                    <h4 class="m-0 p-0 text-center">
                        <b>
                            ${offre.price.currency} ${offre.price.total}
                        </b>
                    </h4>
                    
                    <a href="${base_url()}/flight-book?offre=${this.getAttribute("offre")}" class="btn btn-blue ps-5 pe-5 ">Book</a>
                </div>
            </div>
        </dialog>
            
        `;
        this.innerHTML = card;
    }
}

export { TicketCard };
