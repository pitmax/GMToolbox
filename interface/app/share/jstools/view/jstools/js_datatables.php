<script type="text/javascript">
    // si jQuery est chargé
    if (typeof(jQuery) != "undefined") {
        // effet hover sur les colonnes
        jQuery(document).ready(function() {
            jQuery('.clementine-dataTables').dataTable({
                <?php
if (Clementine::$config['module_jstools']['persistent_datatables']) {
?>
                "bStateSave": true,
<?php
}
if (Clementine::$config['module_jstools']['nb_res_datatables']) {
?>
                "aLengthMenu": <?php echo Clementine::$config['module_jstools']['nb_res_datatables']; ?>,
<?php
}
                ?>
                "aaSorting": [], /* disable initial sort */
                "sPaginationType": "full_numbers",
                "oLanguage": {
                    "sUrl": "<?php echo __WWW_ROOT_JSTOOLS__; ?>/skin/js/jquery.dataTables/locale/<?php echo $request->LANG; ?>.txt"
                },
                "fnDrawCallback": function() {
                    jQuery(this).find('tr').removeClass("alt-row");
                    jQuery(this).find('tr:odd').addClass("alt-row");
                }
            });
        });
    }
</script>
