<?php
require_once 'include/common.inc.php';
require_once 'include/product.class.php';
require_once 'include/keywords.class.php';
session_start();

$name=$_GET["name"];
if(strpos($name,"http://")===0)
{
	header('HTTP/1.1 301 Moved Permanently');
	header("Location:".$name);
}
if(!preg_match("/^.{1,100}$/",$name))
{
    header("HTTP/1.1 404 Not Found");
	header("Status: 404 Not Found");
}

$uid = $_SESSION["adminid"];
$uid = (isset($uid) && is_numeric($uid)) ? $uid : 0;
$product = null;
if($uid > 0)
{
	$product = $productdata->GetProductByName($name,true);
}
else
{
	$product = $productdata->GetProductByName($name,false);
}
if($product == null)
{
    header("HTTP/1.1 404 Not Found");
	header("Status: 404 Not Found");
	exit('<center style="margin:50px;"><h1>404 Not Found</h1></center>');
}


$product->content = mixkeyword($product->content);

$tempinfo->assign("product",$product);

$categorylist = $categorydata->GetCategoryList(null,'product',0,'');
$category = $categorydata->GetCategory($product->cid);
$tempinfo->assign("category",$category);
if($parents = $categorydata->GetParentCategory($product->cid,$categorylist)){
	$parents = array_reverse($parents);
	foreach($parents as $key => $val){
		$tempinfo->Crumb($val->name, 'category', $val->filename);
	}
}
if(!$tempinfo->template_exists($product->templets))
{
    exit("没有找到合适的模板,请与管理员联系!");
}
$productdata->UpdateCount($product->pid);
$tempinfo->display($product->templets);
?>