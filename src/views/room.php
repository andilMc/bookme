<?php

use core\sql\QueryBuilder;
use core\tools\Crypto;

include_once("shared/header.php");
include_once("shared/nav-front.php");
$q = new QueryBuilder();
?>

<main style="display: block;">
  <div id="hero-room" class="sect" style="display: flex;" data-title="<?= $hotel["hotelName"] ?>">
         
  </div>
  <div class="tab-menu-search" style="display: block;">
    <div class="tab" style="display: block;">
      <form action="" method="get" style="display: block;">
        <div class="ps-3 d-flex flex-nowrap justify-content-between align-items-center" style="display: none;">
          <h5 class="text-secondary  m-0 p-0" style="display: block;">Search</h5>
          <div class="input-search bg-transparent" style="width: 200px; display: flex;">
            <span class="material-symbols-outlined" style="display: block;">tune</span>
            <select class="flying-from form-select w-100 bg-transparent" name="way" id="" style="display: block;">
              <option selected="" disabled="" value="0" style="display: block;">room Type</option>
              <option href="" class="btn btn-pin" style="display: inline-block;"> Sedan </option>

              <option href="" class="btn btn-pin" style="display: inline-block;"> Sport Utility Vehicle(SUV) </option>

              <option href="" class="btn btn-pin" style="display: inline-block;"> Minivan </option>

              <option href="" class="btn btn-pin" style="display: inline-block;"> Electric Vehicle (EV) </option>

              <option href="" class="btn btn-pin" style="display: inline-block;"> Luxury Car </option>

              <option href="" class="btn btn-pin" style="display: inline-block;"> Classic Car </option>

              <option href="" class="btn btn-pin" style="display: inline-block;"> Compact Car </option>

            </select>
          </div>
        </div>
        <div class="lign" style="display: block;"></div>
        <div class="d-flex p-4 flex-wrap gap-3" style="display: none;">
          <div class="flex-grow-1" style="display: block;">
            <div class="input-search  input-passengers position-relative gap-2 " style="min-width:250px;">
              <!-- $adults = null, $children = null, $infants = null, $travelClass = null, -->
              <span class="material-symbols-outlined">group</span>
              <input name="travelers" class="flying-form passenger-value" placeholder="Passengers" disabled="">

              <span class="material-symbols-outlined more btn-outline-blue d-flex align-items-center pt-2 p-1 text-black-50 " style="height: 25px; width: 25px; cursor: pointer;">expand_more</span>
              <div class="person-forms position-absolute suggest-liste mt-2 overflow-hidden  shadow card ps-3 pe-3 pb-3 d-none  flex-column gap-3 top-100 start-0 w-auto   ">
                <div class=" d-flex justify-content-between align-items-center   border-bottom pt-3 pb-3 object-fit-scale ">
                  <p class="m-0 ">Persons</p>
                  <a href="#" class="btn btn-outline-blue text-danger btn-hide" style="height:30px;width:30px"> X </a>
                </div>
                <div class="d-flex  gap-2 psg-number align-items-center ">
                  <span class="material-symbols-outlined">accessibility_new</span>
                  <p class="m-0 small text-nowrap w-100  ">Adult(s) </p>
                  <a href="#" class="btn btn-sm btn-blue  d-flex justify-content-center align-items-center btn-psg-add " style="height:30px;width:30px">+</a>
                  <input name="adults" class="flying-form ps-2  psg-value text-center m-2" value="<?= (isset($adults)) ? $adults : 1 ?>" style="height:30px;width:40px">
                  <a href="#" class="btn btn-sm btn-blue d-flex justify-content-center align-items-center btn-psg-moins" style="height:30px;width:30px" disabled="disabled">-</a>
                </div>
                <div class="d-flex gap-2 psg-number align-items-center ">
                  <span class="material-symbols-outlined">escalator_warning</span>
                  <p class="m-0 small text-nowrap w-100">Children <span class="text-black-50 "> <br> 0 to 5 years inclusive</span> </p>

                  <a href="#" class="btn btn-sm btn-blue d-flex justify-content-center align-items-center btn-psg-add" style="height:30px;width:30px">+</a>
                  <input name="children" class="flying-form ps-2  psg-value text-center m-2" value="<?= (isset($children)) ? $children : 0 ?>" style="height:30px;width:40px">
                  <a href="#" class="btn btn-sm btn-blue d-flex justify-content-center align-items-center btn-psg-moins" style="height:30px;width:30px" disabled="disabled">-</a>
                </div>
              </div>
            </div>
          </div>

          <!-- =========================================================  end input range========================================= -->
          <div class="flex-grow-1 d-flex align-items-center justify-content-start">
            <button type="submit" class="btn btn-blue w-100">
              Search
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  
  <!-- ======================================boby============================================== -->
  <?php
  if (!empty($rooms)) {
  ?>
    <div class=" d-flex flex-column justify-content-center align-items-center m-4 mt-0">
      <h1 class="title text-center w-100">Select your room</h1>
      <p class="text-center">
      Discover luxury in the heart of nature
      </p>
    </div>
    <div class="rooms">
      <div class="row ">
        <?php
        foreach ($rooms as $room) :
          $codeRoom = $room->getCodeRoom();
          $img = $q->table("image")->select("pathImg")->where("codeOwner = '$codeRoom'")->get()[0]["pathImg"];
        ?>
          <div class="col-md-4 mt-5">
            <a href="<?= base_url ?>/rm/<?= $codeRoom ?>" class="w-100 room">
              <div class="imghotel">
                <img class="img" src="<?= $img ?>" />
              </div>
              <div class="content-room">
                <p class="room-title"><?= roomType[$room->getType()] ?></p>
                <div class="row">
                  <div class="rm-desc col-6">
                    <span class="material-symbols-outlined">
                      group
                    </span>

                    <span class="rm-desc-val"><?= $room->getMaxPerson() ?> Adults</span>
                  </div>
                  <div class="rm-desc col-6">
                    <span class="material-symbols-outlined">
                      child_care
                    </span>
                    <span class="rm-desc-val"><?= $room->getChildren() ?> Children</span>
                  </div>

                  <div class="rm-desc col-6">
                    <span class="material-symbols-outlined">
                      wifi
                    </span>
                    <span class="rm-desc-val material-symbols-outlined text-<?= ($room->getWifi() == 1) ? "success" : "danger"; ?> fs-6"><?= ($room->getWifi() == 1) ? "check_circle" : "cancel"; ?></span>
                  </div>
                  <div class="rm-desc col-6">
                    <span class="material-symbols-outlined">
                      local_cafe
                    </span>
                    <span class="rm-desc-val material-symbols-outlined text-<?= ($room->getBreakfast() == 1) ? "success" : "danger"; ?> fs-6"><?= ($room->getBreakfast() == 1) ? "check_circle" : "cancel"; ?></span>
                  </div>
                  <div class="rm-desc col-6">
                    <span class="material-symbols-outlined">
                      bed
                    </span>
                    <span class="rm-desc-val"><?= $room->getBedSize() ?></span>
                  </div>
                </div>

                <div class="w-100 ">
                  <h2 class="text-end me-4">$<?= $room->getPrice() ?></h2>
                </div>

                <span class="btn btn-book w-100">
                  Select this Room
                </span>
              </div>
            </a>
          </div>
        <?php
        endforeach;
        ?>
      </div>
    </div>
  <?php
  } else {
  ?>
    <div class=" d-flex flex-column justify-content-center align-items-center m-4 mt-5">
      <p class="text-center fs-3 text-secondary">
        <span class="material-symbols-outlined fs-1">
          sentiment_very_dissatisfied
        </span> <br>
        Sorry Rooms Not Found

      </p>
    </div>
  <?php
  }
  ?>
  <div class="space mb-5"></div>

  <!-- ============================================end body ============================================= -->
  <!-- </div> -->
  <?php
  include_once("shared/front-footer.php");
  ?>

</main>
<?php
include_once("shared/footer.php");
?>