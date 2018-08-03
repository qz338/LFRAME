<?php
namespace LFrame;
class Controller{

    public function init($action){
        $this->{$action}();
        $this->display();
    }

    function __destruct() {
        //$this->display();
   }
   
   //输出模板
   protected function display($path = ""){
        
        require_once(
            empty($path) ? 
            sprintf("%s/%s/%s%s", VIEW_PATH, __CONTROLLER__, __ACTION__, ".html")  :
            sprintf("%s/%s%s", VIEW_PATH, $path, ".html")
        );
   }
}

?>