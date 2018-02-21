<?php /* Smarty version 2.6.25, created on 2018-02-21 13:48:51
         compiled from articlecategory.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formaturl', 'articlecategory.tpl', 18, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
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
			<ul class="news_UL_3">
			<?php if (( $this->_tpl_vars['total'] > 0 )): ?>
       			<?php $_from = $this->_tpl_vars['articlelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['artinfo']):
?> 
				<li>
				<div class="title"><span class="icon">&nbsp;</span><span class="title_news"><a href="<?php echo formaturl(array('siteurl' => $this->_tpl_vars['siteurl'],'type' => 'article','name' => $this->_tpl_vars['artinfo']->filename), $this);?>
" title="<?php echo $this->_tpl_vars['artinfo']->title; ?>
"><?php echo $this->_tpl_vars['artinfo']->title; ?>
</a></span><span class="date"><?php echo $this->_tpl_vars['artinfo']->adddate; ?>
</span></div>
				</li>
				<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
				<li>该分类下暂时没有内容</li>
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