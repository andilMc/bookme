import { base_url } from "../vars.js";

$(function () {
    let date = $('input[name="checkDates"]')
    let country = $('.country-select')

    if (country) {
        country.countrySelect({ defaultCountry: "bd", responsiveDropdown: true });
    }
    if (date) {
        date.daterangepicker();
    }

    const input = document.querySelector(".phone");
    if (input) {
        let ini = window.intlTelInput(input, {
            strictMode: true,
          utilsScript: base_url()+"/js/Controllers/TelInputUtils.js",
        })
    }
   

    $(function () {
        $('.normal-date-picker').daterangepicker({
            singleDatePicker: true,
            // showDropdowns: false,
            locale: {
                format: 'DD-MM-YYYY',
             },
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10)
        });
    });
});