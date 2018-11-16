<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 6/29/2018
 * Time: 9:16 AM
// */

class Config_Loader {
    protected $config = array();

    public function load($config) {
//        var_dump(PATH_APPLICATION . '/config/' . $config . '.php');
//        var_dump(file_exists(PATH_APPLICATION . '/config/' . $config . '.php'));die;
        if (file_exists(PATH_APPLICATION . '/config/' . $config . '.php')) {
            $config = include_once PATH_APPLICATION . '/config/' . $config . '.php';
//var_dump($config);die;
            if (!empty($config)) {
                foreach ($config as $key => $value) {
                    $this->config[$key] = $value;
                }
            }
            return true;
        }
        return false;
    }
    public function item($key, $default_value = 'token name') {
        return isset($this->config[$key]) ? $this->config[$key] :$default_value;
    }

    public function set_item($key, $value) {
        $this->config[$key] = $value;
    }
}
?>