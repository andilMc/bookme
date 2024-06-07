import { base_url } from "../vars.js"

class AppLoad extends HTMLElement {
    constructor(){
        super()
    }

    connectedCallback() {
        let img = document.createElement("img")
        img.setAttribute("src",`${base_url()}/img/loading.gif`)
        img.setAttribute("class","img-load")
        this.innerHTML = ""
        this.appendChild(img)
    }
}

export {AppLoad}