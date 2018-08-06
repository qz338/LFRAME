<?php
namespace LFrame;
class Controller{

    public $view_vars = [];
    private $is_display = 0;

    public function init($action){
        $this->{$action}();
        if(empty($is_display)) $this->display();
    }

    function __destruct() {
        //$this->display();
    }
   
    function assign($key, $val){
      $this->view_vars[$key] = $val;
    }

   //输出模板
   protected function display($path = ""){

        $this->is_display = 1;
        extract($this->view_vars);
        require_once(
            empty($path) ? 
            sprintf("%s/%s/%s%s", VIEW_PATH, __CONTROLLER__, __ACTION__, ".html")  :
            sprintf("%s/%s%s", VIEW_PATH, $path, ".html")
        );

   }
}

?>