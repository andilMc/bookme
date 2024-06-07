class ViewCtrl {

    #minPassengers = 1
    #maxPassengers = 9
    #totalPassengers = 0
    #hide = true
    toggleReturnDate(ways) {
        ways.forEach(way => {
            let id = $(way).attr("id");;
            this.#toggleReturnDate(id)
            way.onchange = ()=>{ 
                console.log(id);
                this.#toggleReturnDate(id)
            };
            
        });

    }

    #toggleReturnDate(id) {
        switch (id) {
            case "way1":
                $("#return_date").fadeOut(200);
                $("label[for='return_date']").fadeOut(200);
                $("#dateTripSeparator").fadeOut(200);
                return
            case "way2":
                $("#return_date").fadeIn(200);
                $("label[for='return_date']").fadeIn(200);
                $("#dateTripSeparator").fadeIn(200);
                return
            default:
                return
        }
    }

    #increasePassenger() {
        let addBtns = document.querySelectorAll(".btn-psg-add")

        addBtns.forEach(addBtn => {
            let parent = addBtn.parentNode
            let input = parent.querySelector(".psg-value")
            var val = input.value
            this.#totalPassengers += parseInt(val)
            addBtn.onclick = (e) => {
                e.preventDefault()
                if (this.#totalPassengers >= this.#maxPassengers) {
                    console.log("max is 9 ");
                    $('.btn-psg-add').attr('disabled', true)
                    $('.btn-psg-moins').attr('disabled', false)
                } else if (parseInt(val) <= 9) {
                    $('.btn-psg-moins').attr('disabled', false)
                    val = input.value
                    input.value = eval(`${val}+1`)
                    this.#totalPassengers += 1

                }
            }
        });
    }

    #decreasePassenger() {
        let decreaseBtns = document.querySelectorAll(".btn-psg-moins")
        decreaseBtns.forEach(decreaseBtn => {
            decreaseBtn.onclick = (e) => {
                e.preventDefault()
                let parent = decreaseBtn.parentNode
                let input = parent.querySelector(".psg-value")
                let val = input.value
                if (this.#totalPassengers <= this.#minPassengers) {
                    console.log("min is 1 ");
                    $('.btn-psg-moins').attr('disabled', true)
                    $('.btn-psg-add').attr('disabled', false)

                } else if (parseInt(val) > 0) {
                    $('.btn-psg-add').attr('disabled', false)
                    input.value = eval(`${val}-1`)
                    this.#totalPassengers -= 1
                }
            }
        });
    }

    #tooglePassenger() {
        let inputs = document.querySelectorAll(".input-passengers")
        inputs.forEach(input => {
            let more = input.querySelector(".more")
            more.style.cursor = "pointer"
            let forms = input.querySelector(".person-forms")
            let close = forms.querySelector(".btn-hide")
            let hide = this.#hide
            close.onclick= (e)=> {
                e.preventDefault();
                $(forms).fadeOut(300);
                $(".person-forms").toggleClass("d-none");
                $(".person-forms").toggleClass("d-flex");
                hide = true
                this.getPassengerd()
            }
            $(more).click(function (e) {
                e.preventDefault();
                if (hide) {
                    $(forms).fadeIn();
                    $(".person-forms").toggleClass("d-none");
                    $(".person-forms").toggleClass("d-flex");
                    hide = false
                }

            });
            this.#hide = hide
        });

    }

    getPassengerd(){
        let passengersInputs = document.querySelectorAll(".psg-value")
        let str = ""
        passengersInputs.forEach(passengersInput => {
            let person = $(passengersInput).attr("name");
            let nbr = passengersInput.value;
            str+=`${nbr}-${person},`
        });
        str = str.slice(0,-1)
        $(".passenger-value").val(str);
    }

    countPassenger() {
        this.getPassengerd()
        if (!this.#hide) {
            this.#hide = true
        }
        let signal = this.#tooglePassenger()
        if (this.#totalPassengers >= this.#maxPassengers) {
            $('.btn-psg-add').attr('disabled', true)
        } else if (this.#totalPassengers <= this.#maxPassengers) {
            $('.btn-psg-moins').attr('disabled', true)
        }

        this.#decreasePassenger()
        this.#increasePassenger()

    }

}


export { ViewCtrl }
