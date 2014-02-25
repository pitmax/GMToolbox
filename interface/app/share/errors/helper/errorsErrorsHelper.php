<?php
/**
 * errorsErrorsHelper 
 * 
 * @uses errorsErrorsHelper_Parent
 * @package errors
 * @version $id$
 * @copyright 
 * @author Pierre-Alexis <pa@quai13.com> 
 * @license 
 */
class errorsErrorsHelper extends errorsErrorsHelper_Parent
{
    private $_flux;

    public function __construct()
    {
        if (!$this->_flux) {
            $this->_flux = $this->_get_current_flux();
        }
        if (!isset(Clementine::$register['errors'])) {
            Clementine::$register['errors'] = array();
        }
        if (!isset(Clementine::$register['errors'][$this->_flux])) {
            Clementine::$register['errors'][$this->_flux] = array();
        }
    }

    /**
     * register_err : complete un tableau d'erreurs typique
     *      Array
     *      (
     *          [missing_fields] => Array
     *              (
     *                  [password] => 'Champ manquant : mot de passe'
     *                  [password_conf] => ''
     *                  [cgv] => ''
     *              )
     *
     *          [password] => Array
     *              (
     *                  [password_mismatch] => 'Les champs mot de passe et confirmation du mot de passe diffèrent'
     *              )
     *
     *          [0] => Message d'une erreur
     *          [1] => Message d'une autre erreur
     *      )
     *
     * @param mixed $type : type permettant de regrouper plusieurs erreurs (liste des champs manquants, erreurs concernant un meme champ, etc...)
     * @param mixed $erreur : clé de tableau censée identifier le message d'erreur à afficher
     * @param string $details : optionnel : un message d'erreur, ou un objet plus complexe
     * @access public
     * @return void
     */
    public function register_err($type, $erreur, $details, $flux = null)
    {
        if (null === $flux) {
            $flux = $this->_flux;
        }
        if (!isset(Clementine::$register['errors'][$flux])) {
            Clementine::$register['errors'][$flux] = array();
        }
        if (!isset(Clementine::$register['errors'][$flux][$type])) {
            Clementine::$register['errors'][$flux][$type] = array($erreur => $details);
        } else {
            if (isset(Clementine::$register['errors'][$flux][$type][$erreur])) {
                Clementine::$register['errors'][$flux][$type][$erreur] = array_merge_recursive((array) Clementine::$register['errors'][$flux][$type][$erreur], (array) $details);
                Clementine::$register['errors'][$flux][$type][$erreur] = array_unique(Clementine::$register['errors'][$flux][$type][$erreur]);
                if (count(Clementine::$register['errors'][$flux][$type][$erreur]) == 1) {
                    Clementine::$register['errors'][$flux][$type][$erreur] = $this->getModel('fonctions')->array_first(Clementine::$register['errors'][$flux][$type][$erreur]);
                }
            } else {
                Clementine::$register['errors'][$flux][$type][$erreur] = $details;
            }
        }
        return Clementine::$register['errors'][$flux];
    }

    public function get($flux = null, $type = null, $erreur = null)
    {
        if (null === $flux) {
            $flux = $this->_flux;
        }
        if (isset($type) && isset($erreur)) {
            if (isset(Clementine::$register['errors'][$flux][$type]) && isset(Clementine::$register['errors'][$flux][$type][$erreur])) {
                return Clementine::$register['errors'][$flux][$type][$erreur];
            }
            return array();
        }
        if (isset($type)) {
            if (isset(Clementine::$register['errors'][$flux][$type])) {
                return Clementine::$register['errors'][$flux][$type];
            }
            return array();
        }
        return Clementine::$register['errors'][$flux];
    }

    public function flush($flux = null)
    {
        if (null === $flux) {
            $flux = $this->_flux;
        }
        unset(Clementine::$register['errors'][$flux]);
    }

    public function getflux()
    {
        return array_keys(Clementine::$register['errors']);
    }

    private function _get_current_flux()
    {
        $backtrace = debug_backtrace();
        if (isset($backtrace[2]['class'])) {
            // appel depuis un modele, un controlleur, un helper...
            $obj = get_class($backtrace[2]['object']);
        } else {
            // appel depuis une vue
            $obj = get_class($backtrace[3]['object']);
        }
        return strtolower(preg_replace('/[A-Z][^A-Z]+$/', '', $obj));
    }

}
?>
