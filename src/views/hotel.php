<?php
include_once("shared/header.php");
include_once("shared/nav-front.php");
?>
<main>
  <div class="hotel-body">
    <div class="header">
      <img class="hotel-12-1" src="https://www.hotelb55.com/_novaimg/galleria/1449779.jpg" />
      <h1 class="explore-the-whole-world-and-enjoy-its-beauty">
        Explore the whole world<br />and enjoy its beauty
      </h1>
      <div class="search-bar ">
        <div class="searchTitle p-1 d-flex align-items-center justify-content-between  w-100">
          <h5 class="text-secondary  m-0 p-0">Search</h5>
          <div class="input-search bg-transparent" style="width: 200px;">
            <span class="material-symbols-outlined">tune</span>
            <select class="flying-from form-select w-100 bg-transparent" name="way" id="">
              <option selected="" disabled value="0">Hotel Type</option>
              <?php
              foreach (hotelType as $key => $value) :
              ?>
                <option href="" class="btn btn-pin"> <?= ucfirst($value) ?> </option>

              <?php
              endforeach;
              ?>
            </select>
          </div>
        </div>
        <div class="lign"></div>
        <form action="" method="get">
          <div class="row">
            <div class="col">
              <div class="input-search" style="min-width:300px">
                <span class="material-symbols-outlined">pin_drop</span>
                <input name="country" class=" country-select flying-from form-airport w-100 flex-grow-1 bg-transparent" placeholder="Country (Optional)" suggest-id="liste1" value="<?= (isset($country)) ? $country : ""; ?>" />
              </div>
            </div>
            <div class="col">
              <div class="input-search " style="min-width:400px;position: relative;">
                <label for="checkDates"><span class="material-symbols-outlined">date_range</span></label>
                <input name="checkDates" class="flying-form form-date" placeholder="Check In Date" type="text" value="<?= (isset($checkIn) && isset($checkOut)) ? $checkIn . " - " . $checkOut : ""; ?>">
              </div>
            </div>
            <!-- =================================================== input range =============================================== -->
            <div class="col">
              <div class="input-search" style="min-width: 400px;">
                <div class="wrapper pb-1">
                  <div class="price-input justify-content-between align-items-center">
                    <div class="field">
                      <input type="number" name="minPrice" class="input-min" value="<?= (isset($minPrice)) ? $minPrice : "0"; ?>">
                    </div>
                    <label>Price range ($)</label>
                    <div class="field">
                      <input type="number" name="maxPrice" class="input-max text-end" value="<?= (isset($maxPrice)) ? $maxPrice : "10000"; ?>">
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
            </div>
            <!-- =========================================================  end input range========================================= -->
            <div class="col d-flex align-items-start justify-content-center">
              <button type="submit" class="btn btn-blue">
                Search
              </button>
            </div>
          </div>
        </form>

      </div>
    </div>

    <!-- ======================================boby============================================== -->
    <?php
    if (!empty($data)) {
    ?>
      <div class=" d-flex flex-column justify-content-center align-items-center m-4 mt-5">
        <h1 class="title text-center w-100">Find our hotels</h1>
        <p class="text-center">
          Spend an incredible stay in our hotel. and take advantage of our best services to spend an incredible vacation.
        </p>
      </div>

      <!-- =====================================================block hotel=================================== -->
      <div class="raw-hotels row gap-0">
        <?php
        foreach ($data as $item) {
          $price = $item['room']->getPrice();
          $name = $item['hotel']->getHotelName();
          $code = $item['hotel']->getCodeHotel();
          $localisation = $item['hotel']->getCountry();
          $img = $item['img'][0]->getPathImg();
        ?>
          <div class="col-md-4 p-2">
            <a class="hotel  w-100" id="blockSeeSameHotel" href="<?= base_url ?>/htl/<?= $code ?>">
              <div class="imghotel">
                <img class="img " src="<?php echo $img; ?>" />
              </div>
              <div class="hotelname">
                <p class="name"><?php echo $name; ?></p>
                <p class="price"><?php echo $price; ?>$</p>
              </div>
              <div class="address-hotel">
                <svg class="icon-localisation3" width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M7.145 8.99997C7.63622 8.99997 8.05673 8.82548 8.40654 8.4765C8.75635 8.12753 8.93125 7.70802 8.93125 7.21797C8.93125 6.72792 8.75635 6.3084 8.40654 5.95943C8.05673 5.61045 7.63622 5.43597 7.145 5.43597C6.65378 5.43597 6.23327 5.61045 5.88346 5.95943C5.53365 6.3084 5.35875 6.72792 5.35875 7.21797C5.35875 7.70802 5.53365 8.12753 5.88346 8.4765C6.23327 8.82548 6.65378 8.99997 7.145 8.99997ZM7.145 17.91C4.74845 15.8755 2.95848 13.9859 1.77509 12.241C0.591695 10.4961 0 8.88117 0 7.39617C0 5.16867 0.718221 3.39409 2.15466 2.07244C3.59111 0.750791 5.25455 0.0899658 7.145 0.0899658C9.03545 0.0899658 10.6989 0.750791 12.1353 2.07244C13.5718 3.39409 14.29 5.16867 14.29 7.39617C14.29 8.88117 13.6983 10.4961 12.5149 12.241C11.3315 13.9859 9.54155 15.8755 7.145 17.91Z" fill="#23A1DB" />
                </svg>
                <p class="address2"><?php echo $localisation; ?></p>
              </div>
            </a>
          </div>

        <?php
          //  echo "Room : $price$, $name, $localisation, $img <br>";
        }
        ?>
      </div>
      <!-- =============================end block hotel========================================= -->
      <div class="d-flex justify-content-center">
        <button class="show-more-btn" id="showMoreBtn">
          <p class="show-more" id="show-more">Show more</p>
          <!-- <p class="show-more" id="show-more"></p> -->
        </button>
      </div>
    <?php
    } else {
    ?>

      <div class=" d-flex flex-column justify-content-center align-items-center m-4 mt-5">
        <p class="text-center fs-3 text-secondary">
          <span class="material-symbols-outlined fs-1">
            sentiment_very_dissatisfied
          </span> <br>
          Sorry Hote Not Found

        </p>
      </div>
  </div>

<?php
    }
?>
<div class=" d-flex flex-column justify-content-center align-items-center m-4 mt-5">
  <h1 class="title text-center w-100">Find Your Ideal Offer</h1>
  <p class="text-center">
    Let&#039;s enjoy this heaven on earth
  </p>
</div>

<div class="offer-row">
  <div class="offer-hotel">
    <img class="rectangle-1" src="https://images.ctfassets.net/guen72jxl4tk/3VPp6byeYG4NGb5eVKge8q/b90e75f2d1567fe7b59695d36b65fe2a/home.jpg?w=1920&q=80" />
    <p class="senegambia-beach-hotel">Hotel Ritaj Moroni</p>
    <div class="address-hotel2">
      <p class="kololi-banjul-gambie">Moroni Malouzini</p>
      <svg class="location-on" width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.25 8.34926C7.71406 8.34926 8.11133 8.19063 8.4418 7.87338C8.77227 7.55613 8.9375 7.17476 8.9375 6.72926C8.9375 6.28376 8.77227 5.90239 8.4418 5.58514C8.11133 5.26789 7.71406 5.10926 7.25 5.10926C6.78594 5.10926 6.38867 5.26789 6.0582 5.58514C5.72773 5.90239 5.5625 6.28376 5.5625 6.72926C5.5625 7.17476 5.72773 7.55613 6.0582 7.87338C6.38867 8.19063 6.78594 8.34926 7.25 8.34926ZM7.25 16.4492C4.98594 14.5998 3.29492 12.8819 2.17695 11.2956C1.05898 9.70938 0.5 8.24126 0.5 6.89126C0.5 4.86626 1.17852 3.25301 2.53555 2.05152C3.89258 0.850017 5.46406 0.249268 7.25 0.249268C9.03594 0.249268 10.6074 0.850017 11.9645 2.05152C13.3215 3.25301 14 4.86626 14 6.89126C14 8.24126 13.441 9.70938 12.323 11.2956C11.2051 12.8819 9.51406 14.5998 7.25 16.4492Z" fill="#23A1DB" />
      </svg>
    </div>
    <div class="frame-35">
      <p class="_20-off">20% OFF</p>
    </div>
  </div>
  <div class="offer-hotel">
    <img class="rectangle-1" src="https://www.hotelmortagne.com/img/client/chambres/selecte/hp.jpg" />
    <p class="senegambia-beach-hotel">Senegambia Beach Hotel</p>
    <div class="address-hotel2">
      <p class="kololi-banjul-gambie">Kololi, Banjul, Gambie</p>
      <svg class="location-on2" width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.25 8.34926C7.71406 8.34926 8.11133 8.19063 8.4418 7.87338C8.77227 7.55613 8.9375 7.17476 8.9375 6.72926C8.9375 6.28376 8.77227 5.90239 8.4418 5.58514C8.11133 5.26789 7.71406 5.10926 7.25 5.10926C6.78594 5.10926 6.38867 5.26789 6.0582 5.58514C5.72773 5.90239 5.5625 6.28376 5.5625 6.72926C5.5625 7.17476 5.72773 7.55613 6.0582 7.87338C6.38867 8.19063 6.78594 8.34926 7.25 8.34926ZM7.25 16.4492C4.98594 14.5998 3.29492 12.8819 2.17695 11.2956C1.05898 9.70938 0.5 8.24126 0.5 6.89126C0.5 4.86626 1.17852 3.25301 2.53555 2.05152C3.89258 0.850017 5.46406 0.249268 7.25 0.249268C9.03594 0.249268 10.6074 0.850017 11.9645 2.05152C13.3215 3.25301 14 4.86626 14 6.89126C14 8.24126 13.441 9.70938 12.323 11.2956C11.2051 12.8819 9.51406 14.5998 7.25 16.4492Z" fill="#23A1DB" />
      </svg>
    </div>
    <div class="frame-35">
      <p class="_20-off">5% OFF</p>
    </div>
  </div>
  <div class="offer-hotel">
    <img class="rectangle-1" src="https://hapi.mmcreation.com/hapidam/8b7cc795-8c75-4b2c-ad95-a20e027c1777/hotel-britannique-brit-chambres.jpg?w=1200&mode=cover&coi=50%2C50" />
    <p class="senegambia-beach-hotel">LagosMarios hotel</p>
    <div class="address-hotel2">
      <p class="kololi-banjul-gambie">122 Joel Ogunnaike St</p>
      <svg class="location-on3" width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.25 8.34926C7.71406 8.34926 8.11133 8.19063 8.4418 7.87338C8.77227 7.55613 8.9375 7.17476 8.9375 6.72926C8.9375 6.28376 8.77227 5.90239 8.4418 5.58514C8.11133 5.26789 7.71406 5.10926 7.25 5.10926C6.78594 5.10926 6.38867 5.26789 6.0582 5.58514C5.72773 5.90239 5.5625 6.28376 5.5625 6.72926C5.5625 7.17476 5.72773 7.55613 6.0582 7.87338C6.38867 8.19063 6.78594 8.34926 7.25 8.34926ZM7.25 16.4492C4.98594 14.5998 3.29492 12.8819 2.17695 11.2956C1.05898 9.70938 0.5 8.24126 0.5 6.89126C0.5 4.86626 1.17852 3.25301 2.53555 2.05152C3.89258 0.850017 5.46406 0.249268 7.25 0.249268C9.03594 0.249268 10.6074 0.850017 11.9645 2.05152C13.3215 3.25301 14 4.86626 14 6.89126C14 8.24126 13.441 9.70938 12.323 11.2956C11.2051 12.8819 9.51406 14.5998 7.25 16.4492Z" fill="#23A1DB" />
      </svg>
    </div>
    <div class="frame-35">
      <p class="_20-off">15% OFF</p>
    </div>
  </div>
</div>
</div><br><br><br>

<!-- =========================================end body================================================== -->
<?php
include_once("shared/front-footer.php");
?>

</main>
<?php
include_once("shared/footer.php");
?>