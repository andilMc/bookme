<?php
include_once("shared/header.php");
?>
<div class="container-fluid p-0" style="min-height:100vh">
  <?php
  include_once("shared/top-nav.php");
  ?>

  <div class="container">
    <div class="card m-3 bg-white p-3 " style="border-radius: var(--radius-3);box-shadow: var(--shadow-2);">
      <h3 class="title pb-2"><?= $car["make"] ?> - <?= $car["model"] ?></h3>
      <div class="row">
        <div class="col-md-6">
          <div style="
          height:250px;
          overflow:hidden;
          border-radius: var(--radius-3);
          scroll-snap-type: y mandatory;">
            <?php foreach ($car["imgs"] as $img) : ?>
              <img id="<?= $img ?>" src="<?= $img ?>" style="width:100%;height:100%;object-fit: cover;">
            <?php endforeach ?>
          </div>
          <div class="mt-3 d-flex gap-2">
            <?php foreach ($car["imgs"] as $img) : ?>
              <a href="#<?= $img ?>">
                <img src="<?= $img ?>" style="width:50px;height:50px;object-fit: cover;border-radius: var(--radius-2);">
              </a>
            <?php endforeach ?>
          </div>
          <h6 class=" title mt-3">
            Rent Info
          </h6>
          <hr>
          <table class="table w-100 border rounded-5 overflow-hidden ">
            <tr>
              <th scope="row">Price per day</th>
              <td>$<?= ucfirst($car["price_per_day"]) ?></td>
            </tr>
            <tr>
              <th scope="row">Price with driver</th>
              <td>$<?= ($rentData["driver"] === "on") ? $car["driverPrice"] : 0; ?></td>
            </tr>
            <tr>
              <th scope="row">Duration</th>
              <td><?= ($rentData["duration"] > 1) ? $rentData['duration'] . " Days" : $rentData['duration'] . "Day" ?>
              </td>
            </tr>

            <tr>
              <th scope="row">Pick up date</th>
              <td><?= ucfirst($rentData["deliveryTime"]) ?></td>
            </tr>
            <tr>
              <th scope="row">Return date</th>
              <td><?= ucfirst($rentData["returnDate"]) ?></td>
            </tr>
            <tr>
              <th scope="row">Totale Price</th>
              <td>$ <?= $rentData["totale_price"] ?></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <h6 class="title">
            Customer
          </h6>
          <hr>
          <table class="table w-100 border rounded-5 overflow-hidden ">
            <tr>
              <th scope="row">Name</th>
              <td><?= ucfirst($rentData["name"]) ?></td>
            </tr>
            <tr>
              <th scope="row">Address</th>
              <td><?= ucfirst($rentData["address"]) ?></td>
            </tr>
          </table>
          <h6 class="title">
            Car information
          </h6>
          <hr>
          <table class="table w-100 border rounded-5 overflow-hidden ">
            <tr>
              <th scope="row">Brand</th>
              <td><?= ucfirst($car["make"]) ?></td>
            </tr>
            <tr>
              <th scope="row">Model</th>
              <td><?= ucfirst($car["model"]) ?></td>
            </tr>
            <tr>
              <th scope="row">License Plate</th>
              <td><?= ucfirst($car["license_plate"]) ?></td>
            </tr>
            <tr>
              <th scope="row">Car type</th>
              <td><?= ucfirst($car["typeCar"]) ?></td>
            </tr>

          </table>
          <h6 class="title">Mode of payment</h6>
          <hr>
          <p class="alert alert-info d-flex align-items-center">
            <span class="material-symbols-outlined me-3">info</span> Choose the mode of payment you need
          </p>
          <div class="row mt-3">
            <div class="col-md-12">
              <a href="#m=m-cash" onclick="document.querySelector('#m-cash').showModal()" class="btn btn-lg btn-blue w-100 shadow-none">
                Continue to Checkout
              </a>
              <dialog id="m-cash" class="w-50">
                <form id="py-form" method="post" action="<?= base_url ?>/confirmbook" class="card-payment p-3">
                  <div class="d-flex p-2">
                    <a href="#" class="btn btn-outline-secondary btn-sm  d-flex align-items-center justify-content-center" close-modal="m-cash">
                      <span class="material-symbols-outlined">close</span>
                    </a>
                  </div>
                  <div class="card-payment-title d-flex justify-content-between">
                    <h2>Payment</h2>
                    <div class="d-flex gap-2">
                      <img src="<?= base_url ?>/img/visa.png" class="rounded border p-2" width="80">
                      <img src="<?= base_url ?>/img/mastercard.png" class="rounded border p-2" width="80">
                      <img src="<?= base_url ?>/img/amex.png" class="rounded border p-2" width="80">
                      <img src="<?= base_url ?>/img/discover.png" class="rounded border p-2" width="80">
                    </div>
                  </div>
                  <div class="card-payment-body">
                    <div class="row">
                      <div class="col-md-6 gap-0 p-2 d-flex flex-column gap-2">
                        <div class="title d-flex align-items-center gap-2 mb-3">
                          <div class="num">1</div>
                          <h4 class="m-0">Billing Info</h4>
                        </div>
                        <div class="input-search">
                          <label for="name" class="material-symbols-outlined">attach_money</label>
                          <input id="name" disabled class="flying-form" type="text" value="<?= ucfirst($rentData["totale_price"]) ?> (USD)" placeholder="Full Name">
                        </div>
                        <div class="input-search">
                          <label for="address" class="material-symbols-outlined">pin_drop</label>
                          <input id="address" name="clientAddress" class="flying-form" value="<?= ucfirst($rentData["address"]) ?>" type="text" placeholder="Billing Address">
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="input-search">
                              <label for="city"><b>City</b></label>
                              <input id="city" name="clientCity" class="flying-form" type="text" placeholder="City">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="input-search">
                              <label for="state"><b>State</b></label>
                              <input id="state" name="clientState" class="flying-form" type="text" placeholder="State">
                            </div>
                          </div>
                        </div>
                        <div class="input-search">
                          <label for="zip"><b>Zip</b></label>
                          <input id="zip" name="clientZip" class="flying-form" type="text" placeholder="Zip">
                        </div>
                      </div>
                      <!-- ============Shipping=============== -->
                      <div class="col-md-6 p-2 d-flex flex-column gap-2 ">
                        <div class="title d-flex align-items-center  gap-2 mb-3">
                          <div class="num">2</div>
                          <h4 class="m-0">Credit Card Info</h4>
                        </div>
                        <div class="input-search">
                          <label for="name" class="material-symbols-outlined">badge</label>
                          <input id="name" name="cardHolderName" value="<?= ucfirst($rentData["name"]) ?>" class="flying-form" type="text" placeholder="Card Holder Name">
                        </div>
                        <div class="input-search">
                          <label for="credit-card" class="material-symbols-outlined">credit_card</label>
                          <input id="credit-card" name="cardNumber" class="flying-form cc-number" type="tel" maxlength="19" placeholder="1234-5678-9012-3456">
                        </div>
                        <div class="input-search ">
                          <label for="exp"><b>Exp.</b></label>
                          <input id="exp" name="exp" class="flying-form cc-expires" type="tel" maxlength="7" placeholder="MM/YY">
                        </div>
                        <div class="input-search">
                          <label for="cvc"><b>CVC</b></label>
                          <input id="cvc" name="cvc" class="flying-form cc-cvc" type="tel" pattern="\d*" maxlength="4" placeholder="468">
                        </div>
                        <input type="text" hidden name="cfCar" value="<?= $rentData["idRent"] ?>">

                        <button type="submit" class="btn btn-blue w-100 mt-3 rounded-pill ">Proceed</button>
                      </div>
                    </div>
                  </div>
                </form>
                <!-- <div class="p-3">
                  <a href="<?= base_url ?>/confirmbook?cfCar=<?= $rentData["idRent"] ?>" class="btn btn-blue" style="width: 150px;">Confirm</a>
                </div> -->
              </dialog>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
  include_once("shared/front-footer.php");
  ?>

</div>
<?php
include_once("shared/footer.php");

?>