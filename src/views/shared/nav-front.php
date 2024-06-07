<nav id="menu">
    <ul id="menu-list">
        <li id="logo">
            <img src="<?= base_url ?>/img/complet logo.svg" width="150">
        </li>
        <li class="menu-item">
            <a class="menu-item-btn" href="<?= base_url ?>">
                <span class="material-symbols-outlined">home_app_logo</span>
                <span class="menu-item-text">Home</span>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-item-btn" href="<?= base_url ?>/flight">
                <span class="material-symbols-outlined">travel</span>
                <span class="menu-item-text">Flight</span>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-item-btn" href="<?= base_url ?>/hotel">
                <span class="material-symbols-outlined">hotel</span>
                <span class="menu-item-text">Hotel</span>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-item-btn" href="<?= base_url ?>/car">
                <span class="material-symbols-outlined">car_rental</span>
                <span class="menu-item-text">Cars</span>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-item-btn" href="<?= base_url ?>/about-us">
                <span class="material-symbols-outlined">info</span>
                <span class="menu-item-text">About Us</span>
            </a>
        </li>
        <li class="menu-item border-top border-black me-4 ms-4 mt-5   " id="account-menu">
            <?php

            use src\controllers\Utils;

            if (Utils::isLogin()) : ?>
                <button 
                show-profile-menu 
                class="border-0 position-relative border-0 menu-item-btn w-100 d-flex justify-content-between align-items-center" 
                style="box-shadow: none !important;font-weight: normal !important;text-shadow: none !important;">
                    <span class="d-flex align-items-center gap-2">
          <img style="width: 25px;height:25px;object-fit: cover;" class="rounded-pill" src="<?= (!empty($authUser["imgProfile"])) ? base_url . $authUser["imgProfile"] : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>">
                        <!-- <span class="material-symbols-outlined">account_circle</span> -->
                        <span class="menu-item-text"><?= $authUser["fullName"] ?></span>
                    </span>
                    <span class="material-symbols-outlined">
                        more_vert
                    </span>
                    <dialog profile-menu class="w-100 border rounded-3 p-0 pt-2 pb-2  " style="">
                        <a href="<?=base_url?>/profile" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
                            <span class="material-symbols-outlined">person</span>
                            <span class="menu-item-text">My Account</span>
                        </a>
                        <a href="<?=base_url?>/mybookings" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
                            <span class="material-symbols-outlined">wallet</span>
                            <span class="menu-item-text">My Bookings</span>
                        </a>
                        <a href="<?= base_url ?>/dashboard" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
                            <span class="material-symbols-outlined">dashboard</span>
                            <span class="menu-item-text">Dashboard</span>
                        </a>
                        <a href="<?= base_url ?>/logout" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
                            <span class="material-symbols-outlined">logout</span>
                            <span class="menu-item-text">Logout</span>
                        </a>
                    </dialog>
                </button>
            <?php else : ?>
                <a class="btn btn-outline-blue w-100 " href="<?= base_url ?>/login">
                    <span class="menu-item-text">Sign In</span>
                </a>
                <a class="btn btn-blue w-100 " href="<?= base_url ?>/logup">
                    <span class="menu-item-text">Sign Up</span>
                </a>
            <?php endif; ?>
        </li>
    </ul>
</nav>