<?php
    namespace app\models;

    class Model extends \Table{
        
        function __construct($table, $db_name = "web") {
            
            //初始化类
            parent::__construct(C("db")['web'], C("db")['web']["prefix"] . "cartoon");

        }
    }
?>