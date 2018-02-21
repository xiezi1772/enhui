<?php
require_once 'admin.inc.php';

$action = $_POST["action"];
if($action == "save")
{
    $companyname = $_POST["companyname"];
    $companysummary = $_POST["companysummary"];
    
    if(empty($companyname))
    {
        $companyphone = getset("companyname")->value;
    }
    if(empty($companysummary))
    {
        $companysummary = getset("companysummary")->value;
    }
    
    upset("companyname",$companyname);
    upset("companysummary",$companysummary);    
    exit("修改成功");
}
?>
<?php
$adminpagetitle = "首页关于我们设置";
include("admin.header.php");?>
<div class="main_body">
<form id="sform" action="company-option.php" method="post">
<table class="inputform" cellpadding="1" cellspacing="1">
<tr><td class="label">公司名称</td><td class="input"><input type="text" class="txt" name="companyname" value="<?php echo getset("companyname")->value;?>" /></td></tr>
<tr><td class="label">关于我们<span style="color:#ff0000;">（该关于我们是网站首页的关于我们，如果你想修改详细的关于我们资料，请到文章管理-文章列表里面修改。）</span></td><td class="input">
<textarea id="contentform" rows="1" cols="1" style="width:580px;height:360px;" name="companysummary"><?php echo getset("companysummary")->value;?></textarea>
<!-- umeditor -->
	<link href="bumeditor/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" charset="utf-8" src="bumeditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="bumeditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="bumeditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
	$().ready(function() {
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
				$("#submitbtn").val("提交");
				$("#submitbtn").removeAttr("disabled");
            }
        };
		$("#sform").ajaxForm(formoptions);
	});
</script>
</td></tr>
</table>
<div class="clear">&nbsp;</div>
<div class="inputsubmit"><input type="hidden" name="action" value="save" /><input id="submitbtn" type="submit" class="subtn" value="提交" /></div>
</form>
</div>

</div>

<div class="clear">&nbsp;</div>
<?php include("admin.footer.php");?>
</div>

</body>

</html>