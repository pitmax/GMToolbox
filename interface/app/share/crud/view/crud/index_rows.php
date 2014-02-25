<?php
$ns = $this->getModel('fonctions');
if (!isset($data['alldata']['formtype'])) {
    $data['alldata']['formtype'] = 'read';
}
$row = array();
if (!(isset($data['alldata']['return_json']) && $data['alldata']['return_json'])) {
?>
            <tr>
<?php 
}
foreach ($data['alldata']['fields'] as $tablefield => $metas) {
    if (array_key_exists($tablefield, $data['ligne'])) { // array_key_exists !== isset
        $fieldmeta = $data['alldata']['fields'][$tablefield];
        $hidden = 0;
        if (isset($data['alldata']['metas']['hidden_fields'][$tablefield]) && $data['alldata']['metas']['hidden_fields'][$tablefield]) {
            $hidden = 1;
        }
        if (!$hidden) {
            if (!(isset($data['alldata']['return_json']) && $data['alldata']['return_json'])) {
?>
        <td>
<?php
            }
            // les chamsp ajoutes avec addField n'ont pas de valeur, ce qui génèrerait une notice
            if (array_key_exists($tablefield, $data['ligne'])) { // array_key_exists !== isset
                $mapping = '';
                if (isset($data['alldata']['mapping'][$fieldmeta['type']])) {
                    $mapping = $data['alldata']['mapping'][$fieldmeta['type']];
                }
                if ($fieldmeta['type'] == 'custom_field' && isset($fieldmeta['custom_type'])) {
                    if (isset($data['alldata']['mapping'][$fieldmeta['custom_type']])) {
                        $mapping = $data['alldata']['mapping'][$fieldmeta['custom_type']];
                    }
                }
                if (!$hidden) {
                    if ($this->canGetBlock($data['alldata']['class'] . '/index_fields/custom_' . $tablefield)) {
                        $out = $this->getBlockHtml($data['alldata']['class'] . '/index_fields/custom_' . $tablefield, array('tablefield' => $tablefield, 'current_key' => $data['current_key'], 'ligne' => $data['ligne'], 'data' => $data['alldata']));
                        if (!(isset($data['alldata']['return_json']) && $data['alldata']['return_json'])) {
                            echo str_replace('__CLEMENTINE_CONTENUS_WWW_ROOT__', __WWW_ROOT__, $out);
                        } else {
                            $row[] = $out;
                        }
                    } else {
                        if ($mapping == 'html') {
                            $out = $data['ligne'][$tablefield];
                            if (!(isset($data['alldata']['return_json']) && $data['alldata']['return_json'])) {
                                echo str_replace('__CLEMENTINE_CONTENUS_WWW_ROOT__', __WWW_ROOT__, $out);
                            } else {
                                $row[] = $out;
                            }
                        } else {
                            $out = '';
                            if ($data['alldata']['formtype'] != 'none') {
                                $out = '<a href="' . __WWW__ . '/' . $data['alldata']['class'] . '/' . $data['alldata']['formtype'] . '?' . $ns->htmlentities($data['current_key']) . '">';
                            }
                            switch ($mapping) {
                                case 'checkbox':
                                    if ($data['ligne'][$tablefield]) {
                                        $out .= '✓';
                                    } else {
                                        $out .= '✕';
                                    }
                                    break;
                                default:
                                    if (!empty($fieldmeta['fieldvalues']) && isset($fieldmeta['fieldvalues'][$data['ligne'][$tablefield]])) {
                                        $out .= $fieldmeta['fieldvalues'][$data['ligne'][$tablefield]];
                                    } else {
                                        $out .= $ns->htmlentities($ns->truncate($data['ligne'][$tablefield], 50));
                                    }
                                    break;
                            }
                            if ($data['alldata']['formtype'] != 'none') {
                                $out .= '</a>';
                            }
                            if (!(isset($data['alldata']['return_json']) && $data['alldata']['return_json'])) {
                                echo str_replace('__CLEMENTINE_CONTENUS_WWW_ROOT__', __WWW_ROOT__, $out);
                            } else {
                                $row[] = $out;
                            }
                        }
                    }
                }
            }
            if (!(isset($data['alldata']['return_json']) && $data['alldata']['return_json'])) {
?>
        </td>
<?php
            }
        }
    }
}
$out = $this->getBlockHtml($data['alldata']['class'] . '/index_actions', array('current_key' => $data['current_key'], 'ligne' => $data['ligne'], 'alldata' => $data['alldata']));
if (!(isset($data['alldata']['return_json']) && $data['alldata']['return_json'])) {
?>
            <td>
<?php
    echo str_replace('__CLEMENTINE_CONTENUS_WWW_ROOT__', __WWW_ROOT__, $out);
?>
            </td>
        </tr>
<?php
} else {
    $row[] = $out;
}
if (isset($data['alldata']['return_json']) && $data['alldata']['return_json']) {
    echo json_encode(str_replace('__CLEMENTINE_CONTENUS_WWW_ROOT__', __WWW_ROOT__, $row));
}
?>
