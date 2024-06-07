<?php

use src\controllers\Utils;

include_once("shared/header.php");
?>
<main class="w-100">
    <div class="form-top p-2 shadow-sm d-flex gap-4 align-items-center">
        <div class="border-end ps-4 pt-2 pb-2 pe-4 ">
            <img src="<?= base_url ?>/img/complet logo.svg" width="100">
        </div>
        <div class="flex-grow-1 d-flex justify-content-end gap-3">
            <?php
            if (Utils::isLogin()) : ?>
                <button show-profile-menu class="border-0 position-relative border-0 menu-item-btn d-flex justify-content-between align-items-center" style="box-shadow: none !important;font-weight: normal !important;text-shadow: none !important;">
                    <span class="d-flex align-items-center gap-2">
                        <img style="width: 25px;height:25px;object-fit: cover;" class="rounded-pill" src="<?= (!empty($authUser["imgProfile"])) ? base_url . $authUser["imgProfile"] : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>">
                        <span class="menu-item-text"><?= $authUser["fullName"] ?></span>
                    </span>
                    <span class="material-symbols-outlined">
                        more_vert
                    </span>
                    <dialog profile-menu class="border rounded-3 p-0 pt-2 pb-2 position-absolute top-100 right-0" style="z-index:999">
                        <a href="<?= base_url ?>/profile" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
                            <span class="material-symbols-outlined">person</span>
                            <span class="menu-item-text">My Account</span>
                        </a>
                        <a href="<?= base_url ?>/mybookings" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
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
                <a class=" btn-outline-blue pt-1 pb-1 ps-3 pe-3 d-flex align-items-center" style="height: 40px;" href="<?= base_url ?>/login">
                    <span class="menu-item-text">Sign In</span>
                </a>
                <a class=" btn-blue pt-1 pb-1 pe-3 ps-3 d-flex align-items-center" style="height: 40px;" href="<?= base_url ?>/logup">
                    <span class="menu-item-text">Sign Up</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="container pt-4">

        <div class="row mb-3">
            <div class="col-md-6">
                <h1 class="title fs-3">My Account</h1>
                <p class="fs-6">Manage your Bookme experience</p>
                <?php
                // dump($authUser)
                ?>
            </div>
            <div class="col-md-6 border-start">
                <form action="" method="post" class="" enctype="multipart/form-data">
                    <label class="position-relative rounded-pill overflow-hidden" for="imgProfile">
                        <img style="width: 100px;height:100px;object-fit: cover;" class="rounded-pill" src="<?= (!empty($authUser["imgProfile"])) ? base_url . $authUser["imgProfile"] : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>">
                        <div class="icon-btn-profile ">
                            <span class="material-symbols-outlined">edit</span>
                        </div>
                    </label>
                    <input type="file" accept="image/jpeg,image/jpg,image/png" hidden name="imgProfile" id="imgProfile" required>
                    <input type="text" hidden id="linkImgProfile" value="">
                    <div class="alert alert-info  fade show mt-2" role="alert">
                        <b>Click above</b> to change you Profile image and <b>click the bellow button</b> to save your update
                    </div>
                    <button type="submit" class="btn btn-dark">Update Image</button>
                </form>

            </div>
        </div>
        <div class="card" style="border-radius: 10px !important;overflow: hidden;">
            <details class="bg-white " open>
                <summary class=" border-bottom rounded-0 d-flex  justify-content-between align-items-center" style="font-weight: normal;">
                    <div class="">
                        <h5 class="title">Personal information</h5>
                        Update your information and find out how it's used.
                    </div>
                    <span class="material-symbols-outlined">
                        expand_more
                    </span>
                </summary>
                <form action="" method="POST">

                    <div class="p-2 row justify-content-end">

                        <div class="col-md-4 p-2">
                            <p>Full Name :</p>
                            <div class="input-search ">
                                <span class="material-symbols-outlined">person</span>
                                <input name="fullName" class="flying-form " placeholder="Full Name" value="<?= $authUser['fullName'] ?>" />
                            </div>
                        </div>


                        <div class="col-md-4 p-2">
                            <p>Date of birth :</p>
                            <div class="input-search ">
                                <span class="material-symbols-outlined">event</span>
                                <input name="dateBirth" class="flying-form normal-date-picker" placeholder="Date of birth" value="<?= $authUser['birthDate'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-4 p-2">
                            <p>Email :</p>
                            <div class="input-search ">
                                <span class="material-symbols-outlined">mail</span>
                                <input type="email" name="email" class="flying-form " placeholder="Email" value="<?= $authUser['email'] ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <p>Phone Number :</p>
                            <div class="input-search ">
                                <input name="phoneNumber" type="text" class="flying-form phone" placeholder="Phone Number" value="<?= $authUser['phoneNumber'] ?>" />
                            </div>
                        </div>

                        <div class="col-md-4 p-2">
                            <p>Country :</p>
                            <div class="input-search ">
                                <input name="country" class="country-select flying-form " placeholder="Country" value="<?= $authUser['birthCountry'] ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <p>Address :</p>
                            <div class="input-search ">
                                <span class="material-symbols-outlined">location_on</span>
                                <input name="address" class="flying-form " placeholder="Address" value="<?= $authUser['address'] ?>" />
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <button class="btn-blue btn-sm w-100" type="submit">
                                Save
                            </button>
                        </div>
                    </div>

                </form>
            </details>
            <!-- ===================PASSPORT=================== -->
            <details class="bg-white " open>
                <summary class=" border-bottom border-top d-flex rounded-0  justify-content-between align-items-center" style="font-weight: normal;">
                    <div class="">
                        <h5 class="title">Passports</h5>
                        Add passort to use it automatically
                    </div>
                    <span class="material-symbols-outlined">
                        expand_more
                    </span>
                </summary>
                <div class="row">
                    <div class="col-md-6 pt-4  ">
                        <div class="list-group w-100 ">
                            <div class="list-group-item list-group-item-action d-flex justify-content-between">
                                <div class="content">
                                    <span class="d-block fs-6"><b>NBE33445</b> </span>
                                    <span style="font-size: 14px;"><b>Name:</b> Name of passeport | <b>Exp:</b> 2-03-2023 | <b>Country:</b> Gambia </span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="" class="link-danger"><span class="material-symbols-outlined">delete</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="">
                            <div class="p-2 ">
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        Passport Full name :
                                        <div class="input-search  mt-2">
                                            <span class="material-symbols-outlined">badge</span>
                                            <input name="pName" class="flying-form " placeholder="Passport Full Name" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        Country of issue :
                                        <div class="input-search  mt-2 ">
                                            <input name="pCountry" class="flying-form country-select" placeholder="Country of issue" value=" " />
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-6">
                                        Passport Number :

                                        <div class="input-search mt-2">
                                            <span class="material-symbols-outlined">tag</span>
                                            <input name="address" class="flying-form " placeholder="Passport Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        Expiry date :
                                        <div class="input-search mt-2">
                                            <span class="material-symbols-outlined">calendar_month</span>
                                            <input name="expiryDate" class="flying-form normal-date-picker" placeholder="Expiry date" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 pt-4">
                                        <button class="btn-blue btn-sm" type="submit">Add New Passport</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </details>
            <!-- ===================Password=================== -->
            <details class="bg-white "open>
                <summary class=" border-bottom border-top rounded-0 d-flex  justify-content-between align-items-center" style="font-weight: normal;">
                    <div class="">
                        <h5 class="title">Password</h5>
                        You can change your password here
                    </div>
                    <span class="material-symbols-outlined">
                        expand_more
                    </span>
                </summary>
                <form action="" class="container">

                    <div class="p-2 row">

                        <div class="col-md-4 p-2">
                            <p>New Password :</p>
                            <div class="input-search ">
                                <span class="material-symbols-outlined">lock</span>
                                <input name="pswd1" type="password" class="flying-form " placeholder="New Password" />
                            </div>
                        </div>


                        <div class="col-md-4 p-2">
                            <p>Confirm Password :</p>
                            <div class="input-search ">
                                <span class="material-symbols-outlined">lock_reset</span>
                                <input name="pswd2" type="password" class="flying-form" placeholder="Confirm Password" />
                            </div>
                        </div>
                        <div class="col-md-4 p-2 d-flex align-items-end ">
                            <button class="btn-blue btn-sm w-100 mb-1" type="submit">
                                Save
                            </button>
                        </div>

                    </div>
                    <div class="alert alert-info">
                        <i>
                            We will send you an email to confirm your password confirmation
                        </i>
                    </div>
                </form>
            </details>
            <!-- ===================SERVICE PROVIDER=================== -->
            <details class="bg-white " open>
                <summary class=" border-bottom border-top d-flex rounded-0  justify-content-between align-items-center" style="font-weight: normal;">
                    <div class="">
                        <h5 class="title">Advance Configuration</h5>
                        Change your account status and become a service provider
                    </div>
                    <span class="material-symbols-outlined">
                        expand_more
                    </span>
                </summary>
                <div class="container p-5">
                    <p>
                        This section allows you to change your account status and become a service provider in the following areas:
                    </p>
                    <ul>
                        <li>
                            <strong>Hotels:</strong> Offer rooms, apartments or other types of accommodation for rent to travelers.
                        </li>
                        <li>
                            <strong>Car rental:</strong> Offer short- or long-term car rental to your customers.

                        </li>
                    </ul>
                    <div class="alert alert-success">
                        <b>By changing your status, you'll gain access to new benefits:</b> <br>
                        <ul>
                            <li>
                                <strong>Increase your visibility:</strong>
                                Get listed on our platform and attract new potential customers.
                            </li>
                            <li>
                                <strong>Manage your bookings:</strong>
                                Access a management tool to simplify booking and customer follow-up.

                            </li>
                            <li>
                                <strong>Offer your services: </strong>
                                Define your rates, conditions and additional services.
                            </li>
                        </ul>
                    </div>

                    <p> <i> <b>To change your status, please Click the following button:</b></i></p>
                    <a href="<?=base_url?>/service" class="btn btn-success rounded-3">Become a service provider </a>
                    <hr>
                    <div class="alert alert-info">
                        Our team will examine your request and inform you of its validation by email.
                        Become a service provider today and grow your business!
                        Don't hesitate to contact us if you have any questions.
                    </div>

                </div>
            </details>
        </div>
        <br>
        <br>
    </div>
</main>

<?php
include_once("shared/footer.php");
?>