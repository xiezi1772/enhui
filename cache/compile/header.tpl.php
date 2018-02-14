<?php /* Smarty version 2.6.25, created on 2018-02-14 18:07:49
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formaturl', 'header.tpl', 56, false),array('modifier', 'unserialize', 'header.tpl', 67, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<title><?php if ($this->_tpl_vars['seotitle'] != $this->_tpl_vars['sitename']): ?><?php echo $this->_tpl_vars['seotitle']; ?>
 - <?php endif; ?><?php echo $this->_tpl_vars['sitename']; ?>
</title>
<?php if ($this->_tpl_vars['seokeywords'] != "-" && $this->_tpl_vars['seokeywords'] != ""): ?>
<meta name="keywords" content="<?php echo $this->_tpl_vars['seokeywords']; ?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['seodescription'] != "-" && $this->_tpl_vars['seodescription'] != ""): ?>
<meta name="description" content="<?php echo $this->_tpl_vars['seodescription']; ?>
" />
<?php endif; ?>
<meta name="generator" content="YiqiCMS <?php echo $this->_tpl_vars['yiqi_cms_version']; ?>
" />
<meta name="author" content="SEOWHY XIAOLIANG" />
<meta name="copyright" content="copyright 2015 seowhy.com all rights reserved." />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/jq.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/js/user.js"></script>
<link href="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/css/theme.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/js/compatibility.js"></script>
<!--[if lte IE 8]>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/js/respond.js"></script>
<![endif]-->
</head>
<noscript unselectable="on" id="noscript">
    <div class="aw-404 aw-404-wrap container">
        <img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/images/404-logo.png">
        <p>你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!</p>
    </div>
</noscript>
<body>
<div class="site-header">
	<div class="navbar navbar-default">
		<div class="container">
			<div class="row">
				<div class="logo pull-left hidden-sm"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
"></a></div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<?php $this->assign('topnavlist', $this->_tpl_vars['navdata']->TakeNavigateList("顶部导航",0,10)); ?>
						<?php $_from = $this->_tpl_vars['topnavlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['navinfo']):
?>
						<li <?php if ($this->_tpl_vars['category']->name == $this->_tpl_vars['navinfo']->name): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['navinfo']->url; ?>
" title="<?php echo $this->_tpl_vars['navinfo']->name; ?>
"><?php echo $this->_tpl_vars['navinfo']->name; ?>
</a></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
					<ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
						<li><a href="<?php echo formaturl(array('type' => 'sitemap','siteurl' => $this->_tpl_vars['siteurl'],'name' => "sitemap.php"), $this);?>
">网站地图</a></li>
						<li><a href="javascript:;" onclick="AddFavorite('<?php echo $this->_tpl_vars['siteurl']; ?>
','<?php echo $this->_tpl_vars['sitename']; ?>
')">加入收藏</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="header-slide">
	<div id="slideBox" class="slideBox">
		<?php if ($this->_tpl_vars['category']->thumb): ?>
		<?php $this->assign('catethumb', ((is_array($_tmp=$this->_tpl_vars['category']->thumb)) ? $this->_run_mod_handler('unserialize', true, $_tmp) : unserialize($_tmp))); ?>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['catethumb']->image): ?>
		<div class="hd">
		</div>
		<div class="bd">
			<ul>
				<li style="background-image:url(<?php echo $this->_tpl_vars['catethumb']->image; ?>
)"><a href="<?php echo $this->_tpl_vars['catethumb']->url; ?>
"></a></li>
			</ul>
		</div>
		<?php else: ?>
		<?php $this->assign('lunbo_list', ((is_array($_tmp=$this->_tpl_vars['lunbo'])) ? $this->_run_mod_handler('unserialize', true, $_tmp) : unserialize($_tmp))); ?>
		<div class="hd">
			<?php $_from = $this->_tpl_vars['lunbo_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lunbo_info']):
?>
			<?php if ($this->_tpl_vars['lunbo_info']->active): ?>
			<a></a>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</div>
		<div class="bd">
			<ul>
				<?php $_from = $this->_tpl_vars['lunbo_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lunbo_info']):
?>
				<?php if ($this->_tpl_vars['lunbo_info']->active): ?>
				<li style="background-image:url(<?php echo $this->_tpl_vars['lunbo_info']->image; ?>
)"><a href="<?php echo $this->_tpl_vars['lunbo_info']->url; ?>
"><div class="bd_title"><?php echo $this->_tpl_vars['lunbo_info']->title; ?>
</div></a></li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<?php endif; ?>
	</div>
</div>