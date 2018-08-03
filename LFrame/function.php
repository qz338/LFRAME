<?php
    function D($table){
        $model = sprintf("%s\%sModel", MODEL_PATH, $table);
        return new $model();
    }

    function C($key){
        static $conf;
        if(empty($conf)){
            $conf = _parse_ini_file(CONF_PATH);
        }
        return empty($conf[$key]) ? "" : $conf[$key];
    }

    //解析ini
    function _parse_ini_file($filename) {
        $ini_arr = parse_ini_file($filename);
        if ($ini_arr === FALSE) {
            return FALSE;
        }
        fix_ini_multi($ini_arr);
        return $ini_arr;
    }

    function fix_ini_multi(&$ini_arr) {
        foreach ($ini_arr AS $key => &$value) {
            if (is_array($value)) {
                fix_ini_multi($value);
            }
            if (strpos($key, '.') !== FALSE) {
                $key_arr = explode('.', $key);
                $last_key = array_pop($key_arr);
                $cur_elem = &$ini_arr;
                foreach ($key_arr AS $key_step) {
                    if (!isset($cur_elem[$key_step])) {
                        $cur_elem[$key_step] = array();
                    }
                    $cur_elem = &$cur_elem[$key_step];
                }
                $cur_elem[$last_key] = $value;
                unset($ini_arr[$key]);
            }
        }
    }
?>