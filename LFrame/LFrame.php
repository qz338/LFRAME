<?php
    
    /*
        如果想要module, 修改net\request的控制器动作定义，和本文件分发和view路径即可
     */

    //定义模型地址
    $model_path = APP_PATH."\\"."models";
    define("MODEL_NAMESPACE", $model_path);
    //定义libary地址
    define("LIB_NAMESPACE", APP_PATH."\\"."library");

    //加载系统函数库
    require_once __DIR__.'/function.php';

    //加载核心类
    use LFrame\core\Loader;
    use LFrame\net\Request;

    //自动导入类
    require_once __DIR__.'/Loader.php';
    $Loader = new Loader();
    $Loader->autoload();

    //分析$_SERVER,获取需要信息
    $a = new Request();
    $a->init();
    $urlInfo = $a->urlInfo;

    //分发 定义控制器 定义动作 定义模块
    $class = APP_PATH."\\"."controllers\\". ucfirst($urlInfo[0]);
    //检测控制器
    if(class_exists($class)){
        if(method_exists($class, $urlInfo[1])){
            //定义
            define("__CONTROLLER__", ucfirst($urlInfo[0]) );
            define("__ACTION__", $urlInfo[1]);

        }else{
            echo "方法不存在";
            exit;
        }
    }
    elseif(count($urlInfo) > 2){
        $class = APP_PATH."\\modules\\". ucfirst($urlInfo[0]) ."\\controllers\\".ucfirst($urlInfo[1]);
        if(class_exists($class)){
            if(method_exists($class, $urlInfo[2])){
                //定义
                define("__MODULE__", ucfirst($urlInfo[0]) );
                define("__CONTROLLER__", ucfirst($urlInfo[1]) );
                define("__ACTION__", $urlInfo[2]);

            }else{
                echo "方法不存在";
                exit;
            }
        }else{
            echo "控制器不存在";
            exit;
        }
    }else{
        echo "控制器不存在";
        exit;
    }
    
    //定义view路径
    define("VIEW_PATH", ROOT_PATH . "/" . APP_PATH . "/" .  (defined("__MODULE__") ? ("modules/".__MODULE__. "/") : "" ). "views" );

    //定义配置文件路径
    define("CONF_PATH", ROOT_PATH . "/" . APP_PATH."/"."conf/app.ini");

    //执行bootrap
    $Bootstrap =  "\\" . APP_PATH . "\\Bootstrap";
    $Bootstrap = new $Bootstrap;
    $Bootstrap->_initDB();
    $Bootstrap->_initFun();
    $class = new $class();
    $class->init(__ACTION__);
    //$class->{__ACTION__}Action();
?>