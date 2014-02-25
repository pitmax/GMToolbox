<?php
if (count($data['errors'])) {
    if ($request->AJAX) {
        $message = "Merci de vérifier les points suivants : \r\n- ";
    }
    foreach ($data['errors'] as $type => $errs) {
        if ($request->AJAX) {
            $message .= implode("\r\n- ", $errs);
            echo $message;
        } else {
            // si requete classique : affichage des erreurs dans la page
    ?>
    <ul class="errors <?php
            if (!is_int($key)) {
                echo $key;
            }
    ?>">
    <?php
        foreach ($errs as $key => $errmsg) {
    ?>
        <li class="errmsg err_<?php echo $key; ?>"><?php echo $errmsg; ?></li>
    <?php
        }
    ?>
    </ul>
    <?php
        }
    }
}
?>
