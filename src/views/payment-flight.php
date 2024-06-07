<?php

include_once "shared/header.php" ?>
<main class="w-100">
  <?php include_once "shared/top-nav.php";
  ?>
  <div class="container pt-5">
    <form id="py-form" method="post" action="<?= base_url ?>/confirmbookFlight" class="card-payment p-3">
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
              <input id="price" disabled class="flying-form" type="text" value="<?= $offre->price->total ?>" placeholder="total price">
              <span><?= $offre->price->currency ?> </span>
            </div>
            <div class="input-search">
              <label for="address" class="material-symbols-outlined">pin_drop</label>
              <input id="address" name="clientAddress" class="flying-form" value="" type="text" placeholder="Billing Address">
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
            <?php
            // dump($authUser);
            ?>
            <div class="input-search">
              <label for="name" class="material-symbols-outlined">badge</label>
              <input id="name" name="cardHolderName" value="<?= $authUser["fullName"] ?>" class="flying-form" type="text" placeholder="Card Holder Name">
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
            <input type="text" hidden name="cfCar" value="">

            <button type="submit" class="btn btn-blue w-100 mt-3 rounded-pill ">Proceed</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</main>
<?php include_once "shared/footer.php" ?>