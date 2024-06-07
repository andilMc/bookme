<?php
include_once(__DIR__ . "/../shared/header.php");
include_once(__DIR__ . "/../shared/admin-nav-front.php");
?>
<main class="admin-container">
    <div class="admin-header">
        <a href="#" class="admin-profile-link">
            <div class="admin-profile">
                <img src="https://images.pexels.com/photos/3781543/pexels-photo-3781543.jpeg?auto=compress&cs=tinysrgb&w=600" class="admin-profile-img" alt="">
            </div>
        </a>
    </div>
    <div class="container ps-3 pe-5">
        <!-- <h1 class="admin-title-page ms-4">
            Add service
        </h1> -->
        <div class="row flex-wrap mt-3 ">
            <!-- ====================================bloc 1============================================== -->
            <div class="col-md-8 mt-3">
                <div class="card bg-white w-100 ">
                    <div class="header-card side-green">
                        <h2 class="card-title ">New Offer</h2>
                    </div>
                    <div class="card-body">
                        <div class="form row p-3 ">
                            <form method="POST" class="row flex-wrap  list-users" enctype="multipart/form-data">
                                <!-- <input type="number" name="" id=""> -->
                                <div class="label">Type *</div>
                                <div class="">
                                    <!-- <input class="" placeholder="Enter the room type" /> -->
                                    <select name="type" id="pet-select">
                                        <option value="">--Please choose an option--</option>
                                        <option value="1">Standard room</option>
                                        <option value="2">Queen room</option>
                                        <option value="3">King room</option>
                                        <option value="4">Twin room</option>
                                        <option value="5">Double room</option>
                                        <option value="6">Presidential suite</option>
                                        <option value="7">Studio</option>
                                        <option value="8">Apartment</option>
                                        <!-- <option value="9">Villa</option> -->
                                    </select><br><br>
                                </div>
                                <!-- <div class="label">Room Category *</div>
                                <div class="">
                                    <input class="" placeholder="Enter the hotel name" style="border-color: #ff0000;" />
                                </div> -->
                                <div class="label">Room number *</div>
                                <div class="">
                                    <input type="number" name="nbrRoom" class="" placeholder="Enter the room number" />
                                </div>
                                <div class="label">Price ($) *</div>
                                <div class="">
                                    <input class="" name="price" placeholder="Enter the price" />
                                </div>
                                <div class="label">Nombre of person *</div>
                                <div class="">
                                    <input type="number" name="person" class="" placeholder="Enter the address" />
                                </div>
                                <div class="label">Children *</div>
                                <div class="">
                                    <input class="" name="childrenNbr" placeholder="Enter the address" />
                                </div>
                                <div class="label">Photo *</div>
                                <div class="">
                                    <input class="input-img" type="file" name="img" id="fileInput" accept="image/*" placeholder="Enter the price" />
                                </div>
                                <div class=" label">Wifi is available *</div>
                                <div class="radio-container">
                                    <label for="btnyes">Yes</label>
                                    <input type="radio" id="huey" name="wifi" value="0" />
                                    <label for="btnNo" class="btnNo">No</label>
                                    <input type="radio" id="dewey" name="wifi" value="1" />
                                </div>
                                <div class="label">Free BreakFast *</div>
                                <div class="radio-container">
                                    <label for="btnyes">Yes</label>
                                    <input type="radio" id="huey" name="breackfast" value="0" />
                                    <label for="btnNo" class="btnNo">No</label>
                                    <input type="radio" id="dewey" name="breackfast" value="1" />
                                </div>
                                <div class="label">Description</div>
                                <div class=>
                                    <!-- <input class="textarea" placeholder="Enter a description" /> -->
                                    <textarea name="Description" id="" cols="30" rows="10" placeholder="Add a description"></textarea>
                                </div>
                                <!-- <button type="submit" class="btn btn-blue w-100 " name="btnPreview" id="btnPreview">
                                    Preview
                                </button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ====================================fin bloc 1============================================== -->

            <div class="col-md-4  mt-3">
                <div class="card bg-white w-100">
                    <div class="title-chat">
                        <div class="preview">Preview</div>
                    </div>
                    <!-- <form class="hotelPreview" method="POST" enctype="multipart/form-data"> -->
                    <div class="hotelPreview">
                        <img class="imgPreview" id="imagePreview" src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=" />
                        <!-- <img src="#" class="imgPreview" id="imagePreview" alt="Image Preview" /> -->
                        <div class="hotel-name">Retaj Moroni</div>
                        <div class="localisation">Moroni comoros</div>
                        <span id="localisationIcon" class="material-symbols-outlined" style="color: #23A1DB;">
                            location_on
                        </span>
                        <button type="submit" class="btn btn-blue w-100" name="btnPublish" id="btnPublish">
                            Publish
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div><br><br>
</main>
<?php
include_once(__DIR__ . "/../shared/footer.php");
?>