<?php

use src\controllers\Utils;

include_once("shared/header.php");
?>
<main style="width: 100%;">
  <div class="form-top p-4 shadow-sm d-flex gap-4 align-items-center">
    <div class="border-end pt-2 pb-2 pe-4 ">
      <img src="<?= base_url ?>/img/complet logo.svg" width="100">
    </div>
    <h2 class="p-0 m-0"><?= roomType[$room["type"]] ?></h2>
    <div class="flex-grow-1 d-flex justify-content-end gap-3">
      <?php
      if (Utils::isLogin()) : ?>
        <button show-profile-menu class="border-0 position-relative border-0 menu-item-btn d-flex justify-content-between align-items-center" style="box-shadow: none !important;font-weight: normal !important;text-shadow: none !important;">
          <span class="d-flex align-items-center gap-2">
            <img style="width: 25px;height:25px;object-fit: cover;" class="rounded-pill" src="<?= (!empty($authUser["imgProfile"])) ? base_url . $authUser["imgProfile"] : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>">
            <!-- <span class="material-symbols-outlined">account_circle</span> -->
            <span class="menu-item-text"><?= $authUser["fullName"] ?></span>
          </span>
          <span class="material-symbols-outlined">
            more_vert
          </span>
          <dialog profile-menu class="border rounded-3 p-0 pt-2 pb-2 position-absolute top-100 right-0" style="z-index:999">
            <a href="<?= base_url ?>/profile" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
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
    <span style="z-index: 2; background:var(--teal-8); color:white" class="btn-sm rounded-pill gap-2 p-2 d-flex align-items-center justify-content-center disabled"> <span class="material-symbols-outlined">counter_1</span> Select Room</span>
    <span style="z-index: 2;background:var(--teal-8);color:white" class="btn-sm rounded-pill gap-2 p-2 d-flex align-items-center justify-content-center disabled"> <span class="material-symbols-outlined">counter_2</span> Select Room</span>
    <span style="z-index: 2;background:var(--teal-8);color:white" class="btn-sm rounded-pill gap-2 p-2 d-flex align-items-center justify-content-center disabled"> <span class="material-symbols-outlined">counter_3</span> Select Room</span>
    <div style="background:var(--teal-8);position:absolute;height:5px;left:0;right:0;bottom:40%;z-index: 1;"></div>
  </div>
  <!-- ============================================================================ -->
  <div class="shadow p-3 ms-5 mt-2 me-5 me-5 rounded">
    <?php $codeRoom = $room["codeRoom"];
    // echo $codeRoom;
    ?>
    <form action="<?= base_url ?>/rentHotelinfo/<?= $codeRoom ?> " method="post">
      <div class="row">
        <div class="col-md-5 request d-flex flex-column gap-3">
          <div class="pb-2 pt-2 border-bottom">
            <h6 class="text-secondary p-0 m-0">Request</h6>
          </div>
          <div class="input-search ">
            <span class="material-symbols-outlined">
              person
            </span>
            <input type="text" name="customerName" class="flyin-form w-100" id="swich-price" placeholder="Customer name *">
          </div>
          <div class="input-search ">
            <span class="material-symbols-outlined">date_range</span>
            <input name="checkDates" class="flying-form form-date" placeholder="Check In Date" type="text" value="<?= (isset($_SESSION["checkIn"]) && isset($_SESSION["checkOut"])) ? $_SESSION["checkIn"] . " - " . $_SESSION["checkOut"] : ""; ?>">
          </div>
          <div class="content-room">
            <div class="row">
              <div class="rm-desc col-6">
                <span class="material-symbols-outlined">
                  group
                </span>
                <span class="rm-desc-val"><?= $room["maxPerson"] ?> Adults</span>
              </div>
              <div class="rm-desc col-6">
                <span class="material-symbols-outlined">
                  child_care
                </span>
                <span class="rm-desc-val"><?= $room["children"] ?> Children</span>
              </div>

              <div class="rm-desc col-6">
                <span class="material-symbols-outlined">
                  wifi
                </span>
                <span class="rm-desc-val material-symbols-outlined text-<?= ($room["wifi"] == 1) ? "success" : "danger"; ?> fs-6"><?= ($room["wifi"] == 1) ? "check_circle" : "cancel"; ?></span>
              </div>
              <div class="rm-desc col-6">
                <span class="material-symbols-outlined">
                  local_cafe
                </span>
                <span class="rm-desc-val material-symbols-outlined text-<?= ($room["breakfast"] == 1) ? "success" : "danger"; ?> fs-6"><?= ($room["breakfast"] == 1) ? "check_circle" : "cancel"; ?></span>
              </div>
              <div class="rm-desc col-6">
                <span class="material-symbols-outlined">
                  bed
                </span>
                <span class="rm-desc-val"><?= $room["bedSize"] ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7 description">
          <div class="room-images">
            <?php
            if (isset($images)) {
              foreach ($images as $key => $img) {
                if ($key > 4) {
                  break;
                }
            ?>
                <img src="<?= $img["pathImg"] ?>" alt="">
            <?php
              }
            }
            ?>
          </div>
          <hr>
          <h1 id="price fs-1"><?= "$" . $room["price"] ?></h1>
          <p class="text-secondary"><?= $room["description"] ?></p>
          <hr>
          <button type="submit" name="btn_payement" class="btn btn-blue ps-4 pe-3 d-flex justify-content-center align-items-center" id="submit-btn" disabled>
            <span>Next Stape </span>
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