<?php

use src\controllers\Utils;

?>
<nav id="menu">
    <ul id="menu-list" class="mt-5">
        <li id="logo">
            <img src="<?= base_url ?>/img/complet logo.svg" width="100" margin-top="-30px">
        </li>
        <li>
            <a class="menu-item-btn justify-content-md-center justify-content-lg-start  " href="<?= base_url ?>/dashboard/">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="d-sm-none d-lg-block">Dashboard</span>
            </a>
        </li>
        <?php if (Utils::isAdmin()) : ?>
            <li>
                <a class="menu-item-btn justify-content-md-center justify-content-lg-start  " href="<?= base_url ?>/dashboard/srvce-q">
                    <span class="material-symbols-outlined">move_to_inbox</span>
                    <span class="d-sm-none d-lg-block">Service Requests</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if (Utils::isCarRentalAgent()) : ?>
            <li>
                <a class="menu-item-btn" href="<?= base_url ?>/dashboard/car">
                    <span class="material-symbols-outlined">directions_car</span>
                    <span class="d-sm-none d-lg-block">My Cars</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if (Utils::isHotelMnger()) : ?>
            <li>
                <!-- <a class="menu-item-btn" href="<?= base_url ?>/dashboard/newoffer"> -->
                <a class="menu-item-btn" href="<?= base_url ?>/dashboard/hotel">
                    <span class="material-symbols-outlined">domain</span>
                    <span class="d-sm-none d-lg-block">My Hotels</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if (Utils::isCarRentalAgent()) : ?>
            <li>

                <a class="menu-item-btn " href="<?= base_url ?>/dashboard/bookingsCars">
                    <span class="material-symbols-outlined">car_rental</span>
                    <span class="d-sm-none d-lg-block">Renting Car</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if (Utils::isHotelMnger()) : ?>
            <li>
                <a class="menu-item-btn " href="<?= base_url ?>/dashboard/bookingHotel">
                    <span class="material-symbols-outlined">apartment</span>
                    <span class="d-sm-none d-lg-block">Booking Hotel</span>
                </a>
            </li>
        <?php endif; ?>
        <li>
            <?php if (Utils::isAdmin()) : ?>
                <a class="menu-item-btn" href="<?= base_url ?>/dashboard">
                    <span class="material-symbols-outlined">travel</span>
                    <span class="d-sm-none d-lg-block">Fligh Reservation</span>
                </a>
            <?php endif; ?>
        </li>

        <li>
            <a class="menu-item-btn" href="<?= base_url ?>/dashboard/customer">
                <span class="material-symbols-outlined">support_agent</span>
                <span class="d-sm-none d-lg-block">Customer</span>
            </a>
        </li>
        <?php if (Utils::isAdmin()) : ?>
            <li>
                <a class="menu-item-btn" href="<?= base_url ?>/dashboard/customer">
                    <span class="material-symbols-outlined">forum</span>
                    <span class="d-sm-none d-lg-block">Message</span>
                </a>
            </li>
        <?php endif; ?>
            <hr class="line_GoToHome">
        <li>
            <a class="menu-item-btn" href="<?= base_url ?>/" id="addservice">
                <span class="material-symbols-outlined">
                    home
                </span>
                <span class="d-sm-none d-lg-block">Go to home</span>
            </a>
        </li>
        <!--<li>
            <a class="menu-item-btn" href="<?= base_url ?>/dashboard/addVehicle" id="addservice">
                <span class="material-symbols-outlined">post_add</span>
                <span class="d-sm-none d-lg-block">Add vehicle</span>
            </a>
        </li> -->
    </ul>
</nav>