<?php

use src\controllers\Utils;

include_once("shared/header.php");
include_once("shared/nav-front.php");
?>
<main>
    <section class="sect">
        <div class="over-view">
            <h1 class="wellcom-text"> Welcome to Bookme </h1>
            <img src="https://images.pexels.com/photos/3426874/pexels-photo-3426874.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
        </div>
        <?php
        include_once("shared/div-research.php")
        ?>
    </section>
    <section class="sect spacer-section">

            <div class="title-section">
                <h1 class="title text-center">Find Your Ideal Offer</h1>
                <p class="text-center">Let's enjoy this heaven on earth</p>
            </div>
        <div class="row">
            <?php
            foreach ($data as $item) {
                $price = $item['room']->getPrice();
                $name = $item['hotel']->getHotelName();
                $code = $item['hotel']->getCodeHotel();
                $localisation = $item['hotel']->getCountry();
                $img = $item['img'][0]->getPathImg();
            ?>
                <div class="col-md-4">
                    <a id="blockSeeSameHotel" href="<?= base_url ?>/htl/<?= $code ?>">
                        <div class="d-flex flex-column gap-2">
                            <img class="img" src="<?php echo $img; ?>" />
                            <div class="d-flex justify-content-between">
                                <p class="name m-0"><?php echo $name; ?></p>
                                <p class="price m-0"><?php echo "$" . $price; ?></p>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <svg class="" width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.145 8.99997C7.63622 8.99997 8.05673 8.82548 8.40654 8.4765C8.75635 8.12753 8.93125 7.70802 8.93125 7.21797C8.93125 6.72792 8.75635 6.3084 8.40654 5.95943C8.05673 5.61045 7.63622 5.43597 7.145 5.43597C6.65378 5.43597 6.23327 5.61045 5.88346 5.95943C5.53365 6.3084 5.35875 6.72792 5.35875 7.21797C5.35875 7.70802 5.53365 8.12753 5.88346 8.4765C6.23327 8.82548 6.65378 8.99997 7.145 8.99997ZM7.145 17.91C4.74845 15.8755 2.95848 13.9859 1.77509 12.241C0.591695 10.4961 0 8.88117 0 7.39617C0 5.16867 0.718221 3.39409 2.15466 2.07244C3.59111 0.750791 5.25455 0.0899658 7.145 0.0899658C9.03545 0.0899658 10.6989 0.750791 12.1353 2.07244C13.5718 3.39409 14.29 5.16867 14.29 7.39617C14.29 8.88117 13.6983 10.4961 12.5149 12.241C11.3315 13.9859 9.54155 15.8755 7.145 17.91Z" fill="#23A1DB" />
                                </svg>
                                <p class="address2 p-0 m-0"><?php echo $localisation; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </section>

    <section class="sect spacer-section">
        <div class="d-flex flex-column justify-content-center align-items-center m-4 mt-5">
            <h1 class="title text-center w-100">Find Your Ideal Offer</h1>
            <p class="text-center">
                Save smart, drive in style: Unbeatable offers for every kilometer you drive.
            </p>
        </div>
        <div class="pe-3 ps-3" hx-get="<?= base_url ?>/recommand-cars" hx-trigger="load" hx-indicator="#indicator" hx-vals='{"usr": "<?= (Utils::isLogin()) ? $authUser["codeUser"] : ""; ?>"}'>
            <img id="indicator" class="mx-auto" src="<?= base_url ?>/img/loading.gif" alt="loader" width="200">

        </div>
        <hr>
        <div class="conentent">
            <div class="left">
                <div class="paragraf-list mt-space">
                    <span class="pin-number bg-gray">01</span>
                    <h5 class="title mt-2">Luxury Vehicles</h5>
                    <p>We have cars that offer a high level of comfort, performance and advanced technology. They are equipped with top-of-the-range features such as leather interiors, state-of-the-art entertainment systems, a quiet ride and high-quality finish.</p>
                </div>

                <div class="paragraf-list mt-space">
                    <span class="pin-number bg-blue">02</span>
                    <h5 class="title mt-2">Off-road vehicles</h5>
                    <p>our services include vehicles designed for use in rugged terrain, and which are highly resistant to outdoor activities and adventures.</p>
                </div>

                <div class="paragraf-list mt-space">
                    <span class="pin-number bg-green">03</span>
                    <h5 class="title mt-2">Economy vehicles</h5>
                    <p>we have an economy vehicle service that allows all customers to rent a car. These services are very affordable for customers and consume less fuel.</p>
                </div>
                <div class="action-car mt-space">
                    <a href="<?= base_url ?>/car" class="btn-self btn-blue btn-normal-size"> Book now</a>
                </div>
            </div>
            <div class="right">
                <img class="car" src="https://images.pexels.com/photos/5381501/pexels-photo-5381501.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
                <div class="avis position-tpo-left">
                    <img class="img-profile" src="https://images.pexels.com/photos/1081685/pexels-photo-1081685.jpeg?auto=compress&cs=tinysrgb&w=600" />
                    <div class="info-avis">
                        <p class="name">Nasma Youssouf</p>
                        <div class="moyen">
                            <svg class="star" width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.18624 0.832474L6.08444 5.09402L1.38194 5.7796C0.53864 5.90191 0.200677 6.94154 0.812228 7.537L4.21438 10.8522L3.40971 15.5354C3.26487 16.382 4.15644 17.016 4.90318 16.6201L9.11 14.4089L13.3168 16.6201C14.0636 17.0128 14.9551 16.382 14.8103 15.5354L14.0056 10.8522L17.4078 7.537C18.0193 6.94154 17.6814 5.90191 16.8381 5.7796L12.1356 5.09402L10.0338 0.832474C9.65718 0.0728642 8.56604 0.0632082 8.18624 0.832474Z" fill="#FFD600" />
                            </svg>

                            <span class="count"> 4.5 </span>
                        </div>
                    </div>
                </div>
                <div class="avis position-tpo-right">
                    <img class="img-profile" src="https://images.pexels.com/photos/1081685/pexels-photo-1081685.jpeg?auto=compress&cs=tinysrgb&w=600" />
                    <div class="info-avis">
                        <p class="name">Nasma Youssouf</p>
                        <div class="moyen">
                            <svg class="star" width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.18624 0.832474L6.08444 5.09402L1.38194 5.7796C0.53864 5.90191 0.200677 6.94154 0.812228 7.537L4.21438 10.8522L3.40971 15.5354C3.26487 16.382 4.15644 17.016 4.90318 16.6201L9.11 14.4089L13.3168 16.6201C14.0636 17.0128 14.9551 16.382 14.8103 15.5354L14.0056 10.8522L17.4078 7.537C18.0193 6.94154 17.6814 5.90191 16.8381 5.7796L12.1356 5.09402L10.0338 0.832474C9.65718 0.0728642 8.56604 0.0632082 8.18624 0.832474Z" fill="#FFD600" />
                            </svg>

                            <span class="count"> 4.5 </span>
                        </div>
                    </div>
                </div>
                <div class="avis position-bottom-center">
                    <img class="img-profile" src="https://images.pexels.com/photos/1081685/pexels-photo-1081685.jpeg?auto=compress&cs=tinysrgb&w=600" />
                    <div class="info-avis">
                        <p class="name">Nasma Youssouf</p>
                        <div class="moyen">
                            <svg class="star" width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.18624 0.832474L6.08444 5.09402L1.38194 5.7796C0.53864 5.90191 0.200677 6.94154 0.812228 7.537L4.21438 10.8522L3.40971 15.5354C3.26487 16.382 4.15644 17.016 4.90318 16.6201L9.11 14.4089L13.3168 16.6201C14.0636 17.0128 14.9551 16.382 14.8103 15.5354L14.0056 10.8522L17.4078 7.537C18.0193 6.94154 17.6814 5.90191 16.8381 5.7796L12.1356 5.09402L10.0338 0.832474C9.65718 0.0728642 8.56604 0.0632082 8.18624 0.832474Z" fill="#FFD600" />
                            </svg>

                            <span class="count"> 4.5 </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php
    include_once("shared/front-footer.php");
    ?>
</main>
<?php
include_once("shared/footer.php");
?>