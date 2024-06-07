<?php
include_once("shared/header.php");
?>
<div class="access-clt">
    <div class="left-div">
        <img class="logo" src="<?= base_url ?>/img/complet logo.svg" />
    </div>
    <div class="right-div">
        <div class="header">
            <h1 class="access-title">Sign in</h1>
            <p class="sign-in-if-you-have-a-account">
                Sign in if you have a account
            </p>
            <?php if ($accessMsg) : ?>
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2  " role="alert">
                    <span class="material-symbols-outlined">block </span>
                    <?=$accessMsg?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
        <form action="<?= base_url ?>/sign-in" method="POST" class="form-sign-up mx-auto  mt-5  w-75  ">
            <div class="set-input">
                <label> <span class="material-symbols-outlined">email</span> Your Email</label>
                <input class="input" name="email" type="email" placeholder="Enter your email">
            </div>

            <div class="set-input">
                <label><span class="material-symbols-outlined">lock</span> Password</label>
                <input class="input" name="password" type="password" placeholder="Enter your password">
            </div>


            <a href="#" class="btn-link">Forget password</a>

            <button class="btn-custom-blue" type="submit"> Login</button>

            <a href="<?= base_url ?>/logup" class="btn-custom-gray">Creat a account</a>
        </form>

    </div>
</div>


<?php
include_once("shared/footer.php");
?>