<?php
include_once(__DIR__ . "/../shared/header.php");
?>
<main class="w-100">
   <div class="vh-100 w-50 mx-auto d-flex flex-column justify-content-center align-items-center">
      <img src="<?= base_url ?>/img/logo.svg" width="200px" class="mx-auto">
      <p class="fs-1 fw-bolder text-center">Your request has been sent successfully</p>

      <p class="alert alert-primary d-flex align-items-center gap-3" role="alert">
         <span class="material-symbols-outlined">info</span>
         <span>
            Click the button bellow to leave this page
         </span>
      </p>
      <a class="btn btn-blue w-75" href="<?= base_url ?>/profile">Go back</a>
   </div>
</main>


<?php
include_once(__DIR__ . "/../shared/footer.php");
?>