const useState = (defaultValue) => {
    let value = defaultValue;
    function getValue() {
        return value;
    }
    function setValue(newValue) {
        value = newValue;
        render();
    }
    return [getValue, setValue];
}

let template = document.getElementById("carData")
let price = (Number)(template.content.getElementById("carPrice").dataset.price)
let driverPrice = (Number)(template.content.getElementById("driverPrice").dataset.price)
let driverCheck = document.getElementById("with-driver")
let dateCarNeed = document.getElementById("dateCarNeed")
let selectHours = document.getElementById("selectHours")
let totalPriceView = document.getElementById("price")
let  agree= document.getElementById("agree")
let btnSubmit = document.getElementById("btnSubmit")
let [totalPrice, setTotalPrice] = useState(price)
let [disabled, setDisabled] = useState(true)
let incremented = false

agree.addEventListener("change", (ev) => {
     if (ev.currentTarget.checked) {
        setDisabled(false)
    } else {
        setDisabled(true)
    }
     
})

selectHours.addEventListener("change", (ev) => {
    let time = (Number) (ev.currentTarget.value)
    if (driverCheck.checked) {
       setTotalPrice((price+driverPrice) * time)
   } else {
       setTotalPrice((price) * time)
   }
    
})

driverCheck.addEventListener("change", (ev) => {
    let time = (Number) (selectHours.value)
    if (ev.currentTarget.checked && !incremented) {
        setTotalPrice(totalPrice()+(driverPrice* time))
        incremented = true
    } else {
        if (incremented) {
            setTotalPrice(totalPrice() - (driverPrice* time))
            incremented = false
        }
    }

})

let hours = [1, 7, 30, 180, 360]
let options = []
hours.forEach(elmt => {
    let option = document.createElement("option")
    option.setAttribute("value", elmt)
    switch (elmt) {
        case 1:
            option.innerText = "1 day"
            option.setAttribute("selected", "")
            break;
        case 7:
            option.innerText = "1 week"
            break;
        case 30:
            option.innerText = "1 month"
            break;
        case 180:
            option.innerText = "6 months"
            break;
        case 360:
            option.innerText = "1 years"
            break;

    }
    options.push(option)
});
selectHours.replaceChildren(null)
selectHours.append(...options)


let render = () => {
   
    totalPriceView.innerText = `$${totalPrice()}`
    if (disabled()) {
        btnSubmit.setAttribute("disabled", "")
    } else {
        btnSubmit.removeAttribute("disabled")
    }
}

render()