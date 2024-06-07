import { fadeIn, fadeOut } from "./animation/apparition.js";
import { init } from "./init.js";

document.addEventListener("DOMContentLoaded", () => {
    let loader = document.querySelector("#div-loader");
    if (loader) {
        loader.style.display = "flex";
    }
}
);

window.addEventListener("load", () => {
    let loader = document.querySelector("#div-loader");
    if (loader) {
        loader.style.opacity = 0;
        fadeOut(loader);
    }

    init();
}
);



// ========================================== Publish service =============================================
                // Sélectionnez l'élément input de type fichier
                const fileInput = document.getElementById('fileInput');
                // Sélectionnez l'élément image
                const imagePreview = document.getElementById('imagePreview');
                if (fileInput) {
                     // Ajoutez un écouteur d'événements pour détecter les changements de sélection de fichier
                fileInput.addEventListener('change', function(event) {
                    // Récupérez le fichier sélectionné
                    const file = event.target.files[0];

                    // Vérifiez si un fichier a été sélectionné
                    if (file) {
                        // Créez un objet FileReader
                        const reader = new FileReader();

                        // Définissez une fonction de rappel pour lire le contenu du fichier en tant qu'URL de données
                        reader.onload = function(e) {
                            // Définissez l'URL de données comme la source de l'image
                            imagePreview.src = e.target.result;
                        };

                        // Lisez le contenu du fichier en tant qu'URL de données
                        reader.readAsDataURL(file);
                    }
                });
           
                }
               

// ============================================= MyBookings ==========================================================
document.addEventListener("DOMContentLoaded", function() {
    const bookingCarButton = document.getElementById("BookingCar");
    const bookingHotelButton = document.getElementById("BookingHotel");
    const bookingsListCar = document.getElementById("BookingsListCar");
    const bookingsListHotel = document.getElementById("BookingsListHotel");

    bookingsListHotel.classList.add("d-none");

    bookingCarButton.addEventListener("click", function() {
        bookingsListCar.classList.remove("d-none");
        bookingsListHotel.classList.add("d-none");
    });

    bookingHotelButton.addEventListener("click", function() {
        bookingsListHotel.classList.remove("d-none");
        bookingsListCar.classList.add("d-none");
    });
});

// ==================================================== confirmation of hotelbook ===============================================
const inputField = document.getElementById('swich-price');
const submitButton = document.getElementById('submit-btn');

inputField.addEventListener('input', function() {
    if (inputField.value.trim() !== '') {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
});

