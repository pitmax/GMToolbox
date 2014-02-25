<?php
class cssjsDebugHelper extends cssjsDebugHelper_Parent
{
    public function missing_param ($param, $trace)
    {
        if (__DEBUGABLE__ && Clementine::$config['clementine_debug']['display_errors']) {
            $this->trigger_error("missing parameter <em>" . $param['param_name'] . "</em> in function <em>" . $trace[1]['function'] . "</em> (and no default value was found in <em>Clementine::\$config[module_cssjs-" . $param['type'] . ']</em>)', E_USER_ERROR, 3);
        }
    }
}
?>
