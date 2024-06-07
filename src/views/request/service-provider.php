<?php
include(__DIR__ . "/../shared/header.php")
?>
<div class="container p-5">
    <div class="card shadow-sm p-4 ">
        <form action="<?= base_url ?>/sbt" method="post" enctype="multipart/form-data">
            <div class="body">
                <div class="body-item row pe-3" id="s-choice">
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <img class="labe-ui" src="<?= base_url ?>/img/question-request.svg">
                    </div>
                    <div class="col-md-6 d-flex  flex-column p-5 ps-3 pe-3 gap-2">
                        <a href="<?= base_url ?>/"><img src="<?= base_url ?>/img/complet logo.svg" width="200"></a>
                        <h4 class="mt-4">What kind of Service do you want provide ?</h4>
                        <br>
                        <label for="carS" class=" menu-item-btn border ">
                            <input id="carS" type="radio" name="service" value="1" class="form-check-input">
                            Rental Car Service
                        </label>
                        <label for="hotelS" class=" menu-item-btn border">
                            <input id="hotelS" type="radio" name="service" value="2" class="form-check-input">
                            Hotel Service
                        </label>
                        <br>
                        <br>
                        <div class="d-flex flex-column align-items-end">
                            <a href="#document" class="btn btn-blue w-50">Next</a>
                        </div>
                    </div>
                </div>
                <div class="body-item " id="document">
                    <div class="p-4">
                        <a href="<?= base_url ?>/"><img src="<?= base_url ?>/img/complet logo.svg" width="100"></a>
                        <h6 class="mt-4">Agency information</h6>
                    </div>
                    <div class=" row ps-5 pe-5">
                        <div class="col-md-6 p-2">
                            <div class="input-search  ">
                                <span class="material-symbols-outlined">apartment</span>
                                <input name="companyName" id="" value="" class="flying-form" placeholder="Company Name" type="text">
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="input-search ">
                                <input name="country" id="" value="" class="country-select flying-form" placeholder="country" type="text">
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="input-search ">
                                <span class="material-symbols-outlined">tag</span>
                                <input name="bNumber" id="" value="" class="flying-form" placeholder="Business Registration Number" type="text">
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="permit" class="input-search ">
                                <span class="material-symbols-outlined">description</span>
                                <span id="permi" style="color:var(--gray-6)">Permit or License</span>
                                <input name="license" accept=".PDF,.pdf" hidden id="permit" class="flying-form" placeholder="Permit or License" type="file" onchange="$('#permi').text($(this).val())">
                            </label>
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="assurance" class="input-search ">
                                <span class="material-symbols-outlined">attachment</span>
                                <span for="assurance" id="insurance" style="color:var(--gray-6)">Insurance Certificate</span>
                                <input name="insurance" accept=".PDF,.pdf" hidden id="assurance" placeholder="Insurance Certificate" type="file" onchange="$('#insurance').text($(this).val())">
                            </label>
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="imgs" class="input-search ">
                                <span class="material-symbols-outlined">photo_library</span>
                                <span id="imgl" style="color:var(--gray-6)">Establishment Photos</span>
                                <input name="imgs[]" multiple accept=".jpg,.jpeg,.png" id="imgs" hidden placeholder="Establishment Photos" type="file" onchange="$('#imgl').text($(this).val())">
                            </label>
                        </div>
                    </div>
                    <div class="d-flex p-5 justify-content-between">
                        <a href="#s-choice" class="btn btn-outline-blue w-25">Back</a>
                        <button type="submit" class="btn btn-blue w-25">Send my request</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include(__DIR__ . "/../shared/footer.php")
?>