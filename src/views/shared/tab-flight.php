<?php
    $way =(isset($_GET["way"])) ? $_GET["way"] : 1 ;
    $originLocationCode =(isset($_GET["originLocationCode"])) ? $_GET["originLocationCode"] : "" ;
    $destinationLocationCode =(isset($_GET["destinationLocationCode"])) ? $_GET["destinationLocationCode"] : "" ;
    $departur_date =(isset($_GET["departur_date"])) ? $_GET["departur_date"] : "" ;
    $return_date =(isset($_GET["return_date"])) ? $_GET["return_date"] : "" ;
    $adults =(isset($_GET["adults"])) ? $_GET["adults"] : 1 ;
    $children =(isset($_GET["children"])) ? $_GET["children"] : 0 ;
    $infants =(isset($_GET["infants"])) ? $_GET["infants"] : 0 ;
?>
<div class="tab " id="tab-flight">
    <form action="<?= base_url ?>/flight" method="get" class="w-100">
        <div class="d-flex p-4 flex-wrap gap-3   ">
            <div class="flex-grow-1">
                <div class="input-search gap-3 text-black-50 " >
                    <div class="flex-grow-1 d-flex gap-2">
                        <span class="material-symbols-outlined">swap_horiz</span>
                        <input class="form-check-input ways" style="padding-inline: 0;" type="radio" name="way" id="way2" <?=($way==2) ? "checked" : "" ?> value="2">
                        <label class="flex-grow-1 form-check-label" for="way2">
                            Round trip
                        </label>
                    </div>
                    <span class="text-center ">|</span>
                    <div class="flex-grow-1 d-flex gap-2">
                        <span class="material-symbols-outlined">east</span>
                        <input class=" form-check-input ways" style="padding-inline: 0;" type="radio" name="way" id="way1" <?=($way==1) ? "checked" : "" ?>  value="1">
                        <label class="flex-grow-1 form-check-label" for="way1">
                            One way ticket
                        </label>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="input-search ">
                    <span class="material-symbols-outlined">flight_takeoff</span>
                    <div class=" position-relative w-100 h-100 ">
   
                        <input name="originLocationCode" class="flying-form form-airport" placeholder="Departure to" value="<?=$originLocationCode?>" suggest-id="liste1" />
                        <div class="card suggest-liste" id="liste1">
                        </div>
                    </div>
                    |
                    <span class="material-symbols-outlined">flight_land</span>
                    <div class=" position-relative w-100 h-100 ">
                        <input name="destinationLocationCode" class="flying-form form-airport" placeholder="Destination" value="<?=$destinationLocationCode?>" suggest-id="liste2" />
                        <div class="card suggest-liste" id="liste2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="input-search ">
                    <label for="departur_date"><span class="material-symbols-outlined">event_upcoming</span></label>
                    <input name="departur_date" id="departur_date" value="<?=$departur_date?>" class="flying-form form-date" placeholder="Departure Date" type="text" onfocus="this.type='date'" onblur="this.type='text'" />
                    <span id="dateTripSeparator">|</span>
                    <label for="return_date"><span class="material-symbols-outlined flip">event_upcoming</span></label>
                    <input name="return_date" id="return_date" class="flying-form form-date" value="<?=$return_date?>" placeholder="Return Date" type="text" onfocus="this.type='date'" onblur="this.type='text'" />
                </div>
            </div>
            <div class="">
                <div class="input-search  input-passengers position-relative gap-2 ">
                    <!-- $adults = null, $children = null, $infants = null, $travelClass = null, -->
                    <span class="material-symbols-outlined">group</span>
                    <input name="travelers" class="flying-form passenger-value" placeholder="Passengers" disabled>

                    <span class="material-symbols-outlined more btn-outline-blue d-flex align-items-center pt-2 p-1 text-black-50 " style="height:25px;width:25px">expand_more</span>
                    <div class="person-forms position-absolute suggest-liste mt-2   card ps-3 pe-3 pb-3 d-none  flex-column gap-3 top-100 start-0 w-auto   ">
                        <div class=" d-flex justify-content-between align-items-center   border-bottom pt-3 pb-3 object-fit-scale ">
                            <p class="m-0 "> Passengers</p>
                            <a href="#" class="btn btn-outline-blue text-danger btn-hide" style="height:30px;width:30px"> X </a>
                        </div>
                        <div class="d-flex  gap-2 psg-number align-items-center ">
                            <span class="material-symbols-outlined">accessibility_new</span>
                            <p class="m-0 small text-nowrap w-100  ">Adult(s) </p>
                            <a href="#" class="btn btn-sm btn-blue  d-flex justify-content-center align-items-center btn-psg-add " style="height:30px;width:30px">+</a>
                            <input name="adults" class="flying-form ps-2  psg-value text-center" value="<?=$adults?>" style="height:30px;width: 40px !important;" />
                            <a href="#" class="btn btn-sm btn-blue d-flex justify-content-center align-items-center btn-psg-moins" style="height:30px;width:30px">-</a>
                        </div>
                        <div class="d-flex gap-2 psg-number align-items-center ">
                            <span class="material-symbols-outlined">escalator_warning</span>
                            <p class="m-0 small text-nowrap w-100">Children <span class="text-black-50 "> <br> 2 to 11 years inclusive</span> </p>
                            <a href="#" class="btn btn-sm btn-blue d-flex justify-content-center align-items-center btn-psg-add" style="height:30px;width:30px">+</a>
                            <input name="children" class="flying-form ps-2  psg-value text-center" value="<?=$children?>" style="height:30px;width:40px !important" />
                            <a href="#" class="btn btn-sm btn-blue d-flex justify-content-center align-items-center btn-psg-moins" style="height:30px;width:30px">-</a>
                        </div>
                        <div class="d-flex  gap-2 psg-number align-items-center ">
                            <span class="material-symbols-outlined">baby_changing_station</span>
                            <p class="m-0 small text-nowrap w-100">Infants <span class="text-black-50 "> <br> Under of 2 years</span> </p>
                            <a href="#" class="btn btn-sm btn-blue d-flex justify-content-center align-items-center btn-psg-add" style="height:30px;width:30px">+</a>
                            <input name="infants" class="flying-form ps-2  psg-value text-center " value="<?=$infants?>" style="height:30px; width: 40px !important;" />
                            <a href="#" class="btn btn-sm btn-blue d-flex justify-content-center align-items-center btn-psg-moins" style="height:30px;width:30px">-</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class=" d-flex align-items-center flex-grow-1 ">
                <button class="btn-blue ps-3  pe-3 w-100 " type="submit">Search flight</button>
            </div>
        </div>
    </form>
</div>