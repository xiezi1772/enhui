<?php /* Smarty version 2.6.25, created on 2018-02-22 17:57:40
         compiled from productcategory.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formaturl', 'productcategory.tpl', 24, false),)), $this); ?>
<?php $this->assign('seotitle', $this->_tpl_vars['category']->seotitle); ?>
<?php $this->assign('seokeywords', $this->_tpl_vars['category']->seokeywords); ?>
<?php $this->assign('seodescription', $this->_tpl_vars['category']->seodescription); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "require.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <div id="location_div">
  	<?php $_from = $this->_tpl_vars['crumb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
  	<a href="<?php echo $this->_tpl_vars['cat']->url; ?>
"><?php echo $this->_tpl_vars['cat']->name; ?>
</a>  &gt; 
  	<?php endforeach; endif; unset($_from); ?> 
  	<?php echo $this->_tpl_vars['category']->name; ?>

  </div>
  
  <!--middle-->
  <div id="middle_div_sub">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "side.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="right_box_sub">
			<div id="title_sub"><span class="icon_red_square"></span><span class="txt"><?php echo $this->_tpl_vars['category']->name; ?>
</span></div>
			<div id="article_p">
		<ul class="recommendProduct_UL_02">
			<?php if (( $this->_tpl_vars['total'] > 0 )): ?>
			<?php $_from = $this->_tpl_vars['productlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['productinfo']):
?>
			<li>
				<div class="left_pic">
					<a href=<?php if ($this->_tpl_vars['productinfo']->protype == 'images'): ?><?php echo $this->_tpl_vars['productinfo']->thumb; ?>
 rel="lightbox[plants]" <?php else: ?>"<?php echo formaturl(array('type' => 'product','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['productinfo']->filename), $this);?>
"<?php endif; ?> title="<?php echo $this->_tpl_vars['productinfo']->name; ?>
" target="_blank">
						<img src="<?php echo $this->_tpl_vars['productinfo']->thumb; ?>
" width="155" height="129" border=0 onerror="this.src='<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/images/none_347.gif'"  alt="<?php echo $this->_tpl_vars['productinfo']->name; ?>
">
					</a>
					<span class="product_name" title="<?php echo $this->_tpl_vars['productinfo']->name; ?>
"><?php echo $this->_tpl_vars['productinfo']->hname; ?>
</span>
				</div>
			</li>
			<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
			<?php if ($this->_tpl_vars['language'] == 'en'): ?>No content<?php else: ?>该分类下暂时没有内容<?php endif; ?>
			<?php endif; ?>
			</ul>
			<div class="pager-links">
   			 <?php if (( $this->_tpl_vars['total'] > 0 )): ?>
   			 	<?php if (( $this->_tpl_vars['curpage'] > 1 )): ?>
   			 	<a href="<?php echo formaturl(array('type' => 'category','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['category']->filename), $this);?>
">&lt;</a>
   			 	<?php else: ?>
   			 	 &lt; 
   			 	<?php endif; ?>
   			 	<?php unset($this->_sections['page']);
$this->_sections['page']['name'] = 'page';
$this->_sections['page']['loop'] = is_array($_loop=$this->_tpl_vars['totalpage']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['page']['show'] = true;
$this->_sections['page']['max'] = $this->_sections['page']['loop'];
$this->_sections['page']['step'] = 1;
$this->_sections['page']['start'] = $this->_sections['page']['step'] > 0 ? 0 : $this->_sections['page']['loop']-1;
if ($this->_sections['page']['show']) {
    $this->_sections['page']['total'] = $this->_sections['page']['loop'];
    if ($this->_sections['page']['total'] == 0)
        $this->_sections['page']['show'] = false;
} else
    $this->_sections['page']['total'] = 0;
if ($this->_sections['page']['show']):

            for ($this->_sections['page']['index'] = $this->_sections['page']['start'], $this->_sections['page']['iteration'] = 1;
                 $this->_sections['page']['iteration'] <= $this->_sections['page']['total'];
                 $this->_sections['page']['index'] += $this->_sections['page']['step'], $this->_sections['page']['iteration']++):
$this->_sections['page']['rownum'] = $this->_sections['page']['iteration'];
$this->_sections['page']['index_prev'] = $this->_sections['page']['index'] - $this->_sections['page']['step'];
$this->_sections['page']['index_next'] = $this->_sections['page']['index'] + $this->_sections['page']['step'];
$this->_sections['page']['first']      = ($this->_sections['page']['iteration'] == 1);
$this->_sections['page']['last']       = ($this->_sections['page']['iteration'] == $this->_sections['page']['total']);
?>
   			 	<b>
   			 	<?php if ($this->_tpl_vars['curpage'] == $this->_sections['page']['iteration']): ?>
   			 	<span class="t2"> <?php echo $this->_sections['page']['iteration']; ?>
 </span>
   			 	<?php else: ?>
   			 	<a href="<?php echo formaturl(array('type' => 'category','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['category']->filename,'page' => $this->_sections['page']['iteration']), $this);?>
" class="t3"> <?php echo $this->_sections['page']['iteration']; ?>
 </a>
   			 	<?php endif; ?>
   			 	</b>
   			 	<?php endfor; endif; ?>
   			 	<?php if (( $this->_tpl_vars['curpage'] >= $this->_tpl_vars['totalpage'] )): ?>
   			 	 &gt;
   			 	<?php else: ?>
   			 	<a href="<?php echo formaturl(array('type' => 'category','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['category']->filename,'page' => $this->_sections['page']['iteration']), $this);?>
">&gt;</a>
   			 	<?php endif; ?>
   			 <?php endif; ?>
			</div>
			
		</div>
		</div>
	</div>
   <div class="clearBoth"></div>
 </div>
 <!--footer-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>