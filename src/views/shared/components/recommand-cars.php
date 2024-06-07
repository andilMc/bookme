
<div class="row">
    <?php if (!empty($data)) : ?>
        <?php foreach ($data as $car) : ?>
            <div class="col-md-4">
                <a href="<?=base_url?>/dtlcr/<?= $car["car"]->getCodeCar() ?>">
                    <div class="position-relative overflow-hidden" style="border-radius: 10px;height:230px;">
                        <img class="" style="width:100%; height: 100%;object-fit: cover;" src="<?= base_url ?>/<?= $car["img"]["pathImg"] ?>" />
                        <div class="position-absolute bottom-0 start-0 end-0 p-3 d-flex justify-content-between align-items-center" style="background-color:#4b749d99;height: 90px; color:white">
                            <div>
                                <p class="m-0"><b><?= $car["car"]->getMake() ?> <?= $car["car"]->getModel() ?></b></p>
                                <span><?= $car["car"]->getTypeCar() ?></span>
                            </div>
                            <span>$ <?= $car["car"]->getPrice_per_day() ?></span>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>