import { AppLoad } from "./AppLoad.js"
import { TicketCard } from "./TicketCard.js"

function initComponents() {
    window.customElements.define("ticket-card", TicketCard)
    window.customElements.define("app-load", AppLoad) 
}

export {initComponents}