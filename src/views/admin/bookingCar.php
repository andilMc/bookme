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
    <div class="w-100 mt-3 p-3">
        <div class=" p-2" style="border-radius:10px;background-color: var(--gray-0) !important">
            <div class="header-card side-red justify-content-between align-items-center">
                <h2 class="card-title ">Our Booking Cars</h2>
            </div>
            <div class="mt-3">
                <?php
                if (!empty($Cars)) {
                    foreach ($Cars as $Car) {
                        $make = $Car['make'];
                        $model = $Car['model'];
                        $typeCar = $Car['typeCar'];
                        $pickupDate = $Car['pickupDate'];
                        $returnDate = $Car['returnDate'];
                        $idRental = $Car['idRental'];
                        $totalPrice = $Car['totalPrice'];
                        $matriculePlate = $Car['license_plate'];
                        $customerName = $Car['customerName'];
                        $pathImage = $Car['pathImg'];
                ?>
                        <div class="w-100 mybook">
                            <div class="row">
                                <div class="col-2">
                                    <img class="image-1 image-margin" src="<?= $pathImage ?>" />
                                </div>
                                <div class=" col-2 detailmarge">
                                    <div class="brand"><b>Booking n°: Bk <?= $idRental ?></b></div><br>
                                    <div class="type"><b>customer Name: </b><?= $customerName ?></div>
                                </div>
                                <div class="col-2 detailmarge">
                                    <div class="model"><b>Licence: </b><?= $matriculePlate ?></div><br>
                                    <div class="brand"><b>From: </b><?= $pickupDate ?></div>
                                </div>
                                <div class="col-2 detailmarge">
                                    <div class="type"><b>Brand: </b><?= $make ?></div><br>
                                    <div class="model"><b>To: </b><?= $returnDate ?></div>
                                </div>
                                <div class="col-4 d-flex align-items-center justify-content-center gap-2">
                                    <div class="priceBlock">
                                        <?= "$ " . $totalPrice ?>
                                    </div>
                                    <button class="btnChat">
                                        <span class="material-symbols-outlined">
                                            chat
                                        </span>
                                        Chat
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    You don't have any booking
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</main>

<?php
include_once(__DIR__ . "/../shared/footer.php");
?>