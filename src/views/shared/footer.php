<script src="<?=base_url?>/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url?>/js/jquery.min.js"></script>
<script src="<?=base_url?>/js/Controllers//moment.min.js"></script>
<script src="<?=base_url?>/js/Controllers/daterangepicker.min.js"></script>
<script src="<?=base_url?>/js/Controllers/countrySelect.min.js"></script>
<script src="<?=base_url?>/js/Controllers/intlTelInput.min.js"></script>
<script type="module"  src="<?=base_url?>/js/Controllers/mainController.js"></script>
<script type="module" src="<?=base_url?>/js/main.js"></script>
<script type="module" src="<?=base_url?>/js/Controllers/CountryRegionDropdown.min.js"></script>

<?php 
    if (isset($js)) {
        if ( is_array($js) ) {
            foreach ($js as $file) {
                ?>
                <script type="module"  src="<?=base_url?>/js/<?=$file?>.js"></script>
                <?php
            }
        } else {
            ?>
                <script type="module"  src="<?=base_url?>/js/<?=$js?>.js"></script>
        <?php
        }
        
    }
?>

</body>
</html>
