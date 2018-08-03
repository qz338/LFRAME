<?php
    namespace app\models;
    use app\models\Model;
    class CartoonModel extends Model {
        function __construct() {
            parent::__construct("cartoon");
        }
        public function test(){
            var_dump($this->select());
        }
    }
?>