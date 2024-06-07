<?php
include_once("shared/header.php");
include_once("shared/nav-front.php");
?>

<main>
    <section class="sect">
        <div class="over-view p-5 ">
            <h1 class="wellcom-text">Explore the whole world and enjoy its beauty </h1>
            <video class="h-video" src="<?= base_url ?>/video/trip.mp4"></video>

        </div>
    </section>
    <div class="tab-menu-search">
        <?php
        include_once("shared/tab-flight.php")
        ?>
    </div>
    <section class="sect ps-5 pe-5 pb-5 ">

        <div id="liste-offres" class="d-flex flex-column gap-3 w-100 align-items-center ">

        </div>

    </section>
    <?php
    include_once("shared/front-footer.php");
    ?>

</main>
<?php
include_once("shared/footer.php");
?>