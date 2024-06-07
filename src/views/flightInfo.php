<?php

use src\controllers\api\FlightApi;

include_once "shared/header.php" ?>
<main class="w-100">
    <?php include_once "shared/top-nav.php";
    $f = new FlightApi();
    $adult = 0;
    $child = 0;
    $infant = 0;
    $carrierCode = [];
    $stops = count($offre->itineraries[0]->segments);
    $stopDuration = new DateTime(date(""));

    $airportDep = $f->airportLocal(reset($offre->itineraries[0]->segments)->departure->iataCode)[0];
    $airportArr = $f->airportLocal(end($offre->itineraries[0]->segments)->arrival->iataCode)[0];
    $depDate = $offre->itineraries[0]->segments[0]->departure->at;
    $arriveDate = $offre->itineraries[0]->segments[0]->arrival->at;
    $depD = new DateTime($depDate);
    $arrD = new DateTime($arriveDate);
    foreach ($offre->itineraries as $itinerary) {
        foreach ($itinerary->segments as $segment) {
            if (!in_array($segment->carrierCode, $carrierCode)) {
                $carrierCode[] = $segment->carrierCode;
                $d = new DateInterval($segment->duration);
                $stopDuration = $stopDuration->add($d);
            }
        }
    }
    // dump($offre);
    // dump($airportDep);
    // dump($airportArr);
    foreach ($offre->travelerPricings as $traveller) {
        if ($traveller->travelerType == "ADULT") {
            $adult++;
        } elseif ($traveller->travelerType == "CHILD") {
            $child++;
        } elseif ($traveller->travelerType == "INFANT") {
            $infant++;
        }
    }
    ?>
    <div class="container ">
        <form action="<?=base_url?>/order" method="post">
            <textarea hidden name="offre" ><?= json_encode($offre)?></textarea>
            <div class="d-flex dlex-nowrap p-5 justify-content-center gap-3">
                <div class="flex-grow-1 ">
                    <div class="d-flex flex-nowrap gap-3">
                        <div class="carriers">
                            <?php
                            foreach ($carrierCode as $code) {
                            ?>
                                <img src="//fastui.cltpstatic.com/image/upload/resources/images/logos/air-logos/svg_logos/<?= $code ?>.svg" style="width:50px; height: 50px;">
                            <?php
                            }
                            ?>
                        </div>
                        <div>
                            <h5 class="d-flex flex-nowrap align-items-center m-0">
                                <span><?= $airportDep["address"]->cityName ?></span>
                                <span class="material-symbols-outlined">trending_flat</span>
                                <span><?= $airportArr["address"]->cityName ?></span>
                            </h5>
                            <span>
                                <?php

                                ?>
                                <?= ucfirst($depD->format("l")) ?>, <?= ucfirst($depD->format("j")) ?> <?= ucfirst($depD->format("F")) ?>
                            </span>
                        </div>

                        <div>
                            <h5 class="d-flex flex-nowrap align-items-center m-0">
                                <span><?= ($depD->format("H")) ?>h : <?= ($depD->format("i")) ?>m </span>
                                <span>&nbsp;-&nbsp</span>
                                <span><?= ($arrD->format("H")) ?>h : <?= ($arrD->format("i")) ?>m </span>
                            </h5>
                            <span>
                                <?= $stopDuration->format("H") ?>h<?= $stopDuration->format("i") ?>m . <?= $stops ?> Stop(s)
                            </span>
                        </div>
                    </div>
                    <?php
                    for ($i = 0; $i < $adult; $i++) {
                        $j = $i;
                    ?>
                        <hr>
                        <h4>Adult <?= $j + 1 ?></h4>
                        <div class="row">
                            <div class="col-md-12 row">
                                <span class="col-md-12 mb-2">Traveller name and gender</span>
                                <div class="col-md-5">
                                    <div class="input-search ">
                                        <input name="person[<?=$i?>][fname]" class="flying-form" placeholder="First name" value="" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-search ">
                                        <input name="person[<?=$i?>][lname]" class="flying-form" placeholder="Last name" value="" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-search ">
                                        <select name="person[<?=$i?>][gender]" class="flying-form">
                                            <option value="" selected disabled> Gender</option>
                                            <option value="Male"> Male</option>
                                            <option value="Female"> Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row mt-3">
                                <span class="col-md-12 mb-2">Date of birth</span>
                                <div class="col-md-4">
                                    <div class="input-search ">
                                        <select name="person[<?=$i?>][day]" class="flying-form">
                                            <option value="" selected disabled> DD</option>
                                            <?php
                                            for ($d = 1; $d <= 31; $d++) {
                                            ?>
                                                <option value="<?= $d ?>"> <?= $d ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-search ">
                                        <select name="person[<?=$i?>][month]" class="flying-form">
                                            <option value="" selected disabled> MM</option>
                                            <?php
                                            for ($m = 1; $m <= 12; $m++) {
                                            ?>
                                                <option value="<?= $m ?>"> <?= $m ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-search ">

                                        <select name="person[<?=$i?>][year]" class="flying-form">
                                            <option value="" selected disabled> YYYY</option>
                                            <?php
                                            for ($y = 1900; $y <= date("Y"); $y++) {
                                            ?>
                                                <option value="<?= $y ?>"> <?= $y ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row mt-3">
                                <span class="col-md-12 mb-2">Passport Number and Nationality</span>
                                <div class="col-md-6">
                                    <div class="input-search ">
                                        <input name="person[<?=$i?>][pnum]" class="flying-form" placeholder="Passport Number" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-search ">
                                        <select name="person[<?=$i?>][country]" class="country flying-form" country-data></select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row mt-3">
                                <span class="col-md-12 mb-2">Issued Country and Expiry Date</span>
                                <div class="col-md-6">
                                    <div class="input-search ">
                                        <select name="person[<?=$i?>][countryIssue]" class="country flying-form" country-data></select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-search ">
                                        <select name="person[<?=$i?>][dayExp]" class="flying-form">
                                            <option value="" selected disabled> DD</option>
                                            <?php
                                            for ($d = 1; $d <= 31; $d++) {
                                            ?>
                                                <option value="<?= $d ?>"> <?= $d ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-search ">
                                        <select name="person[<?=$i?>][monthExp]" class="flying-form">
                                            <option value="" selected disabled> MM</option>
                                            <?php
                                            for ($m = 1; $m <= 12; $m++) {
                                            ?>
                                                <option value="<?= $m ?>"> <?= $m ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-search ">

                                        <select name="person[<?=$i?>][yearExp]" class="flying-form">
                                            <option value="" selected disabled> YYYY</option>
                                            <?php
                                            for ($y = date("Y"); $y <= (date("Y") + 30); $y++) {
                                            ?>
                                                <option value="<?= $y ?>"> <?= $y ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
                <div>
                    <div class="card overflow-auto p-3 position-sticky" style="top:20px; width:350px;">
                        <table class="border-0 w-100 rounded-0 bg-transparent">
                            <tr>
                                <td class=" bg-transparent">
                                    <p>Total price</p>
                                </td>
                                <td class=" bg-transparent">
                                    <h4><b><?= $offre->price->currency ?> <?= $offre->price->total ?></b></h4>
                                </td>
                            </tr>
                            <?php
                            if ($adult > 0) {
                            ?>
                                <tr>
                                    <td class=" bg-transparent">
                                        <p>Adults</p>
                                    </td>
                                    <td class=" bg-transparent">
                                        <p><?= $adult ?></p>
                                    </td>
                                </tr>
                            <?php
                            }

                            if ($child > 0) {
                            ?>
                                <tr>
                                    <td class=" bg-transparent">
                                        <p>Children</p>
                                    </td>
                                    <td class=" bg-transparent">
                                        <p><?= $child ?></p>
                                    </td>
                                </tr>
                            <?php
                            }

                            if ($infant > 0) {
                            ?>
                                <tr>
                                    <td class=" bg-transparent">
                                        <p>Infant</p>
                                    </td>
                                    <td class=" bg-transparent">
                                        <p><?= $infant ?></p>
                                    </td>
                                </tr>
                            <?php
                            }

                            ?>


                        </table>
                        <hr>
                        <p>Fees</p>
                        <table class="border-0 w-100 rounded-0 bg-transparent">
                            <?php foreach ($offre->price->fees as $fee) {
                            ?>
                                <tr>
                                    <td class=" bg-transparent">
                                        <p><?= $fee->type ?></p>
                                    </td>
                                    <td class=" bg-transparent">
                                        <p><?= $offre->price->currency ?> <?= $fee->amount ?></p>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </table>
                        <button type="submit" class="btn btn-blue">Continue to Payment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php include_once "shared/footer.php" ?>