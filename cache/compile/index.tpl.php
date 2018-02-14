<?php /* Smarty version 2.6.25, created on 2018-02-14 18:07:49
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formaturl', 'index.tpl', 13, false),array('modifier', 'strip_tags', 'index.tpl', 54, false),array('modifier', 'truncate', 'index.tpl', 54, false),)), $this); ?>
<?php $this->assign('seotitle', $this->_tpl_vars['titlekeywords']); ?>
<?php $this->assign('seokeywords', $this->_tpl_vars['metakeywords']); ?>
<?php $this->assign('seodescription', $this->_tpl_vars['metadescription']); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="container main-content">
	<div class="company-description index-box">
		<div class="box-tit"><b class="color-red">ABOUT<span>US</span></b> 公司简介</div>
		<div class="col-xs-12"><?php echo $this->_tpl_vars['companysummary']; ?>

		</div>
	</div>
	<div class="index-box index-product">
		<div class="box-tit">
			<span class="pull-right more"><a href="<?php echo formaturl(array('type' => 'category','siteurl' => $this->_tpl_vars['siteurl'],'name' => 'default'), $this);?>
">更多</a></span>
			<div class="pull-right category-more hidden-xs">
			<?php $this->assign('productcat', $this->_tpl_vars['categorydata']->GetCategoryList(0,'product',0,'')); ?>
			<?php $_from = $this->_tpl_vars['productcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cattinfo']):
?>
			<a href="<?php echo formaturl(array('type' => 'category','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['cattinfo']->filename), $this);?>
" target="_blank"><?php echo $this->_tpl_vars['cattinfo']->name; ?>
</a>
			<?php endforeach; endif; unset($_from); ?>
			</div>
			<b class="color-red">NEWEST<span>PRODUCT</span></b> 最新产品
		</div>
		<div class="box-content">
			<?php $this->assign('productlist', $this->_tpl_vars['productdata']->TakeProductList(0,0,6)); ?>
			<?php $_from = $this->_tpl_vars['productlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['productinfo']):
?>
				<div class="col-sm-4 col-md-2 col-xs-6 product-box">
					<a href="<?php echo formaturl(array('type' => 'product','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['productinfo']->filename), $this);?>
" target="_blank">
						<div class="image-box">
							<img onload="DrawImage(this);" src="<?php echo $this->_tpl_vars['productinfo']->thumb; ?>
" title="<?php echo $this->_tpl_vars['productinfo']->name; ?>
" alt="<?php echo $this->_tpl_vars['productinfo']->name; ?>
"/>
						</div>
					</a>
					<p><a href="<?php echo formaturl(array('type' => 'product','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['productinfo']->filename), $this);?>
" target="_blank"><?php echo $this->_tpl_vars['productinfo']->name; ?>
</a></p>
				</div>
			<?php endforeach; endif; unset($_from); ?>
		</div>
		
	</div>
	<div class="index-box index-news">
		<div class="box-tit">
			<span class="pull-right more"><a href="<?php echo formaturl(array('type' => 'category','siteurl' => $this->_tpl_vars['siteurl'],'name' => 'news'), $this);?>
">更多</a></span>
			<div class="pull-right category-more hidden-xs">
			<?php $this->assign('newscat', $this->_tpl_vars['categorydata']->GetCategoryList(0,'article',0,'')); ?>
			<?php $_from = $this->_tpl_vars['newscat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['catinfo']):
?>
			<a href="<?php echo formaturl(array('type' => 'category','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['catinfo']->filename), $this);?>
" target="_blank"><?php echo $this->_tpl_vars['catinfo']->name; ?>
</a>
			<?php endforeach; endif; unset($_from); ?>
			</div>
			<b class="color-red">NEWEST<span>NEWS</span></b> 公司动态
		</div>
		<div class="col-sm-6">
			<ul>
				<?php $this->assign('newslist', $this->_tpl_vars['articledata']->TakeArticleListByName('news',0,3)); ?>
				<?php $_from = $this->_tpl_vars['newslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['newsinfo']):
?>
				<li>
					<a href="<?php echo formaturl(array('type' => 'article','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['newsinfo']->filename), $this);?>
" title="<?php echo $this->_tpl_vars['newsinfo']->title; ?>
" target="_blank"><?php echo $this->_tpl_vars['newsinfo']->title; ?>
</a>
					<p class="description"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['newsinfo']->content)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 130, "…", true) : smarty_modifier_truncate($_tmp, 130, "…", true)); ?>
<p>
				</li>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<div class="col-sm-6">
			<ul>
				<?php $this->assign('newslist', $this->_tpl_vars['articledata']->TakeArticleListByName('news',3,3)); ?>
				<?php $_from = $this->_tpl_vars['newslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['newsinfo']):
?>
				<li>
					<a href="<?php echo formaturl(array('type' => 'article','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['newsinfo']->filename), $this);?>
" title="<?php echo $this->_tpl_vars['newsinfo']->title; ?>
" target="_blank"><?php echo $this->_tpl_vars['newsinfo']->title; ?>
</a>
					<p class="description"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['newsinfo']->content)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 130, "…", true) : smarty_modifier_truncate($_tmp, 130, "…", true)); ?>
<p>
				</li>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		
	</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>