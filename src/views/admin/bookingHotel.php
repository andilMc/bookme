<?php
include_once(__DIR__ . "/../shared/header.php");
include_once(__DIR__ . "/../shared/admin-nav-front.php");
?>

<main class="book-container">
    <!-- <h1 class="titre">Nasma</h1> -->
    <div class="admin-header">
        <a href="<?= base_url ?>/profile" class="admin-profile-link">
            <div class="admin-profile">
                <img src="<?= (!empty($authUser["imgProfile"])) ? base_url . $authUser["imgProfile"] : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>" class="admin-profile-img" alt="">
            </div>
        </a>
    </div>
    
    <?php
    // foreach ($Cars as $Car) {
    //     $make = $Car['make'];
    //     $model = $Car['model'];
    //     $typeCar = $Car['typeCar'];
    //     $pickupDate = $Car['pickupDate'];
    //     $returnDate = $Car['returnDate'];
    //     $idRental = $Car['idRental'];
    //     $totalPrice = $Car['totalPrice'];
    //     $matriculePlate = $Car['license_plate'];
    //     $customerName = $Car['customerName'];
    //     $pathImage = $Car['pathImg'];
    ?>
        <div class="row w-100 mybook" id="bookCar">
            <div class="col-sm-12 col-md-2">
                <img class="image-1 image-margin" src="https://www.redrockresort.com/wp-content/uploads/2020/04/RR-King-Bedroom.jpg" />
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="brand"><b>Booking n°: </b><?= "BK0015" ?></div><br>
                <div class="type"><b>From: </b><?= "2024-10-12" ?></div>
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="model"><b>Room Type: </b><?= "Queen" ?></div><br>
                <div class="brand"><b>To: </b><?= "2024-10-14" ?></div>
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="type"><b>customer Name: </b><?= "Ali Said" ?></div><br>
                <!-- <div class="model"><b>To: </b><?= "2024-10-10" ?></div> -->
            </div>
            <div class="col-sm-12 col-md-4 colomn3">
                <div class="bloc">
                    <div class="priceBlock">
                        <?= "USD" . "200" ?>
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

        <div class="row w-100 mybook" id="bookCar">
            <div class="col-sm-12 col-md-2">
                <img class="image-1 image-margin" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQeW0XyC7QrvnOvf_QpzbAa7nzsQTrv8xUJZ5_UaW6GJ8nyfq__XLSajDj47-Hau_HFbM&usqp=CAU" />
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="brand"><b>Booking n°: </b><?= "BK0016" ?></div><br>
                <div class="type"><b>From: </b><?= "2024-06-05" ?></div>
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="model"><b>Room Type: </b><?= "Queen" ?></div><br>
                <div class="brand"><b>To: </b><?= "2024-06-06" ?></div>
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="type"><b>customer Name: </b><?= "Nadjma Youssouf" ?></div><br>
                <!-- <div class="model"><b>To: </b><?= "2024-10-10" ?></div> -->
            </div>
            <div class="col-sm-12 col-md-4 colomn3">
                <div class="bloc">
                    <div class="priceBlock">
                        <?= "USD" . "100" ?>
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


        <div class="row w-100 mybook" id="bookCar">
            <div class="col-sm-12 col-md-2">
                <img class="image-1 image-margin" src="https://www.redrockresort.com/wp-content/uploads/2020/04/RR-King-Bedroom.jpg" />
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="brand"><b>Booking n°: </b><?= "BK0017" ?></div><br>
                <div class="type"><b>From: </b><?= "2024-06-12" ?></div>
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="model"><b>Room Type: </b><?= "Queen" ?></div><br>
                <div class="brand"><b>To: </b><?= "2024-06-13" ?></div>
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="type"><b>customer Name: </b><?= "Harith" ?></div><br>
                <!-- <div class="model"><b>To: </b><?= "2024-10-10" ?></div> -->
            </div>
            <div class="col-sm-12 col-md-4 colomn3">
                <div class="bloc">
                    <div class="priceBlock">
                        <?= "USD" . "100" ?>
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

        <div class="row w-100 mybook" id="bookCar">
            <div class="col-sm-12 col-md-2">
                <img class="image-1 image-margin" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3mpr6-YM__u5Z74SEYShZwHWi2CnPSd7Zrw&s" />
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="brand"><b>Booking n°: </b><?= "BK0018" ?></div><br>
                <div class="type"><b>From: </b><?= "2024-07-01" ?></div>
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="model"><b>Room Type: </b><?= "Queen" ?></div><br>
                <div class="brand"><b>To: </b><?= "2024-07-01" ?></div>
            </div>
            <div class="col-sm-12 col-md-2 detailmarge">
                <div class="type"><b>customer Name: </b><?= "Ramu" ?></div><br>
                <!-- <div class="model"><b>To: </b><?= "2024-10-10" ?></div> -->
            </div>
            <div class="col-sm-12 col-md-4 colomn3">
                <div class="bloc">
                    <div class="priceBlock">
                        <?= "USD" . "70" ?>
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
    // }
    ?>
</main>

<?php
include_once(__DIR__ . "/../shared/footer.php");
?>