import { CountryRegionDropdown } from "./CountryRegionDropdown.min.js"


let c = new CountryRegionDropdown(1)
let coutries = c.getCountries()
let d = c.getDefaultCountry()
$("[country-data]").append(d);
coutries.forEach(country => {
    $("[country-data]").append(country);
});

