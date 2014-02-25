<?php
/**
 * Script non interactif d'installation du module utilisateurs
 */

// deja appele par l'installer
// $db->beginTransaction();

$sql = <<<SQL

CREATE TABLE `gmtoolbox_lieux` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `titre` varchar(255) NULL DEFAULT NULL,
    `jour_calme_musique` varchar(255) NULL DEFAULT NULL,
    `jour_calme_son` varchar(255) NULL DEFAULT NULL,
    `nuit_calme_musique` varchar(255) NULL DEFAULT NULL,
    `nuit_calme_son` varchar(255) NULL DEFAULT NULL,
    `jour_angoissant_musique` varchar(255) NULL DEFAULT NULL,
    `jour_angoissant_son` varchar(255) NULL DEFAULT NULL,
    `nuit_angoissant_musique` varchar(255) NULL DEFAULT NULL,
    `nuit_angoissant_son` varchar(255) NULL DEFAULT NULL,
    `combat_musique` varchar(255) NULL DEFAULT NULL,
    `combat_son` varchar(255) NULL DEFAULT NULL,
    `date_creation` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `gmtoolbox_ambiances` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `categorie` varchar(255) NULL DEFAULT NULL,
    `titre` varchar(255) NULL DEFAULT NULL,
    `son` varchar(255) NULL DEFAULT NULL,
    `date_creation` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SQL;

if (!$db->prepare($sql)->execute()) {
    $db->rollBack();
    return false;
}

return true;
