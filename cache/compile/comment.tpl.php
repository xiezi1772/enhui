<?php /* Smarty version 2.6.25, created on 2018-02-21 17:13:56
         compiled from comment.tpl */ ?>
<?php $this->assign('seotitle', "在线留言"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<style>
	/*.main{margin: 0 auto;width: 60%;}*/
	.content{padding-top: 30px;}
	textarea{resize: none}
</style>
'; ?>

<div id="location_div">
	<?php $_from = $this->_tpl_vars['crumb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
	<a href="<?php echo $this->_tpl_vars['cat']->url; ?>
"><?php echo $this->_tpl_vars['cat']->name; ?>
</a>  &gt; 
	<?php endforeach; endif; unset($_from); ?> 
	在线留言
</div>
<div id="middle_div_sub">
	<div id="left_box_sub">
	 	<ul id="category_sub_left">
			<li><a class="on"  href="">在线留言</a></li>
		</ul>
	</div>
	<div id="right_box_sub">
		<div id="title_sub"><span class="icon_red_square"></span><span class="txt">在线留言</span></div>
		<div class="content">
			<form action="<?php echo $this->_tpl_vars['siteurl']; ?>
/comment.php" method="post">
			<table style="width:100%;line-height:30px;height:30px;">
				<tr><td class="w20">留言标题</td><td><input type="text" name="msgtitle" placeholder="标题要填写"/></td></tr>
				<tr><td class="w20">您的姓名</td><td><input type="text" name="msgname"/></td></tr>
				<tr><td class="w20">联系方式</td><td><input type="text" name="msgcontact"/></td></tr>
				<tr><td class="w20">留言内容</td><td><textarea name="msgcontent" rows="10" cols="30"></textarea></td></tr>
				<tr><td class="w20">验证码</td><td><input type="text" name="capcode" style="width:80px;"/>&nbsp;<img style="cursor:pointer" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/captcha/captcha.php" onclick="$(this).attr('src','<?php echo $this->_tpl_vars['siteurl']; ?>
/captcha/captcha.php?d='+Date())" /></td></tr>
				<tr><td class="w20">&nbsp;</td><td><input type="hidden" name="action" value="save"/><input type="submit" value="提交" /></td></tr>
			</table>
			</form>
		</div>
		
	</div>
</div>
<div class="clearBoth"></div>
	<!--main end-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>