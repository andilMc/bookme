<?php

use core\tools\Crypto;

include_once("shared/header.php");
$c=new Crypto()
?>
<div class="access-clt">
    <div class="left-div">
        <img class="logo" src="<?= base_url ?>/img/complet logo.svg" />
    </div>
    <div class="right-div">
        <div class="header">
            <h1 class="access-title">Sign Up</h1>
            <p class="sign-in-if-you-have-a-account">
                Log Up if you don't have a account
            </p>
            <?php if (isset($msg) && $msg!= null) : ?>
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2  " role="alert">
                    <span class="material-symbols-outlined">block </span>
                    <?=$c->string_decrypt($msg)?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
        <form method="POST" action="<?=base_url?>/register" class="form-sign-up mx-auto  mt-2 ">
            <div class="row">
                <div class="set-input col-md-6 ">
                    <label> <span class="material-symbols-outlined">person</span> Your Full Name</label>
                    <input name="fullName" class="input" type="text" placeholder="Enter your full name">
                </div>
                <div class="set-input col-md-6">
                    <label> <span class="material-symbols-outlined">phone</span> Your Phone number <i>( with code )</i></label>
                    <input name="phone" class="input" type="text" placeholder="Enter your phone number">
                </div>
            </div>

            <div class="set-input">
                <label> <span class="material-symbols-outlined">email</span> Your Email</label>
                <input name="email" class="input" type="email" placeholder="Enter your email">
            </div>

            <div class="row">
                <div class="set-input col-md-6 ">
                    <label><span class="material-symbols-outlined">lock</span> Password</label>
                    <input name="password1" class="input" type="password" placeholder="Enter your password">
                </div>

                <div class="set-input col-md-6">
                    <label><span class="material-symbols-outlined">sync_lock</span> Confirmation</label>
                    <input name="password2" class="input" type="password" placeholder="Confirm your password">
                </div>
            </div>

            <button class="btn-custom-blue" type="submit"> Sign Up</button>

            <a href="<?= base_url ?>/login" class="btn-custom-gray ">I have already an account accordion | Log in →</a>
        </form>

    </div>
</div>


<?php
include_once("shared/footer.php");
?>