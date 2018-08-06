<?php
    namespace app;
    use app\models\Model;

    class Bootstrap{
        public  function _initDB(){
            // Table初始化
			//Model::$config = C('db');
        }
        public function _initFun(){
        	require_once(ROOT_PATH . "/" .  APP_PATH . "/" . "library" . "/Fun.php");
        }
    }
?>