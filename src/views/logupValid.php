<?php
include_once("shared/header.php");
?>
<div class="vh-100   d-flex flex-column justify-content-center align-items-center">
   <img src="<?=base_url?>/img/logo.svg" width="200px" class="mx-auto">
   <p class="fs-1 fw-bolder">Your Account verified</p>
   <p class="">You will be redirected to the Login page in : <span id="chrono"></span></p>
   <p class="alert alert-warning">⚠ If something is wrrong click the button bellow</p>
   <a class="btn btn-blue w-75" href="<?=base_url?>/login">Login</a>
</div>

<?php
include_once("shared/footer.php");
?>