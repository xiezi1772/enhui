﻿<?php
require_once 'admin.inc.php';
require_once '../include/product.class.php';
require_once '../include/category.class.php';
$posttype = 'product';
$action = $_POST['action'];
if($action=='save')
{
    $productname = $_POST['productname'];
    $productcategory = $_POST['productcategory'];
    $productseotitle = $_POST["productseotitle"];
    $productkeywords = $_POST['productkeywords'];
    $productdescription = $_POST['productdescription'];
    $productcontent = $_POST['productcontent'];
    $producttemplets = $_POST['producttemplets'];
    $productfilename = $_POST['productfilename'];
	$productadddate = $_POST['productadddate'];
	$protype = $_POST['protype'];

    $productthumb = "-";
    if(empty($productname))
    {
        exit("产品名称不能为空");
    }
    if(!is_numeric($productcategory) || $productcategory < 1)
	{
	    exit("请选择正确的产品分类");
	}

	if(empty($productseotitle))
	{
	    $productseotitle = $productname;
	}
	if(empty($productkeywords))
	{
	    $productkeywords = "-";
	}
    if(empty($productdescription))
	{
	    $productdescription = "-";
	}
	if(empty($productcontent))
	{
	    $productcontent="-";
	}
	if(empty($productfilename))
	{
	    $productfilename = "-";
	}
    if($productfilename == "-")
	{
	    $productfilename = date("YmdHis");
	}
	$productfilename = str_replace(" ","-",$productfilename);
    $productdata = new Product;
    $existfilename = $productdata->ExistFilename($productfilename,true);
	if($existfilename == 1)
	{
		if(strpos($productfilename,"http://")!==0)
			exit("指定的文件名已经存在");
	}
	$producttemplets = str_replace("{style}/","",$producttemplets);
	$nowdate = date("Y-m-d H:i:s");
	if(empty($productadddate))
	{
		$productadddate = $nowdate;
	}
	
	$sql = "INSERT INTO yiqi_product (pid ,name ,cid ,seotitle ,seokeywords ,seodescription,content ,adddate ,lasteditdate,filename ,templets,status,protype)" .
		   "VALUES (NULL, '$productname', '$productcategory','$productseotitle', '$productkeywords', '$productdescription', '$productcontent', '$productadddate', '$nowdate','$productfilename', '$producttemplets', 'ok', '$protype')";
	$result = $yiqi_db->query(CheckSql($sql));
	if($result == 1)
	{
		$pid = $yiqi_db->insert_id;
		$genehtml = getset("urlrewrite")->value;
		if ( $genehtml == "html" ) {
			$product = $productdata->GetProduct($pid);
			$product->content = mixkeyword($product->content);
			$tempinfo->assign("product",$product);
			if(!$tempinfo->template_exists($product->templets)) {
				exit("没有找到文章模板,请与管理员联系!");
			}
			$source = $tempinfo->fetch($product->templets);		
			$urlparam = array( 'name' => $productfilename, 'type' => 'product', 'generatehtml' => 1 );
			$fileurl = formaturl($urlparam);
			$cachedata->WriteFileCache(YIQIROOT."/".$fileurl, $source, true);
		}
		//添加附加属性
		$idarr = $_POST["chk"];
		if(count($idarr) > 0)
		{
			foreach($idarr as $id)
			{
				$varname=$_POST["extname"];
				$varvalue=$_POST["extvalue"];
				if(is_numeric($id))
				{
					$sql = "INSERT INTO yiqi_meta (metaid,metatype,objectid,metaname,metavalue) VALUES (NULL,'$posttype','$pid','".$varname[$id]."','".$varvalue[$id]."')";					
					$yiqi_db->query(CheckSql($sql));
				}
			}
		}
		//添加附件
		$formhash = $_POST['formcode'];
		$sql = "UPDATE yiqi_attach SET item_id = '$pid', item_type = 'product' WHERE item_id = 0 AND access_key = '$formhash'";
		$yiqi_db->query(CheckSql($sql));
		$sql = "SELECT `file_location` FROM yiqi_attach WHERE item_id = '$pid' AND item_type = 'product' ORDER BY id DESC limit 1";
		$attach = $yiqi_db->get_row(CheckSql($sql));
		if($attach){
			$attach = $attach->file_location;
			$sql = "UPDATE yiqi_product SET thumb = '$attach' WHERE pid = '$pid'";
			$yiqi_db->query(CheckSql($sql));
		}
		//自动生成关键词
		if($productkeywords != "-")
		{
			$keywordsdata = new Keywords;
			$urlparam = array( 'name' => $productfilename, 'type' => $posttype);
			$fileurl = formaturl($urlparam);
			$keyword_arr = explode(',', $productkeywords);
			foreach($keyword_arr as $val){
				$keywordsdata->AddKeyword($val, $fileurl);
			}
		}
	    exit("产品添加成功！");
	}
	else
	{
	    exit("添加失败，请与管理员联系！");
	}	
}
?>
<?php
$adminpagetitle = "添加产品";
include("admin.header.php");?>
<style>
	.radio{
		vertical-align: middle;
	}
</style>
<link href="../images/cupertino/jquery-ui-1.8.4.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../images/jquery-ui-1.8.4.custom.min.js"></script>
<script type="text/javascript" src="../images/jquery.ui.datepicker-zh-CN.js"></script>
<script type="text/javascript" src="../images/jquery-ui-timepicker-addon-0.5.min.js"></script>
<script type="text/javascript" src="../images/date.format.js"></script>

<div class="main_body">
<form id="sform" action="product-add.php" method="post" enctype="multipart/form-data">
<table class="inputform" cellpadding="1" cellspacing="1">
<tr>
	<td class="label">类型</td>
	<td class="input">
	产品展示 <input type="radio" class="radio" name="protype" value="product" checked />&nbsp;&nbsp;
	图片展示 <input type="radio" class="radio" name="protype" value="images" />
	</td>
</tr>
<tr><td class="label">产品名称</td><td class="input"><input type="text" class="txt" name="productname" /></td></tr>
<tr><td class="label">所属分类</td><td class="input"><select name="productcategory">
<option value="0">请选择</option><?php
$categorydata = new Category;
$categorylist = $categorydata->GetCategoryList(0,"product");
foreach($categorylist as $category)
{
	echo "<option value=\"".$category->cid."\">".$category->name."</option>";
}
?></select></td></tr>
<tr class="status"><td class="label">SEO标题</td><td class="input"><input type="text" class="txt" name="productseotitle" /></td></tr>
<tr class="status"><td class="label">SEO关键词</td><td class="input"><input type="text" class="txt" name="productkeywords" /></td></tr>
<tr class="status"><td class="label">SEO描述</td><td class="input"><textarea class="txt" name="productdescription" style="width:200px;height:110px;"></textarea></td></tr>
<tr><td class="label">缩略图</td>
<td class="input">
			<input type="hidden" id="formhash" name="formcode" value="<?php echo md5(microtime(true)); ?>">
			<div id="uploader" class="wu-example">
                <div id="filePicker">选择图片</div>
				<div id="fileList" class="uploader-list"></div>
            </div>
</td></tr>
<tr><td class="label">发布时间</td><td class="input"><input id="pubdate" type="text" class="txt" name="productadddate" value="<?php echo date("Y-m-d H:i:s"); ?>"  />&nbsp;&nbsp;定时发布产品，该时间为北京时间。</td></tr>
<tr class="status"><td class="label">自定义文件名</td><td class="input"><input type="text" class="txt" name="productfilename" />&nbsp;&nbsp;设置为http://开头，将链接到指定的地址。</td></tr>
<tr class="status"><td class="label">默认模板</td><td class="input"><input type="text" class="txt" name="producttemplets" value="{style}/pages.tpl" /></td></tr>
<tr class="status"><td class="label">产品介绍</td><td class="input">
<textarea id="contentform" rows="1" cols="1" style="width:580px;height:360px;" name="productcontent"></textarea>
<!-- umeditor -->
	<link href="bumeditor/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" charset="utf-8" src="bumeditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="bumeditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="bumeditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
	$().ready(function() {
		// 添加类型
		$('input[name="protype"]').click(function(){
			if($(this).val() == 'images') {
				$('.status').hide();
			} else {
				$('.status').show();
			}
		})


		//加载编辑器
		// UM.getEditor('contentform');
		UE.getEditor('contentform');
		var formoptions = {
			beforeSubmit: function() {
				$("#submitbtn").val("正在处理...");
				$("#submitbtn").attr("disabled","disabled");
			},
            success: function (msg) {
                alert(msg);
				if(msg == "产品添加成功！")
				{
					$("#sform").resetForm();
					var now = new Date();
					$("#pubdate").val(now.format("yyyy-mm-dd HH:MM:ss"));
					$('#formhash').val(now.format("yyyy-mm-dd-HH:MM:ss"));
					$('#fileList').html("");
					UM.getEditor('contentform').body.innerHTML = "<p><br/></p>";
				}
				$("#submitbtn").val("提交");
				$("#submitbtn").removeAttr("disabled");
            }
        };
		$("#sform").ajaxForm(formoptions);
		$("#pubdate").datetimepicker({
			showSecond: true,
			timeFormat: 'hh:mm:ss',
			hour:<?php echo date('H');?>,
			minute:<?php echo date('i');?>,
			second:<?php echo date('s'); ?>,
			closeText:'完成',
			currentText:'当前时间'
		});		
		$("#extattr").hide();
		$('#extattrlink').toggle(function(){
				$("#extattr").show();
				$(this).text('隐藏附加属性');
			},function(){
				$("#extattr").hide();
				$(this).text('显示附加属性');
		});
		var extnum = 2;
		$("#addext").click(function(){
			$("#extattr").show();
			$("#extattrlink").text('隐藏附加属性');
			$("#exttable").append('<tr id="exttd'+extnum+'"><td class="label">附加属性'+extnum+'</td><td class="input"><input type="hidden" name="chk[]" value="'+extnum+'" />名称：<input type="text" class="txt" name="extname['+extnum+']" />&nbsp;&nbsp;值：<input type="text" class="txt" name="extvalue['+extnum+']" /> <a href="javascript:void(0);" onclick="$(this).parent().parent().remove();">删除</a></td></tr>');
			extnum++;
		});

	});
</script>
<tr class="status"><td class="label"><a id="extattrlink" href="javascript:void(0);">显示附加属性</a></td><td class="input"><a href="javascript:void(0);" id="addext" class="fr">增加一个附加属性</a></td></tr>
</table>
<div id="extattr">
<table id="exttable" class="inputform" cellpadding="1" cellspacing="1" style="margin-top:10px;">
<tr id="exttd1"><td class="label">附加属性1</td><td class="input"><input type="hidden" name="chk[]" value="1" />名称：<input type="text" class="txt" name="extname[1]" />&nbsp;&nbsp;值：<textarea class="txt" name="extvalue[1]"></textarea></td></tr>
</table>
</div>
<div class="clear">&nbsp;</div>
<div class="inputsubmit"><input type="hidden" name="action" value="save" /><input id="submitbtn" type="submit" class="subtn" value="提交" /></div>
</form>
</div>

</div>

<div class="clear">&nbsp;</div>
<?php include("admin.footer.php");?>
</div>
<script type="text/javascript" src="../images/webuploader/webuploader.min.js"></script>
<script type="text/javascript" src="../images/webuploader/upload.js"></script>
</body>

</html>