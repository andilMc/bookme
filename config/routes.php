<?php

$routes = [

    "/"=>"ViewController@index",
    "/mybookings"=>"ViewController@myBookings",
    "/about-us"=>"ViewController@aboutus",
    "/chat"=>"ViewController@chat",
    // ============================flight==================================
    "/flight"=>"ViewController@flight",
    "/flight-book"=>"api\\Flight@selectFlight",
    "/order"=>"api\\Flight@flightOrder",
    "/confirmbookFlight"=>"api\\Flight@confirmbookFlight",
    // ==================================HOTEL===========================
    "/hotel"=>"ViewController@hotel",
    "/htl/([a-zA-Z0-9\+\=\*\/]+)"=>"ViewController@room",
    "/rm/([a-zA-Z0-9\+\=\*\/]+)"=>"ValidForms@selectRoom",
    "/rentHotelinfo/([a-zA-Z0-9\+\=\*\/]+)"=>"ValidForms@RentHotelInformation",
    // ==================================HOTEL===========================
    // ==================================CAR===========================
    "/car"=>"ViewController@car",
    "/dtlcr/([a-zA-Z0-9\+\=\*\/]+)"=>"ViewController@DetailCar",
    "/rentcarinfo"=>"ValidForms@RentCarInformation",
    
    "/list-cars"=>"api\\CarApi@initListeCars",
    "/search-cars"=>"api\\CarApi@searchCars",
    "/recommand-cars"=>"api\\CarApi@recommandCars",
    // ==================================CAR===========================
    // ==================================ACCESS===========================
    "/login"=>"AccessController@cltLogin",
    "/logup"=>"AccessController@cltLogup",
    "/logout"=>"AccessController@cltLogout",
    "/register"=>"AccessController@cltRegister",
    "/sign-in"=>"AccessController@cltSignIn",
    "/verify/([a-zA-Z0-9\+\=\*\/]+)"=>"AccessController@verify",
    // ==================================ACCESS===========================
    // ==================================GENERALE===========================

    "/profile"=>"Profile@index",
    "/bookings"=>"Profile@bookings",
    "/confirmbook"=>"ValidForms@ConfirmBookingCar",
    "/confirmbookHtl"=>"ValidForms@ConfirmBookingHotel",
    "/service"=>"services\\Request@index",
    "/sbt"=>"services\\Request@requestService",
    "/success"=>"services\\Request@successSubmit",

    // ==================================GENERALE===========================
    // ==================================================backoffice route==========================================================
    "/dashboard"=>"DashboardViewController@index",
    "/dashboard"=>"DashboardViewController@index",
    "/dashboard/customer"=>"DashboardViewController@customer",
    "/dashboard/newoffer"=>"DashboardViewController@newoffer",
    "/dashboard/addVehicle"=>"DashboardViewController@addVehicle",
    "/dashboard/booking"=>"DashboardViewController@booking",
    "/dashboard/booking/detail"=>"DashboardViewController@detailbook",
    "/dashboard/srvce-q"=>"DashboardViewController@srvce",
    "/dashboard/car"=>"DashboardViewController@CarView",
    "/dashboard/bookingsCars"=>"DashboardViewController@BookingsCar",
    "/dashboard/hotel"=>"DashboardViewController@Hotel",
    "/dashboard/bookingHotel"=>"DashboardViewController@BookingsHotel",

    // ==================================================backoffice route==========================================================
    // ==================================================Flight route==========================================================
    "/offres"=>"api\\FlightApi@offres",
    "/airport-auto-complet"=>"api\\FlightApi@autoCompletAirport",
    "/airport/([A-Z,a-z]+)"=>"api\\FlightApi@getAirportByCode",
    // ==================================================Flight route==========================================================

];