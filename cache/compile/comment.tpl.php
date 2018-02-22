<?php /* Smarty version 2.6.25, created on 2018-02-22 17:57:09
         compiled from comment.tpl */ ?>
<?php if ($this->_tpl_vars['language'] == 'en'): ?>
<?php $this->assign('seotitle', 'Online Message'); ?>
<?php else: ?>
<?php $this->assign('seotitle', "在线留言"); ?>
<?php endif; ?>
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
	<?php if ($this->_tpl_vars['language'] == 'en'): ?>Online Message<?php else: ?>在线留言<?php endif; ?>
</div>
<div id="middle_div_sub">
	<div id="left_box_sub">
	 	<ul id="category_sub_left">
			<li><a class="on"  href=""><?php if ($this->_tpl_vars['language'] == 'en'): ?>Online Message<?php else: ?>在线留言<?php endif; ?></a></li>
		</ul>
	</div>
	<div id="right_box_sub">
		<div id="title_sub"><span class="icon_red_square"></span><span class="txt"><?php if ($this->_tpl_vars['language'] == 'en'): ?>Online Message<?php else: ?>在线留言<?php endif; ?></span></div>
		<div class="content">
			<form action="<?php echo $this->_tpl_vars['siteurl']; ?>
/comment.php" method="post">
			<table style="width:100%;line-height:30px;height:30px;">
				<tr><td class="w20"><?php if ($this->_tpl_vars['language'] == 'en'): ?>Title<?php else: ?>留言标题<?php endif; ?></td><td><input type="text" name="msgtitle" placeholder=""/></td></tr>
				<tr><td class="w20"><?php if ($this->_tpl_vars['language'] == 'en'): ?>Name<?php else: ?>您的姓名<?php endif; ?></td><td><input type="text" name="msgname"/></td></tr>
				<tr><td class="w20"><?php if ($this->_tpl_vars['language'] == 'en'): ?>Contacts<?php else: ?>联系方式<?php endif; ?></td><td><input type="text" name="msgcontact"/></td></tr>
				<tr><td class="w20"><?php if ($this->_tpl_vars['language'] == 'en'): ?>Message<?php else: ?>留言内容<?php endif; ?></td><td><textarea name="msgcontent" rows="10" cols="30"></textarea></td></tr>
				<tr><td class="w20"><?php if ($this->_tpl_vars['language'] == 'en'): ?>Code<?php else: ?>验证码<?php endif; ?></td><td><input type="text" name="capcode" style="width:80px;"/>&nbsp;<img style="cursor:pointer" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/captcha/captcha.php" onclick="$(this).attr('src','<?php echo $this->_tpl_vars['siteurl']; ?>
/captcha/captcha.php?d='+Date())" /></td></tr>
				<tr><td class="w20">&nbsp;</td><td><input type="hidden" name="action" value="save"/><input type="submit" value="<?php if ($this->_tpl_vars['language'] == 'en'): ?>Submit<?php else: ?>提交<?php endif; ?>" /></td></tr>
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