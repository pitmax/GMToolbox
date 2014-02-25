<?php
class siteLieuxController extends siteLieuxController_Parent
{

    public function __construct($request) {
        $this->champs_sons = array(
            'gmtoolbox_lieux.jour_calme_musique',
            'gmtoolbox_lieux.jour_calme_son',
            'gmtoolbox_lieux.nuit_calme_musique',
            'gmtoolbox_lieux.nuit_calme_son',
            'gmtoolbox_lieux.jour_angoissant_musique',
            'gmtoolbox_lieux.jour_angoissant_son',
            'gmtoolbox_lieux.nuit_angoissant_musique',
            'gmtoolbox_lieux.nuit_angoissant_son',
            'gmtoolbox_lieux.combat_musique',
            'gmtoolbox_lieux.combat_son',
        );
        parent::__construct($request);
    }

    function indexAction ($request, $params = null) {
        $this->hideFields(array_merge($this->champs_sons), array('gmtoolbox_lieux.date_creation'));
        return parent::indexAction($request, $params);
    }

    public function override_fields($params = null)
    {
        foreach ($this->champs_sons as $champ_son) {
            $this->data['fields'][$champ_son]['type']                       = 'file';
            $this->data['fields'][$champ_son]['parameters']                 = array();
            $this->data['fields'][$champ_son]['parameters']['max_filesize'] = 30 * 1000 * 1000;
            $this->data['fields'][$champ_son]['parameters']['extensions']   = array('mp3');
            $this->data['fields'][$champ_son]['parameters']['dest_dir']     = __FILES_ROOT__ . '/files/media';
        }
        $this->data['fields']['gmtoolbox_lieux.date_creation']['type'] = 'datetime';
        $this->data['fields']['gmtoolbox_lieux.date_modification']['type'] = 'datetime';
        return parent::override_fields($params);
    }

}
