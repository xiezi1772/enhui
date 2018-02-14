<?php
require_once 'admin.inc.php';
$lunbo = getset("lunbo")->value;
$lunbo = unserialize($lunbo);
if($_POST['id']){
	$_GET['id'] = $_POST['id'];
}
if($_GET['id']){
	$lunbo_info = $lunbo[$_GET['id']];
}
if($_GET['delid']){
	$filedirectory = YIQIROOT."/uploads/image/lunbo/";
	@unlink($filedirectory . basename($lunbo[$_GET['delid']]->image));
	unset($lunbo[$_GET['delid']]);
	$lunbo = serialize($lunbo);
	upset("lunbo",$lunbo);
    header('Location:lunbo.php');
}
$action = $_POST["action"];
if($action == "save")
{
	$savedata['title'] = $_POST["title"];
    $savedata['url'] = $_POST["url"];
    $savedata['active'] = $_POST["active"];
    $savedata['listorder'] = $_POST["listorder"];
	if(!empty($_FILES["image"]["name"]))
	{
	    require_once("../include/upload.class.php");
		$filedirectory = YIQIROOT."/uploads/image/lunbo";
		@mkdir($filedirectory, 0777, true);
		$filename = str_replace(' ', '-', $_FILES['image']['name']);
		if(!preg_match('/^[a-z0-9\-\_\.]+$/i',$filename)){
			$filename = time() . mt_rand(1,10000) . '.' . pathinfo($filename, PATHINFO_EXTENSION);
		}
	    $filetype = $_FILES['image']['type'];
		if(!in_array(strtolower($filetype),array("jpg","png","gif","image/jpeg","image/png","image/gif",'image/pjpeg','image/x-png'))){
			exit('轮播图无效，请重新选择。');
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
	        $savedata['image'] = YIQIPATH."uploads/image/lunbo/" .$filename;
	    }
	    else
	    {
	        exit($upload->error());
	    }
	}else
	{
		$savedata['image'] = $lunbo_info->image;
	}
    if($_POST["id"]){
		$savedata['id'] = $_POST["id"];
	}else{
		$savedata['id'] = time();
	}
	if(is_array($savedata)){
		$savedata = (object)$savedata;
	}
	$lunbo[$savedata->id] = $savedata;
	usort($lunbo,'sortbylistorder');
	foreach($lunbo as $key => $val){
		unset($lunbo[$key]);
		$lunbo[$val->id] = $val;
	}
    $lunbo = serialize($lunbo);
    upset("lunbo",$lunbo);
    exit("轮播图设置修改成功");
}
function sortbylistorder($a,$b){
	if ($a->listorder == $b->listorder) {
		return 0;
	} else {
		return ($a->listorder > $b->listorder) ? 1 : -1;
	}
}
?>
<?php
$adminpagetitle = "轮播图设置";
include("admin.header.php");?>
<div class="main_body">
<?php if($_GET['id'] OR $_GET['add']){ ?>
<form id="sform" action="lunbo.php" method="post">
<input type="hidden"name="action" value="save" />
<input type="hidden"name="id" value="<?php echo $lunbo_info->id;?>" />
<table class="inputform" cellpadding="1" cellspacing="1">
<tr><td class="label">标题</td><td class="input"><input type="text" class="txt" name="title" value="<?php echo $lunbo_info->title;?>" /></td></tr>
<tr><td class="label">链接</td><td class="input"><input type="text" class="txt" name="url" value="<?php echo $lunbo_info->url;?>" /></td></tr>
<tr><td class="label">图片</td><td class="input"><input class="upfile txt" type="file" style="width:280px;" name="image" /><?php if($lunbo_info->image){ ?>图片预览:<br /><a href="<?php echo $lunbo_info->image;?>" target="_blank"><img src="<?php echo $lunbo_info->image;?>" style="height:100px;" ></a><?php } ?></td></tr>
<tr><td class="label">显示</td><td class="input"><label><input type="radio" name="active" value="1" <?php if($lunbo_info->active == 1){echo 'checked';} ?>>是</label><label><input type="radio" name="active" value="0" <?php if($lunbo_info->active == 0){echo 'checked';} ?>>否</label></td></tr>
<tr><td class="label">排序</td><td class="input"><input type="text" class="txt" name="listorder" value="<?php echo $lunbo_info->listorder;?>" /></td></tr>
</table>
<div class="clear">&nbsp;</div>
<div class="inputsubmit"><input type="hidden" name="action" value="save" /><input id="submitbtn" type="submit" class="subtn" value="提交" /></div>
</form>
<?php }else{ ?>
<table class="inputform" cellpadding="1" cellspacing="1">
<tr style="background:#f6f6f6;"><td>排序</td><td>标题</td><td class="20">图片</td><td>显示</td><td>操作</td></tr>
<?php
if(count($lunbo)>0)
{
    foreach($lunbo as $val)
    {
        echo "<tr>".
			"<td>".$val->listorder."</td>".
            "<td>".$val->title."</td>".
			"<td><img src=\"".$val->image."\" height=\"50\" /></td>".
			"<td>".intval($val->active)."</td>".
            "<td><a href=\"lunbo.php?id=".$val->id."\">修改</a>&nbsp;<a href=\"lunbo.php?delid=".$val->id."\">删除</a></td>".
            "</tr>";
    } 
}
?>
</table>
<div class="clear">&nbsp;</div>
<div><a href="lunbo.php?add=1">添加轮播图</a></div>
<?php } ?>
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