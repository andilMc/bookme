import { wellcomBanner } from "../init.js";



document.addEventListener("DOMContentLoaded",()=>{
    
    let htl = document.getElementById("hero-room").dataset.title
    wellcomBanner(
        htl,
        "https://player.vimeo.com/progressive_redirect/playback/380348159/rendition/360p/file.mp4?loc=external&oauth2_token_id=1747418641&signature=16b6aeeaf5acc373ecd69d72065ad02dc06db34021ff0995c489aaa8b776ea7e")
    
})