
function base_url(){
    let base_url = window.location.origin

    if (base_url.indexOf("://localhost")!== -1) {
        base_url += "/bookme/public"
    }
    return base_url;
}

const monthNames = [
    "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
];

const dayNames = [
    "Sun","Mon", "Tue", "Wed", "Thu", "Fri", "Sat"
];

export{base_url,monthNames,dayNames}