import { base_url } from "./vars.js";

//=================================================================================================//
async function airport(keyword) {
    let xhr = new XMLHttpRequest()
    xhr.open("POST", `${base_url()}/airport-auto-complet`)
    var formData = new FormData();
    formData.append("keyword", keyword);
    xhr.send(formData);

    return new Promise((resolve, reject) => {
        xhr.onload = () => {
            if (xhr.status === 200) {
                let txt = JSON.parse(xhr.response)
                let rep = null
                // console.log(txt);
                if (txt.msg == "ok") {
                    rep = txt.data;
                } else {
                    rep = 0;
                }
                resolve(rep)
            }
        };
    });
}

//=================================================================================================//

function completion(list, input) {
    let link = document.querySelectorAll(".suggest-link")
    link.forEach((l) => {
        l.onclick = () => {
            let value = l.getAttribute("value");
            input.value = value;
            list.style.display = "none";
        }
    })
}

//=================================================================================================//

async function listning(idContainer, input, suggestContainer, content) {

    if (input.value.trim() !== "") {
        const suggest = await airport(input.value);
        suggestContainer.innerHTML = content;
        if (suggest !== 0) {
            let i = 1;
            suggest.forEach(e => {
                suggestContainer.innerHTML += `<div class="suggest-link d-flex pe-3 ps-3 p-2 " id="" value="${e.iataCode}">
                 <div class="flex-grow-1">
                     <h5 class="  m-0">${e.name}</h5>
                     <p class="text-secondary text-sm-start m-0 ">${e.address.countryName}</p>
                 </div>
                 <div class="flex-grow-1  d-flex justify-content-end align-items-center  ">
                     <h6 class="m-0 text-success ">${e.iataCode}</h6>
                 </div>
             </div>`;
                i++;
            });

        } else {
            suggestContainer.innerHTML = content;
            suggestContainer.innerHTML += `<div class=" d-flex flex-column align-items-center  p-4 text-secondary justify-content-center ">
                            <span class="material-symbols-outlined">wrong_location</span>
                            <p>Airport Not found </p>
                        </div>`
        }

        var close = document.getElementById(`close-${idContainer}`);
        closeBtn(close, suggestContainer, input)
        completion(suggestContainer, input)
    } else {
        suggestContainer.innerHTML = content;
        suggestContainer.innerHTML += `<div class=" d-flex flex-column align-items-center p-4 text-xl-center  text-secondary ustify-content-center">
                            <span class="material-symbols-outlined">flight_takeoff</span>
                            <p class="text-center"> Departure airport </p>
                        </div>`
    }


}

//=================================================================================================//

function closeBtn(close, suggestContainer, input) {
    close.onclick = () => {
        suggestContainer.style.display = "none";
        input.value = ""
    }
}

//=================================================================================================//

function initSuggestion() {
    let inputs = document.querySelectorAll(".form-airport")

    if (inputs) {
        inputs.forEach(input => {
            input.addEventListener("focus", () => {
                let idContainer = input.getAttribute("suggest-id")
                let suggestContainer = document.querySelector(`#${idContainer}`)

                let content = `<div class="p-1 d-flex justify-content-end p-3">
                    <button type="button" id="close-${idContainer}"  class=" btn-close "></button>
                    </div>`;
                    suggestContainer.style.display = "block";

                if (input.value.trim() !== "") {
                    listning(idContainer, input, suggestContainer, content);
                } else {
                    suggestContainer.innerHTML = content;
                    suggestContainer.innerHTML += `<div class=" d-flex flex-column align-items-center p-4 text-xl-center  text-secondary ustify-content-center">
                                        <span class="material-symbols-outlined">flight_takeoff</span>
                                        <p class="text-center"> Departure airport </p>
                                    </div>`
                    input.addEventListener("input", async () => {
                        listning(idContainer, input, suggestContainer, content);
                    })

                }


                var close = document.getElementById(`close-${idContainer}`);
                closeBtn(close, suggestContainer, input, content)
            })


        });
    }

}

//=================================================================================================//

export { airport, initSuggestion }