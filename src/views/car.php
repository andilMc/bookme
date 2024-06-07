<?php

use src\controllers\Utils;

include_once("shared/header.php");
include_once("shared/nav-front.php");
?>
<main>
  <div class="sect">
  </div>
  <div class="tab-menu-search">
    <div class="tab">
      <!-- <form action="" method="get"> -->
      <div class="ps-3 d-flex flex-nowrap justify-content-between align-items-center">
        <h5 class="text-secondary  m-0 p-2">Search</h5>
        <!-- <div class="input-search bg-transparent" style="width: 200px;">
            <span class="material-symbols-outlined">tune</span>
            <select class="flying-from form-select w-100 bg-transparent" name="way" id="">
              <option selected="" disabled value="0">Vehicle Type</option>
              <?php
              foreach (carType as $key => $value) :
              ?>
                <option href="" class="btn btn-pin"> <?= ucfirst($value) ?> </option>

              <?php
              endforeach;
              ?>
            </select>
          </div> -->
      </div>
      <div class="lign"></div>
      <div class="d-flex p-4 flex-wrap gap-3">
        <div class="flex-grow-1 d-flex align-items-center">
          <div class="input-search" style="min-width:150px">
            <span class="material-symbols-outlined">
              directions_car
            </span>
            <input hx-get="<?= base_url ?>/search-cars" hx-target="#list-cars" hx-indicator="#indicator" hx-trigger="keyup delay:300ms" type="search" name="carSearch" class="flying-from form-airport w-100" placeholder="Search" />
            <span class="material-symbols-outlined">
              search
            </span>
          </div>
        </div>
        <!-- =================================================== input range =============================================== -->
        <!-- <div class="col">
            <div class="input-search" style="min-width: 400px;">
              <div class="wrapper pb-1">
                <div class="price-input justify-content-between align-items-center">
                  <div class="field">
                    <input type="number" name="min-price" class="input-min" value="0">
                  </div>
                  <label>Price range ($)</label>
                  <div class="field">
                    <input type="number" name="max-price" class="input-max text-end" value="10000">
                  </div>
                </div>
                <div class="slider">
                  <div class="progress"></div>
                </div>
                <div class="range-input">
                  <input type="range" class="range-min" min="0" max="10000" value="20">
                  <input type="range" class="range-max" min="0" max="10000" value="8000">
                </div>
              </div>
            </div>
          </div> -->
        <!-- =========================================================  end input range========================================= -->
        <!-- <div class="col">
            <button type="submit" class=" w-100 btn btn-blue ">
              Search
            </button>
          </div> -->
      </div>
      <!-- </form> -->
    </div>
    </form>
  </div>
  </div>
  <!-- ======================================boby============================================== -->
  <div class=" d-flex flex-column justify-content-center align-items-center m-4 mt-0">
    <h1 class="title text-center w-100">Our car services</h1>
    <p class="text-center">
      Discover adventure with confidence in our safe, high-performance vehicles
    </p>
  </div>
  <!-- ===============================================Bloc car=============================================================== -->
  <div id="list-cars" class="pe-3 ps-3" hx-get="<?= base_url ?>/list-cars" hx-trigger="load" hx-indicator="#indicator">
    <img id="indicator" class="mx-auto" src="<?= base_url ?>/img/loading.gif" alt="loader" width="200">
  </div>

  <!-- =========================================Blocs offer================================================= -->
  <div class="d-flex flex-column justify-content-center align-items-center m-4 mt-5">
    <h1 class="title text-center w-100">Find Your Ideal Offer</h1>
    <p class="text-center">
      Save smart, drive in style: Unbeatable offers for every kilometer you drive.
    </p>
  </div>
  <div class="pe-3 ps-3" hx-get="<?= base_url ?>/recommand-cars" hx-trigger="load" hx-indicator="#indicator" hx-vals='{"usr": "<?= (Utils::isLogin()) ? $authUser["codeUser"] : ""; ?>"}'>
    <img id="indicator" class="mx-auto" src="<?= base_url ?>/img/loading.gif" alt="loader" width="200">

  </div>
  <!-- =========================================Blocs offer================================================= -->

  <div class="space mb-5"></div>
  <?php
  include_once("shared/front-footer.php");
  ?>

</main>
<?php
include_once("shared/footer.php");
?>