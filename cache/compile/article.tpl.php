<?php /* Smarty version 2.6.25, created on 2018-02-21 13:48:55
         compiled from article.tpl */ ?>
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
  	<?php echo $this->_tpl_vars['article']->title; ?>

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
		          <div id="title_info"><?php echo $this->_tpl_vars['article']->title; ?>
</div>
	              <div id="news_content"><?php echo $this->_tpl_vars['article']->content; ?>
</div>
                  <div id="news_date"><div id="newsDate_left">发布时间：<?php echo $this->_tpl_vars['article']->adddate; ?>
</div><div id="newsDate_right"><a href="javascript:history.back(-1);">&lt; 返回 &gt;</a></div></div>
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
