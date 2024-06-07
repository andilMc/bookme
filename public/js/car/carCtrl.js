import { wellcomBanner } from "../init.js";
import { base_url } from "../vars.js";



document.addEventListener("DOMContentLoaded",()=>{
    wellcomBanner(
        "Drive Your Dreams with Bookme",
        `${base_url()}/video/car.mp4`)
    
})
