<?php /* Smarty version 2.6.25, created on 2018-02-22 17:55:24
         compiled from side.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formaturl', 'side.tpl', 5, false),)), $this); ?>
<div id="left_box_sub">
 	<ul id="category_sub_left">
 		<?php if (( count ( $this->_tpl_vars['subcatelist'] ) > 0 )): ?>
 		<?php $_from = $this->_tpl_vars['subcatelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['categoryinfo']):
?>
		<li><a class="<?php if ($this->_tpl_vars['category']->cid == $this->_tpl_vars['categoryinfo']->cid): ?>on<?php else: ?>out<?php endif; ?>"  href="<?php echo formaturl(array('type' => 'category','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['categoryinfo']->filename), $this);?>
"><?php echo $this->_tpl_vars['categoryinfo']->name; ?>
</a></li>
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	</ul>
</div>