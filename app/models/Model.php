<?php
    namespace app\models;

    class Model extends \Table{
        
        public static $config = [];
        public static $pdos = []; 
        
		public function __construct($table, $tab = null, $hostname = "web") {
			
			//切换数据库
			if(!empty(self::$pdos[$hostname])){ //如果已经存在pdo
				$pdo = self::$pdos[$hostname];
			}else{ 	// Table初始化
				$pdo = null;
				\Table::$__host = self::$config[$hostname]['host'];
				\Table::$__user = self::$config[$hostname]['user'];
				\Table::$__password = self::$config[$hostname]['password'];
				\Table::$__dbname = self::$config[$hostname]['dbname'];
				//Table::$__charset = self::$config[$hostname]->charset;
				self::$pdos[$hostname] = $this->getPDO();
			}

			if(!empty(self::$config[$hostname]["prefix"])){
				$this->prefix = self::$config[$hostname]["prefix"];
			}
			
			//根据别名切换数据库
			parent::__construct($table, $tab, "id", $pdo);
		}

	}
?>