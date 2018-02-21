<?php
require_once 'include/common.inc.php';
require_once 'include/article.class.php';
require_once 'include/product.class.php';
require_once 'include/category.class.php';

$curpage = $_GET["p"];
$curpage = (isset($curpage) && is_numeric($curpage)) ? $curpage : 1;
if($curpage<1)
{
	$curpage=1;
}
$where = null;
if($_POST['q'] OR $_POST["type"]){
	header("Location:".siteurl()."/category.php?q=" . $_POST["q"] . "&type=".$_POST["type"]."&name=" . $_GET["name"]);
	exit();
}
if($_GET['q'] OR $_GET["name"]=='search'){
	$category->type = $type = $_GET['type'];
	$category->templets = "category.tpl";
	$category->seotitle = $category->name = '搜索：' . $_GET['q'];
	if($type == 'article'){
		$where = 'title like \'%' . $_GET['q'] . '%\'';
		$articlecount = $articledata->GetArticleList(0,"adddate desc",false,$where);
		$total = count($articlecount);
		$take = 20;
		$skip = ($curpage - 1) * $take;
		$totalpage = (int)($total % $take == 0 ? $total / $take : $total / $take + 1);
		
		$articlelist = $articledata->TakeArticleList(0,$skip,$take,"adddate desc",false,$where);
		$tempinfo->assign("articlelist",$articlelist);
	}else{
		$where = 'name like \'%' . $_GET['q'] . '%\'';
		$productcount = $productdata->GetProductList(0,"adddate desc",false,$where);
		$total = count($productcount);
		$take = 20;
		$skip = ($curpage - 1) * $take;
		$totalpage = (int)($total % $take == 0 ? $total / $take : $total / $take + 1);
		
		$productlist = $productdata->TakeProductList(0,$skip,$take,"adddate desc",false,$where);
		$tempinfo->assign("productlist",$productlist);
	}
}else{
	$name = $_GET["name"];
	if(strpos($name,"http://")===0)
	{
		header('HTTP/1.1 301 Moved Permanently');
		header("Location:".$name);
	}
	if(!preg_match("/^.{1,100}$/",$name))
	{
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
		exit();
	}
	$categorydata = new Category;
	$category = $categorydata->GetCategoryByName($name);
	if($category == null)
	{
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
		exit();
	}
	if($category->type == "article")
	{
		$articledata = new Article;
		$articlecount = $articledata->GetArticleList($category->cid);
		$total = count($articlecount);
		$take = $category->takenumber;
		$skip = ($curpage - 1) * $take;
		$totalpage = (int)($total % $take == 0 ? $total / $take : $total / $take + 1);
		$articlelist = $articledata->TakeArticleList($category->cid,$skip,$take);
		$tempinfo->assign("articlelist",$articlelist);
	}
	else if($category->type == "product")
	{
		$productdata = new Product;
		$productcount = $productdata->GetProductList($category->cid);
		$total = count($productcount);
		$take = $category->takenumber;
		$skip = ($curpage - 1) * $take;
		$totalpage = (int)($total % $take == 0 ? $total / $take : $total / $take + 1);
		$productlist = $productdata->TakeProductList($category->cid,$skip,$take);
		foreach ($productlist as $key => $pdata) {
			$hname = mb_strlen($pdata->name) > 12 ? mb_substr($pdata->name,0, 12).'...' : $pdata->name;
			$productlist[$key]->hname = $hname;
		}

		$tempinfo->assign("productlist",$productlist);
	}
	else
	{
		header("HTTP/1.1 404 Not Found");
		header("Status: 404 Not Found");
		exit();
	}
}
if($curpage > 1)
{
	$category->seotitle = $category->seotitle . ' 第'.$curpage.'页';
}
$tempinfo->assign("category",$category);
$tempinfo->assign("subcategory",$categorydata->GetSubCategory($category->cid,$category->type));
$tempinfo->assign("subcatelist",$categorydata->GetSubCategory($category->pid,$category->type));
$tempinfo->assign("take",$take);
$tempinfo->assign("total",$total);
$tempinfo->assign("totalpage",$totalpage);
$tempinfo->assign("curpage",$curpage);

if($category->pid > 0){
	$categorylist = $categorydata->GetCategoryList(null,$category->type,0,'');
	$parents = $categorydata->GetParentCategory($category->pid,$categorylist);
	$parents = array_reverse($parents);

	foreach($parents as $key => $val){
		$tempinfo->Crumb($val->name, 'category', $val->filename);
	}
}
if(!$tempinfo->template_exists($category->templets))
{
    exit("没有找到合适的模板,请与管理员联系!");
}
$tempinfo->display($category->templets);
?>