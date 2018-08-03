<?php
//请求信息类
namespace LFrame\net;

class Request{

    public $url; 

    public $base;

    public $method;

    public $referrer;

    public $ip;

    public $ajax;

    public $scheme;

    public function init(){

        $urlInfo = $this->getUrl(); 
        $this->urlInfo = $urlInfo;
    }

    //获取控制器和动作
    private function getUrl(){
        $url = $this->getVar("PATH_INFO", "");
        $url = str_replace("//", "/", $url);
        $urls = explode("/", $url);

        $r[1] =  $r[0] = "index";
        if(!empty($urls[1])) $r[0] = trim($urls[1]);
        if(!empty($urls[2])) $r[1] = basename(trim($urls[2]), ".html");
        if(!empty($urls[3])) $r[2] = basename(trim($urls[3]), ".html");
        return $r;
    }

    //获取server信息
    private function getVar($var, $default = '') {
        return isset($_SERVER[$var]) ? $_SERVER[$var] : $default;
    }
}
?>