let href = window.location.href
const parsedUrl = new URL(href);
const hashParams = new URLSearchParams(parsedUrl.hash.substring(1));
const mID = hashParams.get('m');
if (mID != null) {
    let modal = document.getElementById(mID)
    if (modal) {
        modal.showModal()
    }
}



$("[open-modal]").click(function (e) {
    let modalID = this.getAttribute("open-modal");
    let modal = document.getElementById(modalID)
    let modalBody = modal.querySelector(".modal-body")
    if ($(modalBody).hasClass("right-modal")) {
        modalBody.style.animation = "var(--animation-slide-in-left) forwards"
        modalBody.style.animationDuration = "0.5s"
    }
    modal.showModal()
});

$("[close-modal]").click(function (e) {
    let modalID = this.getAttribute("close-modal");
    let modal = document.getElementById(modalID)
    let modalBody = modal.querySelector(".modal-body")
    if ($(modalBody).hasClass("right-modal")) {
        modalBody.style.animation = "var(--animation-slide-out-right) forwards"
        modalBody.style.animationDuration = "0.5s"
    }
    setTimeout(() => modal.close(), 400)

});