
$(function () {
    // let inputs = document.querySelectorAll("#py-form input");""

    // // let boolean = $("#py-form").val();
    $('.cc-number').blur(function (e) { 
        let b =$.validateCardNumber($(this).val())       
        console.log(b);
    });
    // console.log(inputs);
    $('.cc-number').formatCardNumber();
    $('.cc-expires').formatCardExpiry();
    $('.cc-cvc').formatCardCVC();
});
