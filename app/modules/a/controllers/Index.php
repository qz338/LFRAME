<?php
namespace app\modules\a\controllers;
//调用框架
use LFrame\Controller;

class Index extends Controller {

    public function index(){
        echo D("Cartoon")->insert(
            [
            "name" =>  "海贼王",
            "spider_url" => "http://api.ishuhui.com/cartoon/book_ish/ver/fe467083/id/1.json",
            "cartoon_list_url" => "http://www.ishuhui.com/cartoon/book/1",
            ]
        );
     exit();
    }

}
?>