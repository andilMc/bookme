import { initComponents } from "./components/init.js";
import { rangectrl, showAllHotel } from "./Controllers/rangeController.js";
import { videoStart } from "./flight/flight-starter.js";
import { ViewCtrl } from "./flight/view-ctrl.js";
import { base_url } from "./vars.js";

const wellcomBanner = async (title, src) => {
    let component = await fetch(`${base_url()}/template/wellcom.html`);
    let sect = document.querySelector(".sect")
    if (sect) {
        component.text().then((elmnt) => {
            let prs = new DOMParser()
            let template = prs.parseFromString(elmnt, "text/html")
            let clone = template.querySelector("template").content.cloneNode(true);
            let div = clone.querySelector("div");
            div.querySelector("video").setAttribute("src", src)
            div.querySelector("h1").innerText = title
            sect.append(div)
            videoStart()

        })
    }
}

function dialogProfile() {
    $("[show-profile-menu]").hover(function (e) { 
        e.preventDefault();
        // console.log("ok clicked");
        $("[profile-menu]").show();
    },function (e) { 
    //    console.log("blur");
       $("[profile-menu]").hide();
    });
}

function init() {
    initComponents()
    rangectrl()
    dialogProfile()
    // funtion for show all btn
    showAllHotel()
    let inputDates = document.querySelectorAll(".form-date")
    let inputs = document.querySelectorAll("input");
    let ctrl = new ViewCtrl()
    ctrl.countPassenger()
    inputs.forEach((input) => {
        input.setAttribute("autocomplete", "off");

    })

    inputDates.forEach((inputDate) => {
        inputDate.icon = ""
    })


}

export { init, wellcomBanner }