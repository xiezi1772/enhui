<?php /* Smarty version 2.6.25, created on 2018-02-22 17:47:50
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formaturl', 'header.tpl', 66, false),array('modifier', 'unserialize', 'header.tpl', 77, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title><?php if ($this->_tpl_vars['seotitle']): ?><?php echo $this->_tpl_vars['seotitle']; ?>
 - <?php echo $this->_tpl_vars['sitename']; ?>
<?php else: ?><?php echo $this->_tpl_vars['sitename']; ?>
<?php endif; ?></title>
<?php if ($this->_tpl_vars['seokeywords'] != "-" && $this->_tpl_vars['seokeywords'] != ""): ?>
<meta name="keywords" content="<?php echo $this->_tpl_vars['seokeywords']; ?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['seodescription'] != "-" && $this->_tpl_vars['seodescription'] != ""): ?>
<meta name="description" content="<?php echo $this->_tpl_vars['seodescription']; ?>
" />
<?php endif; ?>
 <!--[if IE 6]>
		<script src="js/pngAlaph.js"></script>
		<script>
			DD_belatedPNG.fix("*");
		</script>
<![endif]-->
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/js/common.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/js/unslider.min.js"></script>

<style type=text/css media=all>
	@import url(<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/css/main.css);
</style>
</head>
<body>
<div id="main_div">
	<div id="top_div">
		<div id="logo"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/images/logo.gif"></div>
		<div id="hotline"></div><div id="selectlanguage"><ul><li><span class="icon"></span><span class="txt"><a href="language.php?l=cn">中文</a></span></li><li><span class="icon"></span><span class="txt"><a href="language.php?l=en">English</a></span></li></ul></div>
	</div>
	<!--menu-->
	<div id="menu_div">
	<?php $this->assign('topnavlist', $this->_tpl_vars['navdata']->TakeNavigateList("顶部导航",0,7)); ?>
  <ul>
     <li class="first_node"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
" <?php if ($this->_tpl_vars['route'] == $this->_tpl_vars['siteurl']): ?>class="current"<?php endif; ?> ><?php if ($this->_tpl_vars['language'] == 'en'): ?>Home<?php else: ?>首&nbsp;页<?php endif; ?></a></li>
     <?php $_from = $this->_tpl_vars['topnavlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['n1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['n1']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['navinfo']):
        $this->_foreach['n1']['iteration']++;
?>
     <?php $this->assign('existcategory', $this->_tpl_vars['categorydata']->ExistCategory($this->_tpl_vars['navinfo']->catid)); ?>
     <?php $this->assign('existsubcategory', $this->_tpl_vars['categorydata']->ExistSubCategory($this->_tpl_vars['navinfo']->catid)); ?>
     <?php if ($this->_tpl_vars['navinfo']->catid > 0 && $this->_tpl_vars['existcategory'] && $this->_tpl_vars['existsubcategory']): ?>
  	 <li class="line_node">&nbsp;</li>
  	 <li>
      <?php $this->assign('existchildcategory', $this->_tpl_vars['categorydata']->ExistChildCategory($this->_tpl_vars['category']->cid,$this->_tpl_vars['navinfo']->catid)); ?>
  	 	<a href="<?php echo $this->_tpl_vars['navinfo']->url; ?>
" <?php if ($this->_tpl_vars['category']->cid == $this->_tpl_vars['navinfo']->catid || $this->_tpl_vars['existchildcategory']): ?>class="current"<?php endif; ?> title="<?php echo $this->_tpl_vars['navinfo']->name; ?>
" onmouseover='showSubNav("topNav_subMenu<?php echo ($this->_foreach['n1']['iteration']-1); ?>
",this);' onmouseout='leaveNavButton("topNav_subMenu<?php echo ($this->_foreach['n1']['iteration']-1); ?>
",this,event);'><?php echo $this->_tpl_vars['navinfo']->name; ?>
</a>
  	 </li>
  	 <?php else: ?>
  	 <li class="line_node">&nbsp;</li>
     <li><a href="<?php echo $this->_tpl_vars['navinfo']->url; ?>
" title="<?php echo $this->_tpl_vars['navinfo']->name; ?>
"<?php if ($this->_tpl_vars['route'] == $this->_tpl_vars['navinfo']->url): ?>class="current"<?php endif; ?> ><?php echo $this->_tpl_vars['navinfo']->name; ?>
</a></li>
  	 <?php endif; ?>
  	 <?php endforeach; endif; unset($_from); ?>
  </ul>
  </div>
  <div id=topNav_dropdownMenuDiv>
 	<?php $_from = $this->_tpl_vars['topnavlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['n2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['n2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['navinfos']):
        $this->_foreach['n2']['iteration']++;
?>
 	<?php $this->assign('existcategory', $this->_tpl_vars['categorydata']->ExistCategory($this->_tpl_vars['navinfos']->catid)); ?>
 	<?php $this->assign('existsubcategory', $this->_tpl_vars['categorydata']->ExistSubCategory($this->_tpl_vars['navinfos']->catid)); ?>
 	<?php if ($this->_tpl_vars['navinfos']->catid > 0 && $this->_tpl_vars['existcategory'] && $this->_tpl_vars['existsubcategory']): ?>
	<?php $this->assign('subcategory', $this->_tpl_vars['categorydata']->GetSubCategory($this->_tpl_vars['navinfos']->catid,$this->_tpl_vars['existsubcategory'],'displayorder desc')); ?>
	<DIV style="DISPLAY: none" id=topNav_subMenu<?php echo ($this->_foreach['n2']['iteration']-1); ?>
 class=subMenuDiv 
      onmouseout="hideSubNav('topNav_subMenu<?php echo ($this->_foreach['n2']['iteration']-1); ?>
', event)" name="topNav_subMenu<?php echo ($this->_foreach['n2']['iteration']-1); ?>
">
	   <TABLE width="100%" border="0" cellpadding="0" cellspacing="0">
        <TBODY>
        <TR>
          <TD class=subMenuCell>
          	<?php $_from = $this->_tpl_vars['subcategory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subInfo']):
?>
          	<SPAN class=L2Grey><a href='<?php echo formaturl(array('type' => 'category','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['subInfo']->filename), $this);?>
'><?php echo $this->_tpl_vars['subInfo']->name; ?>
</a></SPAN>
          	<?php endforeach; endif; unset($_from); ?>
          </TD>
      	</TR>
      	</TBODY>
  	  </TABLE>
    </DIV>
	<?php endif; ?>
 	<?php endforeach; endif; unset($_from); ?>
  </div>
  <div id="banner_div">
    <?php $this->assign('lunbo_list', ((is_array($_tmp=$this->_tpl_vars['lunbo'])) ? $this->_run_mod_handler('unserialize', true, $_tmp) : unserialize($_tmp))); ?>
    <ul>
    <?php $_from = $this->_tpl_vars['lunbo_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lunbo_info']):
?>
    <li><a href="<?php if ($this->_tpl_vars['lunbo_info']->url): ?><?php echo $this->_tpl_vars['lunbo_info']->url; ?>
<?php else: ?>javascript:;<?php endif; ?>"><img src="<?php echo $this->_tpl_vars['lunbo_info']->image; ?>
"></a></li>
    <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>

<?php echo '
<script>
  $(\'#banner_div\').unslider({
    dots: true,
    fluid: true
  });
</script>
'; ?>


