<?php
include("shared/header.php")
?>
<dialog id="m-car" class="  bg-white d-flex flex-column align-items-center justify-content-center p-5">
  <lottie-player class="mx-auto" src="https://lottie.host/0c852a4e-d820-4dee-b7d9-099db56f8491/o6IaPA9xrf.json" background="#FFFFFF" speed="1" style="width: 150px; height: 150px" loop autoplay direction="1" mode="normal"></lottie-player>
  <h2 class="title">Your Booking is confirmed successfully with payment</h2>
  <p>
    <i>We sent a resume of your booking to this email : <b><?= $authUser["email"] ?></b> </i>
  </p>
  <a href="<?= base_url ?>/car" class="btn btn-blue btn-sm w-50 mt-4"> Go to home page </a>
</dialog>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
  <?php
  if ($cf_car) {
  ?>
    document.getElementById("m-car").showModal();
  <?php
  }
  ?>
</script>
<?php
include("shared/footer.php")
?>