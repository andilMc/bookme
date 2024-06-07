<?php
include_once(__DIR__ . "/../shared/header.php");
include_once(__DIR__ . "/../shared/admin-nav-front.php");
?>
<main class="admin-container">
    <div class="admin-header">
        <a href="#" class="admin-profile-link">
            <div class="admin-profile">
                <img src="https://images.pexels.com/photos/3781543/pexels-photo-3781543.jpeg?auto=compress&cs=tinysrgb&w=600" class="admin-profile-img" alt="">
            </div>
        </a>
    </div>
    <div class="container ps-3 pe-5">
        <h1 class="admin-title-page ms-4">
            Booking
        </h1>
        <div class="row flex-wrap mt-3 ">
            <div class="col-md-12 mt-3">
                <div class="card w-100" id="bloc">
                    <div class="card-body">
                        <div class="headsearch">
                            <div class="search-wrapper">
                                <span class="material-symbols-outlined" id="iconSearch">search</span>
                                <input class="searchCar" type="text" placeholder="Reservation number">
                            </div>
                        </div>
                        <p class="day">Today</p>
                        <hr>
                        <?php
                            // dump($data);

                        // foreach ($data as $item) {
                        //     $brand=$item['car']->getMake();
                        //     dump($brand);
                        // }
                        ?>
                        <div class="row frame-37">
                            <div class="col">
                                <img class="image-2" src="https://hips.hearstapps.com/hmg-prod/images/2025-toyota-camry-xse-011-6552832c62d7d.jpg?crop=0.257xw:0.427xh;0.453xw,0.398xh&resize=768:*" />
                            </div>
                            <div class="col information">
                                <div class="honda">Honda</div>
                                <div class="res-number-cr-124">
                                    <span>
                                        <span class="res-number-cr-124-span">Res number:</span>
                                        <span class="res-number-cr-124-span2">CR124</span>
                                    </span>
                                </div>
                                <div class="customer-name-raihane">
                                    <span>
                                        <span class="customer-name-raihane-span">Customer name:</span>
                                        <span class="customer-name-raihane-span2">Raihane</span>
                                    </span>
                                </div>
                                <div class="reserved-from-02-03-2024-to-03-03-2024">
                                    <span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span">
                                            Reserved from:
                                        </span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span2">
                                            02/03/2024
                                        </span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span3">to</span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span4">
                                            03/03/2024
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col">
                                <p class="status">Status: <span class="text-dark p-6 ps-2 pe-2 fs-6 rounded-pill bg-warning">On going</span></p>
                            </div>
                            <div class="col d-flex justify-content-center align-items-center">
                                <a class="btn rounded-pill w-50 btn-color" href="<?= base_url ?>/admin/booking/detail">Detail</a>
                            </div>
                        </div>
                        <p class="day">Yesteday</p>
                        <hr>
                        <div class="row frame-37">
                            <div class="col">
                                <img class="image-2" src="https://m.atcdn.co.uk/a/media/w600/8dec5681ef09467ca30f35d8daca6ec4.jpg" />
                            </div>
                            <div class="col information">
                                <div class="honda">Honda</div>
                                <div class="res-number-cr-124">
                                    <span>
                                        <span class="res-number-cr-124-span">Res number:</span>
                                        <span class="res-number-cr-124-span2">CR124</span>
                                    </span>
                                </div>
                                <div class="customer-name-raihane">
                                    <span>
                                        <span class="customer-name-raihane-span">Customer name:</span>
                                        <span class="customer-name-raihane-span2">Raihane</span>
                                    </span>
                                </div>
                                <div class="reserved-from-02-03-2024-to-03-03-2024">
                                    <span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span">
                                            Reserved from:
                                        </span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span2">
                                            02/03/2024
                                        </span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span3">to</span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span4">
                                            03/03/2024
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col">
                                <p class="status">Status: <span class="text-dark p-6 ps-2 pe-2 fs-6 rounded-pill bg-warning">On going</span></p>
                            </div>
                            <div class="col d-flex justify-content-center align-items-center">
                                <a class="btn rounded-pill w-50 btn-color" href="<?= base_url ?>/admin/booking/detail">Detail</a>
                            </div>
                        </div>
                        <p class="day">Before two days</p>
                        <hr>
                        <div class="row frame-37">
                            <div class="col">
                                <img class="image-2" src="https://spn-sta.spinny.com/blog/20221004191046/Hyundai-Venue-2022.jpg?compress=true&quality=80&w=1200&dpr=2.6" />
                            </div>
                            <div class="col information">
                                <div class="honda">Honda</div>
                                <div class="res-number-cr-124">
                                    <span>
                                        <span class="res-number-cr-124-span">Res number:</span>
                                        <span class="res-number-cr-124-span2">CR124</span>
                                    </span>
                                </div>
                                <div class="customer-name-raihane">
                                    <span>
                                        <span class="customer-name-raihane-span">Customer name:</span>
                                        <span class="customer-name-raihane-span2">Raihane</span>
                                    </span>
                                </div>
                                <div class="reserved-from-02-03-2024-to-03-03-2024">
                                    <span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span">
                                            Reserved from:
                                        </span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span2">
                                            02/03/2024
                                        </span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span3">to</span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span4">
                                            03/03/2024
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col">
                                <p class="status">Status: <span class="text-dark p-6 ps-2 pe-2 fs-6 rounded-pill bg-warning">On going</span></p>
                            </div>
                            <div class="col d-flex justify-content-center align-items-center">
                                <a class="btn rounded-pill w-50 btn-color" href="<?= base_url ?>/admin/booking/detail">Detail</a>
                            </div>
                        </div>
                        <div class="row frame-37">
                            <div class="col">
                                <img class="image-2" src="https://www.drivencarguide.co.nz/media/j23pbafs/byd-seal-performance-004.jpg?width=1028&quality=85&rnd=133474486534530000" />
                            </div>
                            <div class="col information">
                                <div class="honda">Honda</div>
                                <div class="res-number-cr-124">
                                    <span>
                                        <span class="res-number-cr-124-span">Res number:</span>
                                        <span class="res-number-cr-124-span2">CR124</span>
                                    </span>
                                </div>
                                <div class="customer-name-raihane">
                                    <span>
                                        <span class="customer-name-raihane-span">Customer name:</span>
                                        <span class="customer-name-raihane-span2">Raihane</span>
                                    </span>
                                </div>
                                <div class="reserved-from-02-03-2024-to-03-03-2024">
                                    <span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span">
                                            Reserved from:
                                        </span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span2">
                                            02/03/2024
                                        </span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span3">to</span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span4">
                                            03/03/2024
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col">
                                <p class="status">Status: <span class="text-dark p-6 ps-2 pe-2 fs-6 rounded-pill bg-warning">On going</span></p>
                            </div>
                            <div class="col d-flex justify-content-center align-items-center">
                                <a class="btn rounded-pill w-50 btn-color" href="<?= base_url ?>/admin/booking/detail">Detail</a>
                            </div>
                        </div>
                        <div class="row frame-37">
                            <div class="col">
                                <img class="image-2" src="https://wp-asset.groww.in/wp-content/uploads/2016/08/18124009/2015_BMW_i8_20039281571_2-1.jpg" />
                            </div>
                            <div class="col information">
                                <div class="honda">Honda</div>
                                <div class="res-number-cr-124">
                                    <span>
                                        <span class="res-number-cr-124-span">Res number:</span>
                                        <span class="res-number-cr-124-span2">CR124</span>
                                    </span>
                                </div>
                                <div class="customer-name-raihane">
                                    <span>
                                        <span class="customer-name-raihane-span">Customer name:</span>
                                        <span class="customer-name-raihane-span2">Raihane</span>
                                    </span>
                                </div>
                                <div class="reserved-from-02-03-2024-to-03-03-2024">
                                    <span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span">
                                            Reserved from:
                                        </span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span2">
                                            02/03/2024
                                        </span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span3">to</span>
                                        <span class="reserved-from-02-03-2024-to-03-03-2024-span4">
                                            03/03/2024
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col">
                                <p class="status">Status: <span class="text-dark p-6 ps-2 pe-2 fs-6 rounded-pill bg-warning">On going</span></p>
                            </div>
                            <div class="col d-flex justify-content-center align-items-center">
                                <a class="btn rounded-pill w-50 btn-color" href="<?= base_url ?>/admin/booking/detail">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
</main>
<?php
include_once(__DIR__ . "/../shared/footer.php");
?>