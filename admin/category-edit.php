<?php
require_once 'admin.inc.php';
require_once '../include/category.class.php';
$cid = $_GET["cid"];
$categorytype = $_GET['type'];
$cid = (isset($cid) && is_numeric($cid)) ? $cid : 0;

$categorydata = new Category;
$catinfo = $categorydata->GetCategory($cid);
if(!empty($catinfo->type))
{
    $categorytype = $catinfo->type;
}
if(empty($categorytype) || $categorytype=='')
{
    $categorytype="article";
}
$catinfo->thumb = unserialize($catinfo->thumb);
$action = $_POST["action"];
if($action == "save")
{
    $categoryname = $_POST["categoryname"];
    $categorydescription = $_POST["categorydescription"];
    $categoryseotitle = $_POST["categoryseotitle"];
    $categoryseokeywords = $_POST["categoryseokeywords"];
    $categoryseodescription = $_POST["categoryseodescription"];
    $categoryfilename = $_POST['categoryfilename'];
	$categorytemplets = $_POST["categorytemplets"];
	$categorytakenumber = $_POST["categorytakenumber"];
	
	if(!is_numeric($categorytakenumber))
	{
		$categorytakenumber = $catinfo->takenumber;
	}    
    if(empty($categoryname))
    {
        $categoryname = $catinfo->name;
    }
    if(empty($categorydescription))
    {
        $categorydescription = $catinfo->description;
    }
    if(empty($categoryseotitle))
    {
        $categoryseotitle = $catinfo->seotitle;
    }
    if(empty($categoryseokeywords))
    {
        $categoryseokeywords = $catinfo->seokeywords;
    }
    if(empty($categoryseodescription))
    {
        $categoryseodescription = $catinfo->seodescription;
    }
    if(empty($categoryfilename))
    {
        $categoryfilename = date("YmdHis");
    }
	$categoryfilename = str_replace(" ","-",$categoryfilename);
    $existfilename = $categorydata->ExistFilename($categoryfilename);
	if($existfilename == 1)
	{
	    if($categoryfilename != $catinfo->filename)
	    {
			if(strpos($categoryfilename,"http://")!==0)
				exit("指定的文件名已经存在");
	    }
	}
	
	if(!empty($_FILES["image"]["name"]))
	{
	    require_once("../include/upload.class.php");
		$filedirectory = YIQIROOT."/uploads/image/category";
		@mkdir($filedirectory, 0777, true);
		$filename = str_replace(' ', '-', $_FILES['image']['name']);
		if(!preg_match('/^[a-z0-9\-\_\.]+$/i',$filename)){
			$filename = time() . mt_rand(1,10000) . '.' . pathinfo($filename, PATHINFO_EXTENSION);
		}
	    $filetype = $_FILES['image']['type'];
		if(!in_array(strtolower($filetype),array("jpg","png","gif","image/jpeg","image/png","image/gif",'image/pjpeg','image/x-png'))){
			exit('图片无效，请重新选择。');
		}
		
	    $upload = new Upload;
	    $upload->set_max_size(1800000); 
	    $upload->set_directory($filedirectory);
	    $upload->set_tmp_name($_FILES['image']['tmp_name']);
	    $upload->set_file_size($_FILES['image']['size']);
	    $upload->set_file_ext($_FILES['image']['name']); 
	    $upload->set_file_type($filetype); 
	    $upload->set_file_name(str_replace('.' . $upload->user_file_ext, '', $filename));
	    $upload->start_copy();
	    if($upload->is_ok())
	    {
	        $categorythumb->image = YIQIPATH."uploads/image/category/" .$filename;
	    }
	    else
	    {
	        exit($upload->error());
	    }
	}else
	{
		$categorythumb->image = $catinfo->thumb->image;
	}
	$categorythumb->url = $_POST['thumburl'];
	$categorythumb = serialize($categorythumb);
	
	$categorytemplets = str_replace("{style}/","",$categorytemplets);
    $sql = "UPDATE yiqi_category SET name = '$categoryname',seotitle='$categoryseotitle',seokeywords='$categoryseokeywords',seodescription='$categoryseodescription',description='$categorydescription',filename = '$categoryfilename',templets = '$categorytemplets',takenumber = '$categorytakenumber',thumb = '$categorythumb' WHERE cid = '$cid'";
    $result = $yiqi_db->query(CheckSql($sql));
    if($result==1)
    {
		$genehtml = getset("urlrewrite")->value;
		if ( $genehtml == "html" ) {
			$category = $categorydata->GetCategory($cid);
			if(!$tempinfo->template_exists($category->templets)) {
				exit("没有找到文章模板,请与管理员联系!");
			}
			$curpage =1;
			$source = getcategorysource($category, $curpage);
			$total = $source['totalpage'];
			$urlparam = array( 'name' => $category->filename, 'type' => 'category', 'generatehtml' => 1, 'page'=> $curpage );
			$fileurl = formaturl($urlparam);
			$cachedata->WriteFileCache(YIQIROOT.'/'.$fileurl.'index.html', $source['source'], true);			
			while( $total > $curpage ) {
				$curpage++;
				$source = getcategorysource($category, $curpage);
				$urlparam = array( 'name' => $category->filename, 'type' => 'category', 'generatehtml' => 1, 'page'=> $curpage );
				$fileurl = formaturl($urlparam);
				$cachedata->WriteFileCache(YIQIROOT.'/'.$fileurl.'index.html', $source['source'], true);
			}
		}
        exit("分类编辑成功！");
    }
    else
    {
        exit("修改失败，请与管理员联系！");
    }
}

function getcategorysource($category, $curpage) {
	global $articledata, $productdata,$categorydata,$tempinfo;
	
	if($category->type == "article") {
		$articlecount = $articledata->GetArticleList($category->cid);
		$total = count($articlecount);
		$take = $category->takenumber;
		$skip = ($curpage - 1) * $take;
		$totalpage = (int)($total % $take == 0 ? $total / $take : $total / $take + 1);
		$articlelist = $articledata->TakeArticleList($category->cid,$skip,$take);
		$tempinfo->assign("articlelist",$articlelist);
	}
	else if($category->type == "product") {
		$productcount = $productdata->GetProductList($category->cid);
		$total = count($productcount);
		$take = $category->takenumber;
		$skip = ($curpage - 1) * $take;
		$totalpage = (int)($total % $take == 0 ? $total / $take : $total / $take + 1);
		$productlist = $productdata->TakeProductList($category->cid,$skip,$take);
		$tempinfo->assign("productlist",$productlist);
	}
	if($curpage > 1) {		
		$category->seotitle = preg_replace("/第([\d]+)页/i","",$category->seotitle). ' 第'.$curpage.'页';
	}
	$tempinfo->assign("category",$category);
	$tempinfo->assign("subcategory",$categorydata->GetSubCategory($category->cid,$category->type));

	$tempinfo->assign("take",$take);
	$tempinfo->assign("total",$total);
	$tempinfo->assign("totalpage",$totalpage);
	$tempinfo->assign("curpage",$curpage);
	$source = $tempinfo->fetch($category->templets);
	
	return array('source'=>$source,'totalpage'=>$totalpage,'curpage'=>$curpage);
}
?>
<?php
$adminpagetitle = "修改分类";
include("admin.header.php");?>
<div class="main_body">
<form id="sform" action="" method="post">
<table class="inputform" cellpadding="1" cellspacing="1">
<tr><td class="label">分类名称</td><td class="input"><input type="text" class="txt" name="categoryname" value="<?php echo $catinfo->name;?>" /></td></tr>
<tr><td class="label">分类类型</td><td class="input"><select name="categorytype">
<?php 
if($categorytype=="article")
{
    echo "<option value=\"article\">文章</option>";
}
else
{
    echo "<option value=\"product\">产品</option>";
}
?>
</select></td></tr>
<tr><td class="label">SEO标题</td><td class="input"><input type="text" class="txt" name="categoryseotitle" value="<?php echo $catinfo->seotitle;?>" /></td></tr>
<tr><td class="label">SEO关键词</td><td class="input"><input type="text" class="txt" name="categoryseokeywords" value="<?php echo $catinfo->seokeywords;?>" /></td></tr>
<tr><td class="label">SEO描述</td><td class="input"><textarea class="txt" name="categoryseodescription" style="width:200px;height:110px;"><?php echo $catinfo->seodescription;?></textarea></td></tr>
<tr><td class="label">分类介绍</td><td class="input"><textarea class="txt" name="categorydescription" style="width:200px;height:110px;"><?php echo $catinfo->description;?></textarea></td></tr>
<tr><td class="label">自定义文件名</td><td class="input"><input type="text" class="txt" name="categoryfilename" value="<?php echo $catinfo->filename;?>" />&nbsp;&nbsp;设置为http://开头，将链接到指定的地址。</td></tr>
<tr><td class="label">显示数量</td><td class="input"><input type="text" class="txt" name="categorytakenumber" value="<?php echo $catinfo->takenumber;?>" /></td></tr>
<tr><td class="label">默认模板</td><td class="input"><input type="text" class="txt" name="categorytemplets" value="{style}/<?php echo $catinfo->templets;?>" /></td></tr>
<tr><td class="label">分类广告图片</td><td class="input">图片：<input class="upfile txt" type="file" style="width:280px;" name="image" />
	<br>链接：<input type="text" class="txt" name="thumburl" value="<?php echo $catinfo->thumb->url;?>" />
	<br><?php if($catinfo->thumb){ ?>图片预览:<br /><a href="<?php echo $catinfo->thumb->url;?>" target="_blank"><img src="<?php echo $catinfo->thumb->image;?>" style="height:100px;" ></a><?php } ?></td></tr>
</table>
<div class="clear">&nbsp;</div>
<div class="inputsubmit"><input type="hidden" name="action" value="save" /><input id="submitbtn" type="submit" class="subtn" value="提交" /></div>
</form>
</div>
</div>
<script type="text/javascript">
$(function(){
	var formoptions = {
		beforeSubmit: function() {
			$("#submitbtn").val("正在处理...");
			$("#submitbtn").attr("disabled","disabled");
		},
		success: function (msg) {
			alert(msg);
			$("#submitbtn").val("提交");
			$("#submitbtn").removeAttr("disabled");
		}
	};
	$("#sform").ajaxForm(formoptions);
});
</script>
<div class="clear">&nbsp;</div>
<?php include("admin.footer.php");?>
</div>

</body>

</html>