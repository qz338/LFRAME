<?php
namespace LFrame;
class Controller{

    public $view_vars = [];
  
    public function init($action){
        $this->{$action}();
        $this->display();
    }

    function __destruct() {
        //$this->display();
    }
   
    function assign($key, $val){
      $this->view_vars[$key] = $val;
    }

   //输出模板
   protected function display($path = ""){
        extract($this->view_vars);
        require_once(
            empty($path) ? 
            sprintf("%s/%s/%s%s", VIEW_PATH, __CONTROLLER__, __ACTION__, ".html")  :
            sprintf("%s/%s%s", VIEW_PATH, $path, ".html")
        );
        exit();
   }
}

?>