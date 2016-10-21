<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('dynamic_menu')) {
    function dynamic_menu($file) { {
            if (file_exists(APPPATH . 'views/master/roles/' . $file . '.php'))
                loadView('roles/' . $file, TRUE);
            else
                loadView('roles/' . 'default', TRUE);
        }
    }
} //!function_exists('dynamic_menu')
?>