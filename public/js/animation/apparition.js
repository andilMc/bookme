function fadeIn(element, d) {
    element.style.display = d
    let op =  element.style.opacity;
    var loop = setInterval(() => {
        element.style.opacity = op + 0.1;
        console.log(element.style.opacity);
    }, 100);

    if (element.style.opacity >= 1) {
        clearInterval(loop);
        return
    }
}

function fadeOut(element) {
    element.style.opacity = element.style.opacity - 0.1;
    if (element.style.opacity >= 0) {
        setTimeout(fadeOut(element), 100);
    } else {
        element.style.display = "none"
    }
}

export { fadeIn, fadeOut }