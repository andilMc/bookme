<?php
include_once(__DIR__ . "/../shared/header.php");
include_once(__DIR__ . "/../shared/admin-nav-front.php");
?>
<main class="admin-container h-100">
    <div class="admin-header">
        <a href="#" class="admin-profile-link">
            <div class="admin-profile">
                <img src="<?= (!empty($authUser["imgProfile"])) ? base_url . $authUser["imgProfile"] : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>" class="admin-profile-img" alt="">
            </div>
        </a>
    </div>
    <div class="container mt-5 ps-3 pe-5">

        <div class="list-group " style="border-radius:15px;background-color: var(--gray-0) !important">
            <div class="header-card side-green m-3">
                <h2 class="card-title ">Services Requests</h2>
            </div>
            <?php
            if (!empty($request_liste)) {
                
                foreach ($request_liste as $request) {
                    $id = $request["request"]->getID();
                   
            ?>
            
                    <div class=" list-group-item bg-transparent d-flex justify-content-between align-tiems-center">
                        <div class="d-flex align-tiems-center gap-3">
                            <img src="<?= (!empty($request["user"]->getImgProfile())) ? base_url . $request["user"]->getImgProfile() : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>" class="admin-profile-img border" alt="">
                            <div class="d-flex flex-column justify-content-center">
                                <h5 class="title"><?= $request["user"]->getFullName() ?></h5>
                                <span class="badge bg-<?= ($request["request"]->getService() == 1) ? "primary" : "success" ?> rounded-pill"><?= _service[$request["request"]->getService()] ?></span>
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <?php
                            if ($request["request"]->getValid() == 1) {
                                ?>
                                <span class="material-symbols-outlined me-3" style="font-size: 40px; color:var(--teal-5)">check_circle</span>
                                <?php
                            } else {
                            ?>
                                <a href="#m=check<?= $id ?>" open-modal="check<?= $id ?>" class="btn btn-sm btn-dark d-flex align-tiems-center me-3" style="border-radius:10px;">
                                    <span class="material-symbols-outlined">visibility</span>
                                </a>
                            <?php
                            }
                            ?>
                            <dialog class="bg-transparent shadow-none" id="check<?= $id ?>">
                                <div class="modal-body right-modal position-relative">
                                    <div class=" d-flex justify-content-start position-sticky top-0 bg-white p-2" style="z-index: 999;">
                                        <a href="#" style="border-radius: 10px;" class="btn-sm  btn-outline-danger  d-flex align-items-center justify-content-start" close-modal="check<?= $id ?>"><span class="material-symbols-outlined">close</span></a>
                                    </div>
                                    <div class="container">
                                        <div class="header-card side-green border-bottom pt-2 p-2 border-top">
                                            <h5 class="card-title ">User</h5>
                                        </div>
                                        <div class="d-flex pt-2 pb-2 ps-4 pe-4 ">
                                            <div class="d-flex align-items-center p-2">
                                                <img class="border" style="width:120px;height:150px;object-fit: cover;border-radius: 15px;" src="<?= (!empty($request["user"]->getImgProfile())) ? base_url . $request["user"]->getImgProfile() : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center gap-2 p-2">
                                                <p class="m-0">Full Name : <b><?= $request["user"]->getFullName() ?></b></p>
                                                <p class="m-0">Email : <b><?= $request["user"]->getEmail() ?></b></p>
                                                <p class="m-0">Phone Number : <b><?= $request["user"]->getPhoneNumber() ?></b></p>
                                                <p class="m-0">Address : <b><?= $request["user"]->getAddress() ?></b></p>

                                            </div>
                                        </div>
                                        <div class="header-card side-green border-bottom pt-2 p-2 border-top">
                                            <h5 class="card-title ">Request</h5>
                                        </div>
                                        <div class="row p-3 ps-4 pe-4 ">
                                            <div class="col-6">
                                                <p>Company : <b><?= $request["request"]->getCompanyName() ?></b></p>
                                            </div>
                                            <div class="col-6">
                                                <p>Country : <b><?= $request["request"]->getCountry() ?></b></p>
                                            </div>
                                            <div class="col-6">
                                                <p>Requested Service : <span class="badge bg-<?= ($request["request"]->getService() == 1) ? "primary" : "success" ?> rounded-pill"><?= _service[$request["request"]->getService()] ?></span></p>
                                            </div>
                                            <div class="col-6">
                                                <p>Code Request : <b><?= $request["request"]->getCodeRequest() ?></b></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="fs-3">License</span>
                                                <button class="btn btn-sm btn-dark d-flex align-tiems-center" style="border-radius:10px;">
                                                    <span class="material-symbols-outlined">open_in_full</span>
                                                </button>
                                            </div>
                                            <object class="mx-auto" style="border-radius: 15px;" data="<?= $request["request"]->getLicense() ?>" type="application/pdf" width="75%" height="400px"></object>
                                        </div>
                                        <br>
                                        <hr>
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <span class="fs-3">Insurance</span>
                                                <button class="btn btn-sm btn-dark d-flex align-tiems-center" style="border-radius:10px;">
                                                    <span class="material-symbols-outlined">open_in_full</span>
                                                </button>
                                            </div>
                                            <object class="mx-auto" style="border-radius: 15px;" data="<?= $request["request"]->getInsurance() ?>" type="application/pdf" width="75%" height="400px"></object>
                                        </div>
                                        <div class="p-3">
                                            <!-- refu -->
                                            <dialog class="w-50" id="denided<?= $id ?>">
                                                <form action="" method="post">
                                                    <div class="header-card side-red">
                                                        <h5 class="card-title ">Reason for rejection</h5>
                                                    </div>
                                                    <br>
                                                    <textarea name="" id="" class="w-100" rows="5"></textarea>
                                                    <br>
                                                    <div class="p-3 d-flex gap-3 justify-content-end">
                                                        <a href="#m=check<?= $id ?>" style="border-radius:10px;height:45px;min-width:100px !important" class="btn btn-outline-danger d-flex  justify-content-center align-items-center" close-modal="denided<?= $id ?>">
                                                            Cancel
                                                        </a>
                                                        <button style="border-radius:10px;height:45px;min-width:100px !important" type="submit" class="btn btn-primary">
                                                            Confirm
                                                        </button>
                                                    </div>

                                                </form>

                                            </dialog>
                                            <!-- valide -->
                                            <dialog class="" style="width:45vw;min-height:25vw;" id="valid<?= $id ?>">
                                                <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                                                    <div class="d-flex align-items-center justify-content-center p-3">
                                                        <span class="material-symbols-outlined" style="font-size: 200px;color:var(--teal-5);animation:var(--animation-pulse)">
                                                            verified
                                                        </span>
                                                    </div>
                                                    <div class="p-2 alert alert-primary d-flex align-items-center gap-2" style="border-radius: 10px;">
                                                        <span class="material-symbols-outlined fs-2">info</span>
                                                        Please ensure all provided information is thoroughly verified before proceeding to validate the request.
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="d-flex gap-3 justify-content-center">
                                                            <input type="text" name="code" hidden value="<?= $request["request"]->getCodeRequest() ?>">
                                                            <button class="btn btn-outline-danger d-flex  justify-content-center align-items-center" style="border-radius:10px;height:45px;min-width:100px !important" close-modal="valid<?= $id ?>">
                                                                Cancel
                                                            </button>
                                                            <button type="submit" name="valid" class="btn btn-primary " style="border-radius:10px;height:45px;min-width:100px !important">
                                                                Confirm the request
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </dialog>
                                            <div class="d-flex gap-3 justify-content-end">
                                                <button style="border-radius:10px;height:45px;width:100px !important" class="btn btn-outline-danger" open-modal="denided<?= $id ?>">
                                                    Reject
                                                </button>
                                                <button style="border-radius:10px;height:45px;width:100px !important" class="btn btn-primary d-flex  justify-content-center align-items-center" open-modal="valid<?= $id ?>">
                                                    Validate
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <center>
                    <p class="w-100 m-0 d-block text-center">No Requests</p>
                </center>
            <?php
            }
            ?>
        </div>

    </div>
</main>
<?php
include_once(__DIR__ . "/../shared/footer.php");
?>