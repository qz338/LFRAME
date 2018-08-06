<?php
namespace LFrame\core;
class Loader{
    
    public function autoload($enabled = true) {
        if ($enabled) {
            spl_autoload_register(array($this, 'loadClass'));
        }
        else {
            spl_autoload_unregister(array($this, 'loadClass'));
        }

    }


    public function loadClass($class) {
        //获取项目目录
        $dir = dirname(__DIR__);

        $class_file = str_replace(array('\\', '_'), '/', $class).'.php';

        $file = $dir.'/'.$class_file;
        if (file_exists($file)) {
            require_once $file;
            return;
        }else{
            
            //如果找不类就查找libary
            $file = $dir . '/' . str_replace("\\", "/", LIB_NAMESPACE) . "/" . $class_file;
            if (file_exists($file)) {
                require_once $file;
                return;
            }

        }
        
    }


}
?>