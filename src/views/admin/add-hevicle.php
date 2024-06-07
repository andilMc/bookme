<?php
include_once(__DIR__ . "/../shared/header.php");
include_once(__DIR__ . "/../shared/admin-nav-front.php");
?>
<main class="admin-container">
    <div class="admin-header">
        <a href="#" class="admin-profile-link">
            <div class="admin-profile">
                <img src="<?= (!empty($authUser["imgProfile"])) ? base_url . $authUser["imgProfile"] : 'https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png' ?>" class="admin-profile-img" alt="">
            </div>
        </a>
    </div>
    <div class="p-3">

        <div class="row">
            <!-- ====================================bloc 1============================================== -->
            <div class="col-md-9">
                <div class="card bg-white w-100 ">
                    <div class="header-card side-green">
                        <h2 class="card-title ">New vehicle</h2>
                    </div>
                    <div class="card-body">
                        <div class="form row p-3 ">
                            <form method="POST" class="row" enctype="multipart/form-data">
                                <div class="col-md-6 pt-2">
                                    <label class="label">Type *</label>
                                    <div class="input-search">
                                        <select name="type" id="pet-select" class="flying-form">
                                            <option value="">--Please choose an option--</option>
                                            <?php foreach (carType as $type) : ?>
                                                <option value="<?= $type ?>"><?= $type ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="label">Make *</label>
                                    <div class="input-search">
                                        <input type="text" name="brand" class="flying-form" placeholder="Enter the room number" />
                                    </div>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="label">Model *</label>
                                    <div class="input-search">
                                        <input type="text" name="model" class="flying-form" placeholder="Enter the room number" />
                                    </div>
                                </div>

                                <div class="col-md-6 pt-2">
                                    <label class="label">Licence plate *</label>
                                    <div class="input-search">
                                        <input type="Text" name="licence_plate" class="flying-form" placeholder="Enter the address" />
                                    </div>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="label">Price ($) *</label>
                                    <div class="input-search">
                                        <input class="flying-form" type="number" name="price" placeholder="Enter the price" />
                                    </div>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="label">Driver service Price ($) *</label>
                                    <div class="input-search">
                                        <input class="flying-form" type="number" name="driverPrice" placeholder="Enter the price" />
                                    </div>
                                </div>
                                <div class="col-md-4 pt-2">
                                    <label class="label">Photo *</label>
                                    <div class="input-search overflow-hidden  p-0 d-flex flex-column align-items-center">
                                        <input class="input-img flying-form bg-transparent shadow-none  " type="file" name="img" id="fileInput" accept="image/*" placeholder="Enter the price" />
                                    </div>
                                </div>
                                <div class="col-md-4 pt-2">
                                    <label class="label">Color *</label>
                                    <div class="input-search p-2 gap-0">
                                        <input style="height: 25px;width: 60px;" id="colorinput" onchange="$('#color').val($(this).val())" pattern="#{0-9A-Fa-f}{6}" type="color">
                                        <input name="color" id="color" class="w-100" onchange="$('#colorinput').val($(this).val())" type="text" placeholder="(eg : #FFFFFF)">
                                    </div>
                                </div>
                                <div class="col-md-4 pt-2">
                                    <label class="label">Year Of Issue*</label>
                                    <div class="input-search">
                                        <input class="flying-form" type="number" name="yearIssue" placeholder="Enter the Year" />
                                    </div>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="label">Fuel Type*</label>
                                    <div class="input-search">
                                        <select class="flying-form" type="number" name="fuelType" placeholder="Enter the Year">
                                            <option value="">--Please choose an option--</option>
                                            <?php foreach (_fuel as $type) : ?>
                                                <option value="<?= $type ?>"><?= $type ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label class="label">Transmission*</label>
                                    <div class="input-search">
                                        <select class="flying-form" type="number" name="transmission" placeholder="Enter the Year">
                                            <option value="">--Please choose an option--</option>
                                            <?php foreach (_transmission as $type) : ?>
                                                <option value="<?= $type ?>"><?= $type ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- $yearIssue,$fuelType ,$transmission,$color -->
                                <div class="col-md-12 pt-2">
                                    <label class="label">Description</label>
                                    <div class="d-flex p-2" style="background: var(--gray-2);border-radius: var(--radius-3);">
                                        <textarea class="w-100 flying-form" name="description" id="" rows="7" placeholder="Add a description"></textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ====================================fin bloc 1============================================== -->

            <div class="col-md-3">
                <div class="card bg-white w-100">
                    <div class="title-chat">
                        <label class="preview admin-title">Preview Car Image</label>
                    </div>
                    <div class="hotelPreview mt-1">
                        <img class="imgPreview" id="imagePreview" src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=" />
                        <br>
                        <button type="submit" class="btn btn-blue w-100" name="btnPublish" id="btnPublish">
                            Publish
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include_once(__DIR__ . "/../shared/footer.php");
?>

