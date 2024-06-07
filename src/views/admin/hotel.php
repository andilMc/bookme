<?php
include_once(__DIR__ . "/../shared/header.php");
include_once(__DIR__ . "/../shared/admin-nav-front.php");
?>

<main class="admin-container h-100">
    <div class="admin-header">
        <a href="#" class="admin-profile-link">
            <div class="admin-profile">
                <img src="<?= (!empty($authUser["imgProfile"])) ? base_url . $authUser["imgProfile"] : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>" class="admin-profile-img" alt="">
            </div>
        </a>
    </div>

    <div class="w-100 mt-3 p-3">
        <div class=" p-2" style="border-radius:10px;background-color: var(--gray-0) !important">
            <div class="header-card side-green justify-content-between align-items-center">
                <h2 class="card-title ">Hotel</h2>
                <a href="" class="btn btn-outline-secondary btn-sm d-flex align-items-center border-0 shadow-none m-2" style="border-radius: 10px;"><span class="material-symbols-outlined fs-4">settings</span></a>
            </div>
            <div class="container p-3 pt-2">
                <div class="row list-p ">
                    <div class="col-md-3">
                        <a href="<?= base_url ?>/dashboard/newoffer" class="add-btn h-100 w-100  card border p-2 bg-transparent s-flex justify-content-center align-items-center">
                            <span class="material-symbols-outlined ">add</span>
                            <p>Add New room</p>
                        </a>
                    </div>
                    <?php
                    if (!empty($rooms)) {
                        foreach ($rooms as $room) {
                            // var_dump($room);
                            $img = $room['pathImg'];
                            $typeRoom = $room['type'];
                            $price = $room['price'];
                           
                    ?>
                            <div class="col-md-3">
                                <div class="card border p-2">
                                    <img class="img-p-c" src="<?= $img ?>" alt="">
                                    <span style="color: #2b638e;"><b><?= roomType[$typeRoom] ?> <?= "$ " . $price ?></b></span>
                                    <!-- <span style="color: #2b638e;"><b><?= "USD " . $price ?></b></span> -->
                                    <div class="d-flex justify-content-end">
                                        <a href="#m=modal-<?= $car["codeCar"] ?>" class="btn btn-sm btn-outline-blue border-0 shadow-none" open-modal="modal-<?= $car["codeCar"] ?>">
                                            <span class="material-symbols-outlined ">edit</span>
                                        </a>
                                        <!-- <dialog class="bg-transparent" id="modal">
                                        <div class="modal-body right-modal">
                                            <div class=" d-flex justify-content-start position-sticky top-0 p-2" style="z-index: 999;background: var(--gray-0);">
                                                <a href="#" style="border-radius: 10px;" class="btn-sm  btn-outline-danger  d-flex align-items-center justify-content-start" close-modal="modal">
                                                    <span class="material-symbols-outlined">close</span>
                                                </a>
                                            </div>
                                            <div class="header-card side-green border-bottom pt-2 p-2 border-top">
                                                <h5 class="card-title admin-title">Marke Model</h5>
                                            </div>
                                            <div class="container p-3">
                                                <div class="d-flex gap-3">
                                                    <div class="" style="width: 320px;">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <img src="https://www.disneyholidays.co.uk/disneyland-paris/images/hotels/disney-hotel-santa-fe/rooms/cars-standard-room-near-hotel-facilities.jpg" id="img" style=" width: 100%; height:200px; border-radius:10px; object-fit: cover;">
                                                            <br>
                                                            <label class="input-search overflow-hidden " for="input-img">
                                                                <span class="material-symbols-outlined">upload</span>
                                                                <span id="path"> Click here to upload New Image</span>
                                                            </label>
                                                            <input type="file" accept=".jpeg,.jpg,.png" name="img" id="input-img" hidden img-input="img" img-path="path">
                                                            <input type="text" hidden value="" name="idImg">
                                                            <input type="text" hidden value="" name="codeOwner">
                                                            <br>
                                                            <button name="updateMainImg" type="submit" class="btn btn-dark w-100 d-flex justify-content-center align-items-center gap-2" style="border-radius:10px;">
                                                                <span class="material-symbols-outlined">save</span>
                                                                <span>Save this Image</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="flex-grow-1 d-flex justify-content-center align-items-center border" style="border-radius:10px;">
                                                    </div>
                                                </div>
                                                <hr>
                                                <form action="" method="post">
                                                    <div class="row ">
                                                        <div class="col-md-4 p-2">
                                                            <label for="" class="ms-2 admin-title">Make*</label>
                                                            <div class="input-search ">
                                                                <span class="material-symbols-outlined ">build_circle</span>
                                                                <input name="make" id="" value="" class="flying-form" placeholder="Make" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <label for="" class="ms-2 admin-title">Model*</label>
                                                            <div class="input-search ">
                                                                <span class="material-symbols-outlined ">category</span>
                                                                <input name="model" id="" value="" class="flying-form" placeholder="Model" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <label for="" class="ms-2 admin-title">License Plate*</label>
                                                            <div class="input-search ">
                                                                <span class="material-symbols-outlined ">tag</span>
                                                                <input name="license_plate" id="" value="" class="flying-form" placeholder="License Plate" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <label for="" class="ms-2 admin-title">Type Car*</label>
                                                            <div class="input-search ">
                                                                <span class="material-symbols-outlined ">car_tag</span>
                                                                <select name="carType" id="carType" class="flying-form">
                                                                    <option selected disabled>Type Car</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <label for="" class="ms-2 admin-title">Year of Issue*</label>
                                                            <div class="input-search ">
                                                                <span class="material-symbols-outlined ">calendar_month</span>
                                                                <input name="license_plate" id="" value="" class="flying-form" placeholder="Year of Issue" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <label for="" class="ms-2 admin-title">Fuel Type*</label>
                                                            <div class="input-search ">
                                                                <span class="material-symbols-outlined ">ev_station</span>
                                                                <select name="fuel" class="flying-form">
                                                                    <option selected disabled>Fuel Type</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <label for="" class="ms-2 admin-title">Transmission*</label>
                                                            <div class="input-search ">
                                                                <span class="material-symbols-outlined ">manufacturing</span>
                                                                <select name="transmission" class="flying-form">
                                                                    <option selected disabled>Transmission</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <label for="" class="ms-2 admin-title">Color*</label>
                                                            <div class="input-search ">
                                                                <span class="material-symbols-outlined">format_color_fill</span>
                                                                <input id="colorinput" pattern="#{0-9A-Fa-f}{6}" type="color" value="">
                                                                <input name="color" id="color" value="" onchange="$('#colorinput').val($(this).val())" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <label for="" class="ms-2 admin-title">Price per day*</label>
                                                            <div class="input-search ">
                                                                <span class="material-symbols-outlined ">attach_money</span>
                                                                <input name="transsmission" id="" value="" class="flying-form" placeholder="Transmission" type="text">
                                                                <p class="m-0 p-0">(USD)</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 p-2">
                                                            <label for="" class="ms-2 admin-title">Driver Price (Optional)</label>
                                                            <div class="input-search ">
                                                                <span class="material-symbols-outlined ">attach_money</span>
                                                                <input name="transsmission" id="" value="" class="flying-form" placeholder="Transmission" type="text">
                                                                <p class="m-0 p-0">(USD)</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 p-2">
                                                            <label for="" class="ms-2 admin-title">Description (Optional)</label>
                                                            <div class="d-flex p-2" style="background: var(--gray-2);border-radius: var(--radius-3);">
                                                                <span class="material-symbols-outlined ">description</span>
                                                                <textarea class="w-100 flying-form" name="description" id="" rows="7">
                                                                    
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-end p2">

                                                        <button class="btn btn-blue " style="width:150px">Update</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </dialog>  -->
                                    </div>

                                </div>
                            </div>
                        <?php
                        }
                    }
                    //  else { ?>
                        <!-- echo "No room"; -->
                        <!-- <div>
                            <h3>Please add your first service!</h3>
                        </div> -->
                    <?php
                    // }
                    ?>

                </div>
            </div>
        </div>


    </div>
</main>

<?php
include_once(__DIR__ . "/../shared/footer.php");
?>