<?php
// selecteur jquery par defaut : tous les formulaires de la page
if (empty($data['jquery_selector'])) {
    $data['jquery_selector'] = 'form';
}
// methode d'envoi par defaut : post
if (empty($data['method'])) {
    $data['method'] = 'post';
}
?>
<script type="text/javascript">
    // si jQuery est chargé
    if (typeof(jQuery) != "undefined") {
        jQuery('body').delegate('<?php echo $data['jquery_selector']; ?>', 'submit', function() {
            jQuery.ajax({
                async: 1, 
                type: "<?php echo $data['method']; ?>", 
                url: jQuery(this).attr('action'),
                data: jQuery(this).serialize(),
                success: function(msg) {
                    var json;
                    var action;
                    var message;
                    try {
                        // si le retour est en json...
                        json = jQuery.parseJSON(msg);
                        action = json.action;
                        message = json.message;
                    } catch (e) {
                        // sinon on travaille avec des codes de retour
                        action = msg.substring(0, 1);
                        message = msg.substring(1);
                    }
                    switch (action) {
                        case '1':
                        case 'alert':
                            alert(message);
                            break;
                        case '2':
                        case 'redirect':
                            document.location = message;
                            break;
                        default:
                            alert('Message : ' + msg);
                            break;
                    }
                }
            });
            return false;
        });
    }
</script>
