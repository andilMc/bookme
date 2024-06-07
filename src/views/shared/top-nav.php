<div class="form-top p-2 ps-3 pe-3 shadow-sm d-flex gap-4 align-items-center">
    <a href="<?= base_url ?>" class="border-end pt-2 pb-2 pe-4 ">
      <img src="<?= base_url ?>/img/complet logo.svg" width="100">
    </a>
    <?php

    use src\controllers\Utils;

    ?>
   
    <h2 class="p-0 m-0"><?php echo "" ?></h2>
    <div class="flex-grow-1 d-flex justify-content-end gap-3">
      <?php if (Utils::isLogin()) : ?>
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
            <a href="" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
              <span class="material-symbols-outlined">wallet</span>
              <span class="menu-item-text">My Bookings</span>
            </a>
            <a href="<?= base_url ?>/dashboard" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
              <span class="material-symbols-outlined">dashboard</span>
              <span class="menu-item-text">My Dashboard</span>
            </a>
            <a href="" class="menu-item-btn rounded-0 m-0 p-2 w-100 d-flex  align-items-center">
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