<?php

use src\controllers\Utils;

include_once("shared/header.php");
// $q = new QueryBuilder();
?>
<main style="width: 100%;">
  <div class="form-top p-4 shadow-sm d-flex gap-4 align-items-center">
    <div class="border-end pt-2 pb-2 pe-4 ">
      <img src="<?= base_url ?>/img/complet logo.svg" width="100">
    </div>
    <?php
    foreach ($data as $item)
      $marke = $item->getMake();
    $model = $item->getModel();
    $price = $item->getPrice_per_day();
    $priceWithDriver = $item->getDriverPrice();
    $typecar = $item->getTypeCar();
    // $price = $item['car']->getPrice_per_day();
    // var_dump($marke);
    ?>
    <template id="carData">
      <input id="carPrice" data-price="<?= $price ?>">
      <input id="driverPrice" data-price="<?= $priceWithDriver ?>">
    </template>
    <h2 class="p-0 m-0"><?php echo $marke ?></h2>
    <div class="flex-grow-1 d-flex justify-content-end gap-3">
      <?php if (Utils::isLogin()) : ?>
        <button show-profile-menu class="border-0 position-relative border-0 menu-item-btn d-flex justify-content-between align-items-center" style="box-shadow: none !important;font-weight: normal !important;text-shadow: none !important;">
          <span class="d-flex align-items-center gap-2">
            <img style="width: 25px;height:25px;object-fit: cover;" class="rounded-pill" src="<?= (!empty($authUser["imgProfile"])) ? base_url . $authUser["imgProfile"] : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>">
            <span class="menu-item-text"><?= $authUser["fullName"] ?></span>
          </span>
          <span class="material-symbols-outlined">
            more_vert
          </span>
          <dialog profile-menu class="border rounded-3 p-0 pt-2 pb-2 position-absolute top-100 right-0" style="z-index:999">
            <a href="<?=base_url?>/profile" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
              <span class="material-symbols-outlined">person</span>
              <span class="menu-item-text">My Account</span>
            </a>
            <a href="" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
              <span class="material-symbols-outlined">wallet</span>
              <span class="menu-item-text">My Bookings</span>
            </a>
            <a href="<?= base_url ?>/dashboard" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
              <span class="material-symbols-outlined">dashboard</span>
              <span class="menu-item-text">My Dashboard</span>
            </a>
            <a href="" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
              <span class="material-symbols-outlined">logout</span>
              <span class="menu-item-text">Logout</span>
            </a>
          </dialog>
        </button>
      <?php else : ?>
        <a class=" btn-outline-blue pt-1 pb-1 ps-3 pe-3 d-flex align-items-center" style="height: 40px;" href="<?= base_url ?>/login">
          <span class="menu-item-text">Sign In</span>
        </a>
        <a class=" btn-blue pt-1 pb-1 pe-3 ps-3 d-flex align-items-center" style="height: 40px;" href="<?= base_url ?>/logup">
          <span class="menu-item-text">Sign Up</span>
        </a>
      <?php endif; ?>
    </div>
  </div>
  <div class="steps position-relative d-flex justify-content-between mt-4 mb-4 ms-3 me-4">
    <span style="z-index: 2; background:var(--teal-8); color:white" class="btn-sm rounded-pill gap-2 p-2 ps-3 d-flex align-items-center justify-content-center disabled">Step<span class="material-symbols-outlined">counter_1</span></span>
    <span style="z-index: 2;background:var(--teal-8);color:white" class="btn-sm rounded-pill gap-2 p-2 ps-3 d-flex align-items-center justify-content-center disabled"> Step<span class="material-symbols-outlined">counter_2</span></span>
    <span style="z-index: 2;background:var(--teal-8);color:white" class="btn-sm rounded-pill gap-2 p-2 ps-3 d-flex align-items-center justify-content-center disabled"> Step<span class="material-symbols-outlined">counter_3</span></span>
    <div style="background:var(--teal-8);position:absolute;height:5px;left:0;right:0;bottom:40%;z-index: 1;"></div>
  </div>
  <!-- ============================================================================ -->
  <div class="shadow p-3 ms-5 mt-2 me-5 me-5 rounded">
    <form action="<?= base_url ?>/rentcarinfo" method="post">
      <div class="row">
        <div class="col-md-5 request d-flex flex-column gap-3">
          <div class="pb-2 pt-2 border-bottom">
            <h6 class="text-secondary p-0 m-0">Request</h6>
          </div>
          <div class="input-search ">
            <label for="date" class="material-symbols-outlined">badge</label>
            <input id="dateCarNeed" name="name" class="w-100" type="text" placeholder="Full Name">
          </div>
          <div class="input-search ">
            <label for="date" class="material-symbols-outlined">pin_drop</label>
            <input id="dateCarNeed" name="adress" class="w-100" type="text" placeholder="Address">
          </div>
          <div class="checkDriver input-search">
            <label for="with-driver" class="material-symbols-outlined">check_circle</label>
            <input class="" type="checkbox" name="withDriver" id="with-driver" placeholder="Check Driver">
            <label for="with-driver">
              With driver ($<?= $priceWithDriver ?> per day)
            </label>
          </div>
          <div class="input-search ">
            <label for="date" class="material-symbols-outlined">date_range</label>
            <input id="dateCarNeed" name="deliveryTime" class="normal-date-picker w-100" type="text" value="">
          </div>
          <div class="input-search ">
            <span class="material-symbols-outlined">event</span>
            <select id="selectHours" name="rentingTime" class="flying-form">
            </select>
          </div>
          <br>
          <div class="row">
            <div class="rm-desc col-6 icon">
              <span class="material-symbols-outlined">
                heat_pump
              </span>
              <span class="rm-desc-val CarCaracter">Available</span>
            </div>
            <div class="rm-desc col-6 icon">
              <span class="material-symbols-outlined">
                mode_fan
              </span>
              <span class="wifi2 CarCaracter">Available</span>
            </div>
            <div class="rm-desc col-6 condition">
              <div class="rm-desc col-12">
                <span><b>Brand:</b> <?php echo $marke ?> <br>
                  <b> Model: </b> <?php echo $model ?> <br><b>Type: </b><?=$typecar?><br><b>Price per day:</b> <?php echo "$" . $price ?></span>
              </div>
              <div class="rm-desc col-12">
                <ul class="rm-desc-val CarCaracter">
                  <li class="d-flex align-items-center m-2"> <span class="material-symbols-outlined me-2 fs-6 p-0">adjust</span> Free cancel </li>
                  <li class="d-flex align-items-center m-2"> <span class="material-symbols-outlined me-2 fs-6 p-0">adjust</span> Identical tank </li>
                  <li class="d-flex align-items-center m-2"> <span class="material-symbols-outlined me-2 fs-6 p-0">adjust</span> Theft protection </li>
                  <li class="d-flex align-items-center m-2"> <span class="material-symbols-outlined me-2 fs-6 p-0">adjust</span> Public liability insurance </li>
                  <li class="d-flex align-items-center m-2"> <span class="material-symbols-outlined me-2 fs-6 p-0">adjust</span> collision insurance</li>
                </ul>
              </div>
            </div>
          </div>
          <?php

          ?>
        </div>
        <div class="col-md-7 description">
          <div class="room-images">
            <?php
            foreach ($imgCar as $img) {
              $imgcar = $img->getPathImg();
            ?>
              <img src="<?php echo $imgcar ?>" alt="">
            <?php
            }
            ?>
          </div>
          <hr>
          <h1 id="price">$22</h1>
          <p class="text-secondary">The rental of our vehicles is open to drivers of at least 18 years of age with a valid driving license. A credit card in the name of the main driver is required for the reservation. The daily mileage allowance is 250 kilometers, with additional charges for any excess. Fuel is included and must be returned at the same level. A refundable deposit is taken on pick-up. Please respect these conditions for a smooth and trouble-free rental.</p><br>
          <div class="checkDriver">
            <input id="agree" class="" type="checkbox" placeholder="Rent Condition">
            <span class="TitlCheckDriver">
              <p>I agree</p>
            </span>
          </div>
          <hr>
          <button id="btnSubmit" type="submit" class="btn btn-blue ps-4 pe-3 d-flex justify-content-center align-items-center">
            <span>Next</span>
            <span class="material-symbols-outlined">
              navigate_next
            </span>
          </button>
        </div>
      </div>
    </form>
  </div>
  <br>
  <br>
  <br>
  <?php
  include_once("shared/front-footer.php");
  ?>

</main>
<?php
include_once("shared/footer.php");
?>