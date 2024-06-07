import {base_url} from "../vars.js"
function chrono() {
    let start = 5
    $("#chrono").text(start)
   let I = setInterval(()=>{
        start--
        if (start<=0) {
            clearInterval(I)
            window.location=base_url()+"/login" 
        }
        $("#chrono").text(start)
       
    },1000)
}

chrono()