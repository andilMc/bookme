<?php

use src\controllers\Utils;

include_once("shared/header.php");
?>
<main class="w-100">
    <?php
    include_once("shared/top-nav.php");
    ?>
    <div class="header-about-us">
        <img class="cover-img" src="https://cloudbeds-fcfc.kxcdn.com/wp-content/uploads/2022/05/iStock-1068158510-scaled-e1669046834676.jpg" />
        <div class="about-us">My Bookings</div>
    </div>
    <div class="container container-custom" id="BtnContainer">
        <div class="row ">
            <div class="col-sm-4 col-md-2 blocFilter">
                <button class="col-sm-12 btn btnCar" id="BookingCar">
                    Car reservations
                </button>
            </div>
            <div class="col-sm-4 col-md-2 blocFilter">
                <button class="col-sm-12 btn btnCar" id="BookingHotel">
                    Hotel reservations
                </button>
            </div>
        </div>
    </div>
    <div class="container container-custom" id="BookingsListCar">
        <?php
        if (!empty($data)) :
            foreach ($data as $item) {
                if (isset($item['car']) && isset($item['rentalCar']) && isset($item['img'])) {
                    $marke = $item['car']->getMake();
                    $type = $item['car']->getTypeCar();
                    $model = $item['car']->getModel();

                    $price = $item['rentalCar']->getTotalPrice();
                    $datePickUp = $item['rentalCar']->getPickupDate();
                    $dateReturn = $item['rentalCar']->getReturnDate();
                    $IdBooking =  $item['rentalCar']->getIdRental();

                    $img = $item['img'];
        ?>
                    <div class="row mybook" id="bookCar">
                        <div class="col-sm-12 col-md-2">
                            <img class="image-1 image-margin" src="<?php echo $img; ?>" />
                        </div>
                        <div class="col-sm-12 col-md-2 detailmarge">
                            <div class="brand"><b>Booking n°: </b><?php echo "BKG" . $IdBooking; ?></div><br>
                            <div class="type"><b>Type: </b><?= $type ?></div>
                        </div>
                        <div class="col-sm-12 col-md-2 detailmarge">
                            <div class="model"><b>Brand: </b><?php echo $marke; ?></div><br>
                            <div class="brand"><b>From: </b><?php echo $datePickUp; ?></div>
                        </div>
                        <div class="col-sm-12 col-md-2 detailmarge">
                            <div class="type"><b>Model: </b><?php echo $model; ?></div><br>
                            <div class="model"><b>To: </b><?php echo $dateReturn; ?></div>
                        </div>
                        <div class="col-sm-12 col-md-4 colomn3">
                            <div class="bloc">
                                <div class="priceBlock">
                                    <?php echo "BDT " . $price; ?>
                                </div>
                                <button class="btnChat">
                                    <span class="material-symbols-outlined iconMssg" id="iconMssg">
                                        chat
                                    </span>
                                    Chat
                                </button>
                            </div>
                        </div>
                    </div><br><br>
            <?php
                }
            }
        else :
            ?>
            <p class="text-center text-secondary w-100">You don't have any booking</p>

        <?php
        endif;
        ?>
    </div>

    <!-- ========================================bookHotel================================================== -->

    <div class="container container-custom" id="BookingsListHotel">
        <?php
        if (!empty($data)) :
            foreach ($dataRoom as $item) {

                if (isset($item['room']) && isset($item['rentalHotel']) && isset($item['img'])) {
                    $bookingNbr = $item['rentalHotel']->getid();
                    $roomNbr = $item['room']->getroomNbr();
                    $roomType = $item['room']->gettype();
                    $price = $item['room']->getprice();
                    $CheckInDate = $item['rentalHotel']->getcheckinDate();
                    $checkOutDate = $item['rentalHotel']->getcheckoutDate();
                    $customerName = $item['rentalHotel']->getCustomerName();

                    $fullText = roomType[$item['room']->gettype()];
                    $words = explode(' ', $fullText);
                    // echo $words[0];
                    $img = $item['img'];
                    // echo "$img";
        ?>
                    <div class="row mybook" id="bookCar">
                        <div class="col-sm-12 col-md-2">
                            <img class="image-1 image-margin" src="<?php echo $img; ?>" />
                        </div>
                        <div class="col-sm-12 col-md-2 detailmarge">
                            <div class="brand"><b>Booking n°: BKG</b><?= $bookingNbr ?></div><br>
                            <div class="type"><b>Customer:</b> <?= $customerName ?> </div>
                        </div>
                        <div class="col-sm-12 col-md-2 detailmarge">
                            <div class="model"><b>Room number: </b><?= $roomNbr ?></div><br>
                            <div class="brand"><b>From: </b><?= $CheckInDate ?></div>
                        </div>
                        <div class="col-sm-12 col-md-2 detailmarge">
                            <div class="type"><b>Room type: </b><?= $words[0] ?></div><br>
                            <div class="model"><b>To: </b><?= $checkOutDate ?></div>
                        </div>
                        <div class="col-sm-12 col-md-4 colomn3">
                            <div class="bloc">
                                <div class="priceBlock">
                                    <?php echo "USD " . $price; ?>
                                </div>
                                <button class="btnChat">
                                    <span class="material-symbols-outlined">
                                        chat
                                    </span>
                                    Chat
                                </button>
                            </div>
                        </div>
                    </div><br><br>
            <?php
                }
            }
        else :
            ?>
            <p class="text-center text-secondary w-100">You don't have any booking</p>
        <?php
        endif;
        ?>
    </div>

    <!-- ======================================================================================================= -->














    <!-- ================================================chat============================================================ -->
    <!-- <div class="chatContainer">
        <div class="row flex-wrap mt-3">
            <div class="col-md-12 mt-3 chat1">
                <img src="<?= base_url ?>/img/complet logo.svg" alt="" class="iconChat">
                <hr class="custom-line"><br>
            </div>
        </div>
        <div class="row flex-wrap mt-3">
            <div class="col-md-12 mt-3 chat2">
                <div class="row send">

                </div><br>
                <div class="row receive">

                </div>
            </div>
        </div>
        <div class="row flex-wrap mt-3">
            <div class="col-md-10 mt-3 chat3">
                <input type="text" placeholder="Type a message ...">
            </div>
            <div class="col-md-2 mt-3">
                <button class="btn btnSend">
                    <span class="material-symbols-outlined">
                        send
                    </span>
                </button>
            </div>
        </div>
    </div> -->
    <!-- =======================================================End chat=========================================================== -->
</main>

<?php
include_once("shared/footer.php");
?>