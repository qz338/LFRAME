<?php
namespace app\controllers;

class Index extends Common{

    public function index(){

    	$p = empty($_GET["page"]) ? 1 : $_GET["page"];
    	$pageSize = 20;
    	//查询
    	//$list = D("Data")->calcFoundRows()->order('id desc')->page($p, $pageSize)->select()->fetchAll();
        //$pager = new \Page(D("Data")->count(), $pageSize);
		$list = [];
        $list[] = ["title"=>1, "img_url"=>"url", "brand"=>"品牌", "spec"=>"规格", "weight"=>"重量","vender"=>"可爱多","approval"=>"xxx","drug_cate"=>"处"];
		$this->assign('list', $list);
  
    }

}
?>