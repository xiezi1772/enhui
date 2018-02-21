<?php /* Smarty version 2.6.25, created on 2018-02-21 18:17:07
         compiled from contact.tpl */ ?>
<?php $this->assign('seotitle', "联系我们"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=EFb04d2aba04d21fec7e0324cba7f40e&services=&t=20180201111639"></script>
<div id="location_div">
	<?php $_from = $this->_tpl_vars['crumb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
	<a href="<?php echo $this->_tpl_vars['cat']->url; ?>
"><?php echo $this->_tpl_vars['cat']->name; ?>
</a>  &gt; 
	<?php endforeach; endif; unset($_from); ?> 
	联系我们
</div>
  <div id="middle_div_sub">
		<div id="left_box_sub">
		 	<ul id="category_sub_left">
				<li><a class="on"  href="#">联系我们</a></li>
			</ul>
		</div>
		<div id="right_box_sub">
			<div id="title_sub"><span class="icon_red_square"></span><span class="txt">联系我们</span></div>
			<div id="article_p"><P><IMG style="WIDTH: 184px; HEIGHT: 146px" align=right src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/images/contacts.jpg" width=234 height=206><BR><FONT face=Verdana><FONT size=3><STRONG><?php echo $this->_tpl_vars['companyname']; ?>
</STRONG> <BR></FONT></FONT><FONT face=Verdana></FONT></P>
<P><FONT face=Verdana>电 话：<?php echo $this->_tpl_vars['companyphone']; ?>
</FONT></P>
<P><FONT face=Verdana>传 真：<?php echo $this->_tpl_vars['companyfax']; ?>
</FONT></P>
<P><FONT face=Verdana>地 址： <?php echo $this->_tpl_vars['companyaddr']; ?>
 <BR>公司联系人： <?php echo $this->_tpl_vars['companycontact']; ?>
<BR>邮 箱：<?php echo $this->_tpl_vars['companyemail']; ?>
</FONT></P>
<P>&nbsp;</P><DIV style="BORDER-BOTTOM: #ccc 1px solid; BORDER-LEFT: #ccc 1px solid; WIDTH: 100%; MARGIN-BOTTOM: 10px; HEIGHT: 450px; BORDER-TOP: #ccc 1px solid; BORDER-RIGHT: #ccc 1px solid" id=dituContent></DIV></div>
		</div>
	</div>
   <div class="clearBoth"></div>
 </div>

<script type="text/javascript">
	var companyname = '<?php echo $this->_tpl_vars['companyname']; ?>
';
	var lng = '<?php echo $this->_tpl_vars['lng']; ?>
';
	var lat = '<?php echo $this->_tpl_vars['lat']; ?>
';
<?php echo '
	// 百度地图API功能
	var map = new BMap.Map("dituContent");    // 创建Map实例
	var point = new BMap.Point(lng, lat);
	map.centerAndZoom(new BMap.Point(lng, lat), 11);  // 初始化地图,设置中心点坐标和地图级别
	var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});
	var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
  	var top_right_navigation = new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_PAN}); //右上角，仅包含平移和缩放按钮
	map.addControl(top_left_control);   
	map.addControl(top_left_navigation);     
    map.addControl(top_right_navigation); 
	//添加地图类型控件
	map.addControl(new BMap.MapTypeControl({
		mapTypes:[
            BMAP_NORMAL_MAP,
            BMAP_HYBRID_MAP
        ]}));	  
	map.setCurrentCity("青岛");          // 设置地图显示的城市 此项是必须设置的
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

	  var opts = {
	    position : point,    // 指定文本标注所在的地理位置
	    offset   : new BMap.Size(0,-50)    //设置文本偏移量
	  }
	  var label = new BMap.Label(companyname, opts);  // 创建文本标注对象
	    label.setStyle({
	       color : "red",
	       fontSize : "12px",
	       height : "20px",
	       lineHeight : "20px",
	       fontFamily:"微软雅黑"
	     });
	  map.addOverlay(label);   
  var marker = new BMap.Marker(point);  // 创建标注
  map.addOverlay(marker);    
            // 将标注添加到地图中
'; ?>

</script>

	<!--main end-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>