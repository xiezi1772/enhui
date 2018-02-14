<?php /* Smarty version 2.6.25, created on 2018-02-14 18:07:49
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formaturl', 'footer.tpl', 27, false),)), $this); ?>
<div class="page-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 friend-link">
				<div class="box-tit">友情链接</div>
				<div class="box-content">
					<ul>
						<?php $this->assign('linklist', $this->_tpl_vars['linkdata']->GetLinkList()); ?>
						<?php $_from = $this->_tpl_vars['linklist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['linkinfo']):
?>
							<li><a href="<?php echo $this->_tpl_vars['linkinfo']->url; ?>
" title="<?php echo $this->_tpl_vars['linkinfo']->title; ?>
" target="_blank"><?php echo $this->_tpl_vars['linkinfo']->title; ?>
</a></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
			</div>
			<div class="col-sm-4 common-link">
				<div class="box-tit">常见导航</div>
				<div class="box-content">
					<ul>
						<?php $this->assign('footnavlist', $this->_tpl_vars['navdata']->TakeNavigateList("次导航",0,10)); ?>
						<?php $_from = $this->_tpl_vars['footnavlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['navinfo']):
?>
							<li><a href="<?php echo $this->_tpl_vars['navinfo']->url; ?>
" title="<?php echo $this->_tpl_vars['navinfo']->name; ?>
"><?php echo $this->_tpl_vars['navinfo']->name; ?>
</a></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
			</div>
			<div class="col-sm-4 company-info">
				<div class="box-tit"><span class="pull-right more"><a href="<?php echo formaturl(array('type' => 'article','siteurl' => $this->_tpl_vars['siteurl'],'name' => 'contact'), $this);?>
">更多</a></span>公司信息</div>
				<div class="box-content">
					<ul>
						<?php if ($this->_tpl_vars['companycontact'] != "" && $this->_tpl_vars['companycontact'] != "-"): ?>
						<li><i class="glyphicon glyphicon-user"></i>联系人：<?php echo $this->_tpl_vars['companycontact']; ?>
</li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['companyaddr'] != "" && $this->_tpl_vars['companyaddr'] != "-"): ?>
						<li><i class="glyphicon glyphicon-map-marker"></i>地址：<?php echo $this->_tpl_vars['companyaddr']; ?>
</li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['companyqq'] != "" && $this->_tpl_vars['companyqq'] != "-"): ?>
						<li><i class="glyphicon glyphicon-phone"></i>Q&nbsp; Q：<?php echo $this->_tpl_vars['companyqq']; ?>
</li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['companyphone'] != "" && $this->_tpl_vars['companyphone'] != "-"): ?>
						<li><i class="glyphicon glyphicon-phone-alt"></i>电话：<?php echo $this->_tpl_vars['companyphone']; ?>
</li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['companyemail'] != "" && $this->_tpl_vars['companyemail'] != "-"): ?>
						<li><i class="glyphicon glyphicon-envelope"></i>邮箱：<?php echo $this->_tpl_vars['companyemail']; ?>
</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<center class="copyright">
		<?php echo $this->_tpl_vars['sitecopy']; ?>
 Powered by <a href="http://www.yiqicms.com/" target="_blank">YiqiCMS</a>-<a href="http://www.seowhy.com/" target="_blank">SEOWHY</a></div>
		<?php if ($this->_tpl_vars['siteicp'] != "-" && $this->_tpl_vars['siteicp'] != ""): ?>
		<div class="fr"><?php echo $this->_tpl_vars['siteicp']; ?>
</div>
		<?php endif; ?>
	</center>
	
	<div style="display:none"><?php echo $this->_tpl_vars['sitestat']; ?>
</div>
</div>
</body>
</html>