import { videoStart,loadOffres } from "./flight-starter.js";
import { initSuggestion } from "../auto-completion.js";
import { ViewCtrl } from "./view-ctrl.js";

async function main() {
    let list = document.getElementById("liste-offres")
    let ways = document.querySelectorAll(".ways")
    let ctrl = new ViewCtrl()
    ctrl.toggleReturnDate(ways);
    loadOffres(list)
    initSuggestion()
    videoStart()
}

window.addEventListener("load", () => {
    main();
}
);


