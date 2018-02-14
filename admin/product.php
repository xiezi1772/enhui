<?php
require_once 'admin.inc.php';
require_once '../include/product.class.php';
require_once '../include/category.class.php';
require_once '../include/attach.class.php';
$attachdata = new Attach;
$cid=$_GET["cid"];
$curpage=$_GET["p"];
$cid = (isset($cid) && is_numeric($cid)) ? $cid : 0;
$curpage = (isset($curpage) && is_numeric($curpage)) ? $curpage : 1;
if($curpage<1)
{
	$curpage=1;
}
if($_POST['keyword'] OR $_POST['cid']){
	header('Location:product.php?cid='.$_POST['cid'].'&keyword='.$_POST['keyword'].'&searchtype='.$_POST['searchtype']);
}
$where = null;
if($_GET['keyword']){
	if($_GET['searchtype'] == 'content'){
		$where = 'content like \'%' . $_GET['keyword'] . '%\'';
	}else{
		$where = 'name like \'%' . $_GET['keyword'] . '%\'';
	}
}
$categoryList = $categorydata->GetCategoryList(0,'product');
$productdata = new Product;
$total = count($productdata->GetProductList($cid,"pid desc",true,$where));
$take = 20;
$skip = ($curpage - 1) * $take;
$totalpage = (int)($total % $take == 0 ? $total / $take : $total / $take + 1);
$productlist = $productdata->TakeProductList($cid,$skip,$take,"pid desc",true,$where);
$action = $_POST["action"];
if($action == "delete")
{
    $idarr = $_POST["chk"];
	if(count($idarr) > 0)
	{
		foreach($idarr as $id)
		{
			if(is_numeric($id))
			{
				$product_info = $productdata->GetProduct($id,true);
				$sql = "DELETE FROM yiqi_product WHERE pid = '$id' limit 1";
				$yiqi_db->query(CheckSql($sql));
				//删除缩略图
				$attachdata->removeAttachByItemId($id, "product");
				//remove keywords
				$keywordsdata = new Keywords;
				$keywordsdata->RemoveKeyword($product_info->seokeywords);
			}
		}
		ShowMsg("指定产品删除成功");
	}
}
?>
<?php
$adminpagetitle = "产品列表";
include("admin.header.php");?>
<div class="main_body">
<form action="product.php" method="post">
<table class="inputform" cellpadding="1" cellspacing="1">
<tr><td>搜索</td><td colspan="4" class="input">
	<select name="cid">
		<option value="0">所有分类</option>
		<?php foreach($categoryList as $key => $val){ ?>
		<option value="<?php echo $val->cid; ?>"><?php echo $val->name; ?></option>
		<?php } ?>
	</select>
	<select name="searchtype">
		<option value="title">标题</option>
		<option value="content">内容</option>
	</select>
	<input style="margin:0 10px;" type="text" name="keyword" value=""/>
	<input type="submit" class="subtn" value="搜索"/>
</td></tr>
<tr style="background:#f6f6f6;"><td class="w10">选择</td><td class="w50">产品名称</td><td class="w20">所属分类</td><td class="w10">发布状态</td><td class="w10">相关操作</td></tr>
<?php
if(count($productlist)>0)
{
    foreach($productlist as $product)
    {
        $categoryname = "";
        $categorydata = new Category;
        $categoryinfo = $categorydata->GetCategory($product->cid);
        if($categoryinfo != null)
        {
            $categoryname = $categoryinfo->name;
        }
        else
        {
            $categoryname = "未分类";
        }
		$pubstatus = '<span title="该产品已发布">已发布</span>';
		if(phpversion() > '5.1.0')
			date_default_timezone_set('Asia/Shanghai');
		if(strtotime($product->adddate) > strtotime(date("c")))
		{
			$pubstatus = "<span title=\"该产品将于：".$product->adddate."发布\">定时发布</span>";
		}
        echo "<tr>".
            "<td><input id=\"slt$product->pid\" type=\"checkbox\" name=\"chk[]\" value=\"$product->pid\" /></td>".
			"<td><a href=\"../product.php?name=".urlencode($product->filename)."\" target=\"_blank\">$product->name</a></td>".
            "<td><a href=\"product.php?cid=".$categoryinfo->cid."\">$categoryname</a></td>".
			"<td>$pubstatus</td>".
            "<td><a href=\"product-edit.php?pid=$product->pid\">修改</a></td>".
            "</tr>";
    }
} 
?>
</table>
<div class="clear">&nbsp;</div>
<div class="fl" style="text-indent:16px;"><input id="slt" type="checkbox"/>&nbsp;&nbsp;<select name="action"><option value="-">批量应用</option><option value="delete">删除</option></select>&nbsp;<input type="submit" class="subtn" value="提交" onclick="if(!confirm('确认执行相应操作?')) return false;"/></div>
<div class="fr">
<?php 
$_SERVER["QUERY_STRING"] = preg_replace("/(&)?p=[0-9]{1,3}(&)?/","",$_SERVER["QUERY_STRING"]);
echo "共${total}个产品 当前${curpage}/${totalpage}页 ";
if($curpage > 1)
{
    if($cid==0)
    {
        echo "<a href=\"product.php?p=1\">首页</a>".
        	 "&nbsp;<a href=\"product.php?p=".($curpage-1)."\">上一页</a>";
    }
    else
    {
        echo "<a href=\"product.php??cid=$cid&p=1\">首页</a>".
        	 "&nbsp;<a href=\"product.php??cid=$cid&p=".($curpage-1)."\">上一页</a>";
    }
}
if($curpage > 0 && $curpage < $totalpage)
{
    if($cid==0)
    {
        echo "&nbsp;<a href=\"product.php?p=".($curpage+1)."\">下一页</a>".
        	 "&nbsp;<a href=\"product.php?p=$totalpage\">尾页</a>";
    }
    else
    {
        echo "&nbsp;<a href=\"product.php?cid=$cid&p=".($curpage+1)."\">下一页</a>".
        	 "&nbsp;<a href=\"product.php?cid=$cid&p=$totalpage\">尾页</a>";
    }
}
?>
</div>
</form>
<div class="clear">&nbsp;</div>
<div style="color:#ff0000;font-size:14px;"><strong>提示："定时发布"的产品，只有管理员可以看到，未到发布时间不能在前台显示，正式发布后，会自动显示。<br />　　　“已发布”的产品，任何人都可正常访问。<br/></strong></div>
</div>

</div>

<div class="clear">&nbsp;</div>
<?php include("admin.footer.php");?>
</div>

</body>

</html>