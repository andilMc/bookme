<div id="research">
    <div class="tab-menu-search">
        <ul class="tab-menu">
            <li class="tab-menu-item"><a href="<?=base_url?>/flight" class="btn-self btn-outline-blue btn-tab"> Flight </a></li>
            <li class="tab-menu-item"><a href="<?=base_url?>/hotel" class="btn-self btn-outline-blue btn-tab"> Hotel </a></li>
            <li class="tab-menu-item"><a href="<?=base_url?>/car" class="btn-self btn-outline-blue btn-tab">Car rent </a></li>
        </ul>
        <div class="indicator"></div>
        <?php
        include_once(__DIR__ . "/tab-flight.php")
        ?>

    </div>
</div>