<?php
/**
 * usersHookHelper 
 * 
 * @package 
 * @version $id$
 * @copyright 
 * @author Pierre-Alexis <pa@quai13.com> 
 * @license 
 */
class usersHookHelper extends usersHookHelper_Parent
{
    /**
     * before_request : fonction appelee avant de remplir l'objet $request
     * 
     * @access public
     * @return void
     */
    function before_request($request)
    {
        // appelle le hook parent s'il existe
        parent::before_request($request);
        // utilisation du hook 'before_request'
        $this->getModel('users')->getAuth();
    }

}
?>
