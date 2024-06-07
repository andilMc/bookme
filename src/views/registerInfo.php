<?php
include_once("shared/header.php");
?>
<div class="vh-100   d-flex flex-column justify-content-center align-items-center">
   <img src="<?=base_url?>/img/logo.svg" width="200px" class="mx-auto">
   <p class="fs-1 fw-bolder">✅ Account created successfully ✅</p>
   <p class="">Your Accout is created , but you must confirm this registration</p>
   <p class="">We sent a confirmation email in this email : <?=$email?></p>
   <a class="btn btn-blue w-75" href="<?=base_url?>/login">Login</a>
</div>

<?php
include_once("shared/footer.php");
?>