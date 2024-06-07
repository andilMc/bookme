<?php
include_once(__DIR__ . "/../shared/header.php");
include_once(__DIR__ . "/../shared/admin-nav-front.php");
?>
<main class="admin-container">
  <div class="admin-header">
    <a href="<?= base_url ?>/profile" class="admin-profile-link">
      <div class="admin-profile">
        <img src="<?= (!empty($authUser["imgProfile"])) ? base_url . $authUser["imgProfile"] : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>" class="admin-profile-img" alt="">
      </div>
    </a>
  </div>
  <div class="container ps-3 pe-5">
    <h1 class="admin-title-page ms-4">
      Dashboard
    </h1>
    <div class="row flex-wrap mt-3 ">
      <div class="col-md-8 mt-3">
        <div class="card bg-white w-100 ">
          <div class="header-card side-green">
            <h2 class="card-title ">Overview</h2>
          </div>
          <div class="card-body">
            <div class="statistics row p-3 ">
              <div class="col-md-6 card bg-white ">
                <div class="icon-block-title d-flex align-items-center ">
                  <span class="material-symbols-outlined icon bg-green">
                    person
                  </span>
                  <label for="icon-bg" class="ms-4 ">Customers</label>
                </div>
                <!-- <h2 class="text-end me-4 ">4</h2> -->
                <h2 class="text-end me-4 "><?php echo $data ?></h2>
              </div>
              <div class="col-md-6 card bg-transparent ">
                <div class="icon-block-title d-flex align-items-center ">
                  <span class="material-symbols-outlined icon bg-blue-2">
                    trending_up
                  </span>
                  <label for="icon-bg" class="ms-4 ">Bookings</label>
                </div>
                <h2 class="text-end me-4 ">10</h2>
              </div>
            </div>
            <span class="divider">service provider</span>
            <div class="row flex-wrap  list-users justify-content-center ">
              <?php
              foreach ($data3 as $item) {
                $name = $item->getFullName();
                $parts = explode(" ", $name);
                $firstName = $parts[0];

                $imgProfile = $item->getImgProfile();
              ?>
                <a href="" class="sub-admin-link menu-item-btn flex-column justify-content-center align-items-center   ">
                  <!-- <img src="<?php $imgProfile; ?>" alt="" class="sub-admin-img"> -->
                  <img class="sub-admin-img" src="<?php echo $imgProfile; ?>" alt="">
                  <p class="sub-admin-name fw-bold p-0 m-0 "><?php echo $firstName ?></p>
                </a>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4  mt-3">
        <div class="card bg-white w-100">
          <div class="header-card side-red">
            <h2 class="card-title ">New messages</h2>
          </div>
          <div class="card-body pt-5 d-flex flex-column justify-content-center gap-3">
            <?php
            foreach ($data2 as $item) {
              $name = $item->getFullName();
              $imgProfile = $item->getImgProfile();
            ?>
              <a href="<?= base_url ?>/dashboard/customer" class="link-message d-block text-decoration-none  menu-item-btn p-2">
                <div class="d-flex  align-items-center gap-4 ">
                  <img class="img-user-link" src="<?php echo $imgProfile; ?>" alt="">
                  <div class="link-message-description d-flex  flex-column justify-content-center pt-2">
                    <h4 class="name-user-link"><?php echo $name; ?></h4>
                    <p class="last-message">Okey thank u...</p>
                  </div>
                </div>
              </a>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div><br><br>
  <?php
  // include_once(__DIR__ . "/../shared/front-footer.php");
  ?>

</main>
<?php
include_once(__DIR__ . "/../shared/footer.php");
?>