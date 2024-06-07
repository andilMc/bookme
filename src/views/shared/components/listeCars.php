
<div class="row" >
    <?php
    if (!empty($data)) {
    ?>
        <?php
        foreach ($data as $item) {
            $marke = $item['car']->getMake();
            $price = $item['car']->getPrice_per_day();
            $codeCar = $item['car']->getCodeCar();
            $img = $item['img'];
        ?>
            <?php
            ?>
            <div class="col-md-4 mt-5">
                <a href="<?= base_url ?>/dtlcr/<?= $item['car']->getCodeCar() ?>" class="w-100 room" >
                    <div class="imghotel">
                        <img class="img" src="<?php echo $img ?>" />
                    </div>
                    <div class="content-room">
                        <p class="room-title"><?php echo $marke; ?></p>
                        <div class="row">
                            <div class="rm-desc col-6">
                                <span class="material-symbols-outlined">
                                    heat_pump
                                </span>
                                <span class="rm-desc-val">Available</span>
                            </div>
                            <div class="rm-desc col-6">
                                <span class="material-symbols-outlined">
                                    mode_fan
                                </span>
                                <span class="wifi2">Available</span>
                            </div>
                            <div class="rm-desc col-6 condition">
                                <div class="rm-desc col-12">
                                    <span class="rm-desc-val"><b>.</b> Free cancel <br><b>.</b> Identical tank <br><b>.</b> Theft protection</span>
                                </div>
                                <div class="rm-desc col-12">
                                    <span class="rm-desc-val"><b>.</b> Public liability insurance <br><b>.</b> collision insurance</span>
                                </div>
                            </div>
                        </div>

                        <div class="w-100 ">
                            <p class="text-end me-4"><b><?php echo "$" . $price . "/day" ?></b></p>
                        </div>

                        <!-- <a href="">
                  <span class="btn btn-book w-100">
                    See the offer
                  </span>
                </a> -->
                        <!-- <a href=""> -->
                        <span class="btn btn-book w-100">
                            See the offer
                        </span>
                        <!-- </a> -->
                    </div>
                </a>
            </div>
        <?php
        }
        ?>
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
    <?php
    }
    ?>
</div>