<?php /* Smarty version 2.6.25, created on 2018-02-22 17:35:13
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'formaturl', 'index.tpl', 57, false),)), $this); ?>
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
<?php echo '
<style type="text/css" media="screen">
.scroll_div{
width:965px;
margin:0px auto;
overflow:hidden;
float: left;
height:135px;
}
.scroll_div ul{width:1600px;padding:0px;margin:0px;list-style:none;}
.scroll_div li{
width:135px;
float:left;
padding-top: 0px;
padding-right: 10px;
padding-bottom: 0px;
padding-left: 10px;
text-align:center;}
.name_product{padding-top:8px;}
</style>
'; ?>

<!--middle-->
  <div id="middle_div">
  	<!--profile-->
	<div id="profile_index_div">
	  <div><a href="about_us.asp"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/images/<?php echo $this->_tpl_vars['language']; ?>
/bar_profile.gif" border="0"></a></div>
	  <div id="content"><?php echo $this->_tpl_vars['companysummary']; ?>
</div>
	  <div><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/images/<?php echo $this->_tpl_vars['language']; ?>
/link_index.gif" border="0" usemap="#Map">
      <map name="Map">
        <area shape="rect" coords="475,5,584,58" href="company_history.asp">
        <area shape="rect" coords="312,8,421,61" href="/cn/advantage.asp">
        <area shape="rect" coords="161,7,270,60" href="/cn/human_resource.asp">
        <area shape="rect" coords="10,7,119,60" href="/cn/equipment.asp">
      </map>
	</div>
	</div>
	<div id="contacts_index">
	<div id="bar"><?php if ($this->_tpl_vars['language'] == 'en'): ?>Contacts<?php else: ?>联系方式<?php endif; ?></div>
	<div id="content"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/images/contacts.jpg" width="132" height="115" align="right">
	  	<?php if ($this->_tpl_vars['language'] == 'en'): ?>Contacts:<?php else: ?>电话：<?php endif; ?><?php echo $this->_tpl_vars['companyphone']; ?>
<br>
	  	<?php if ($this->_tpl_vars['language'] == 'en'): ?>Tel:<?php else: ?>传真：<?php endif; ?><?php echo $this->_tpl_vars['companyfax']; ?>
<br>
		<?php if ($this->_tpl_vars['language'] == 'en'): ?>Addr:<?php else: ?>地址：<?php endif; ?><?php echo $this->_tpl_vars['companyaddr']; ?>
<br>
		<?php if ($this->_tpl_vars['language'] == 'en'): ?>qq:<?php else: ?>QQ： <?php endif; ?><?php echo $this->_tpl_vars['companyqq']; ?>
<br>
		<?php if ($this->_tpl_vars['language'] == 'en'): ?>Email<?php else: ?>邮箱：<?php endif; ?><?php echo $this->_tpl_vars['companyemail']; ?>
	
	</div>
	</div>
	<!--case-->
	<div id="case_index_div">
		<div id="bar"><?php if ($this->_tpl_vars['language'] == 'en'): ?>Case<?php else: ?>工程业绩<?php endif; ?></div>
		<div id="content"><div class="scroll_div" id="scroll_div_img">
    <ul id="scroll_div_img_ul">
		<?php $this->assign('productlist', $this->_tpl_vars['productdata']->TakeProductList(0,0,20)); ?>
		<?php $_from = $this->_tpl_vars['productlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['productinfo']):
?>
		<li>
			<a href=<?php if ($this->_tpl_vars['productinfo']->protype == 'images'): ?><?php echo $this->_tpl_vars['productinfo']->thumb; ?>
 rel="lightbox[plants]" <?php else: ?>"<?php echo formaturl(array('type' => 'product','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['productinfo']->filename), $this);?>
"<?php endif; ?> title="<?php echo $this->_tpl_vars['productinfo']->name; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['productinfo']->thumb; ?>
" width="135" height="112" border=0 onerror="this.src='<?php echo $this->_tpl_vars['siteurl']; ?>
/templets/<?php echo $this->_tpl_vars['templets']->directory; ?>
/images/none_347.gif'"></a><div class="name_product">
				<a href="<?php if ($this->_tpl_vars['productinfo']->protype == 'images'): ?>javascript:;<?php else: ?><?php echo formaturl(array('type' => 'product','siteurl' => $this->_tpl_vars['siteurl'],'name' => $this->_tpl_vars['productinfo']->filename), $this);?>
<?php endif; ?>" title="<?php echo $this->_tpl_vars['productinfo']->name; ?>
" target="_parent"><?php echo $this->_tpl_vars['productinfo']->name; ?>
</a>
			</div>
		</li> 
		<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<?php echo '
<script type="text/javascript"> 
function $i(id){return document.getElementById(id);}
// 横着滚动
function simpleSideScroll(c,ul,config,direction){
    this.config = config ? config : {start_delay:1000, speed: 1, delay:1000, scrollItemCount:4};
	this.c = $i(c);
	this.ul = $i(ul);
	this.direction = direction ? direction : "left";
	this.pause = false;
	this.buttonlist= new Object();
	this.delayTimeId=null;
	
	var _this = this;



	this.c.onmouseover=function(){_this.pause = true;}
	this.c.onmouseout=function(){_this.pause = false;}
	
	this.init = function() {
		_this.scrollTimeId = null;
		setTimeout(_this.start,_this.config.start_delay);
	}
	
	this.start = function() {
		var d = _this.c;
		var width = d.getElementsByTagName(\'li\')[0].offsetWidth;
		if(d.scrollWidth-d.offsetLeft>=width) _this.scrollTimeId = setInterval(_this.scroll,_this.config.speed)
	};
	
	this.scroll = function() {
		if(_this.pause)return;
		var ul= _this.ul;
		var d = _this.c;
		var width = d.getElementsByTagName(\'li\')[0].offsetWidth;
		if(_this.direction == \'left\'){
	        d.scrollLeft += 2;
	        if(d.scrollLeft%(width*_this.config.scrollItemCount)<=1){
		        if(_this.config.movecount != undefined)
			        for(var i=0;i<_this.config.movecount;i++){ul.appendChild(ul.getElementsByTagName(\'li\')[0]);}
		        else for(var i=0;i<_this.config.scrollItemCount;i++){ul.appendChild(ul.getElementsByTagName(\'li\')[0]);}
		        d.scrollLeft=0;
		        clearInterval(_this.scrollTimeId);
		        
		        _this.delayTimeId=setTimeout(_this.start,_this.config.delay);
	        }
		}
		else {
		    if(d.scrollLeft==0)
		    {
		        var lis=ul.getElementsByTagName(\'li\');
		        for(var i=0;i<_this.config.scrollItemCount;i++){
		            ul.insertBefore(lis[lis.length-1],lis[0]);
		        }
		        d.scrollLeft = width;
		    }
		    d.scrollLeft -= 2;
		    if(d.scrollLeft%(width*_this.config.scrollItemCount)<=1){
		        d.scrollLeft=0;
		        clearInterval(_this.scrollTimeId);
		        _this.delayTimeId=setTimeout(_this.start,_this.config.delay);
		    }
		}
	}
	
	this.setButton=function(id,direction){
	    if($i(id)){
	        var c=$i(id);
	        var buttonlist =_this.buttonlist;
	        if(buttonlist[id] == undefined){
	            buttonlist[id] =new Object();
	            _this.buttonlist[id][0]=c;
	            _this.buttonlist[id][1]=direction;
	            
	            c.onclick=function(){
	                 clearInterval(_this.scrollTimeId);
	                 
	                var dir=_this.buttonlist[this.id][1];
	                var d = _this.c;
	                var ul= _this.ul;
	                d.scrollLeft=0;
	                if(dir =="left")
	                {
	                    for(var i=0;i<_this.config.scrollItemCount;i++){ul.appendChild(ul.getElementsByTagName(\'li\')[0]);}
	                }
	                else{
	                    var lis=ul.getElementsByTagName(\'li\');
		                for(var i=0;i<_this.config.scrollItemCount;i++){
		                    ul.insertBefore(lis[lis.length-1],lis[0]);
		                }
	                }
	                    
	                _this.direction= dir;
	                clearTimeout(_this.delayTimeId);
	                _this.delayTimeId=setTimeout(_this.start,_this.config.delay);
	                return false;
	            }
	        }
	    }
	}
}

var cooperater_run;
function init_load(){
    if($i(\'scroll_div_img\')){
	    cooperater_run=new simpleSideScroll(\'scroll_div_img\',\'scroll_div_img_ul\',{start_delay:0, speed: 3000, delay:0, scrollItemCount:1},\'left\')
	    cooperater_run.init();
	}
}
if(window.attachEvent){
    window.attachEvent("onload",init_load);
}else if(window.addEventListener){
    window.addEventListener("load",init_load,false);
}
  </script>  
   <script type="text/javascript">

(function(){

  var str=window.location.href;

    var pid= str.match(/pid=mm_\\d{0,10}_\\d{0,10}_\\d{0,10}/i);
    //alert(pid);

    if(pid){


      pid = pid[0].split("=")[1]
      var reg=new RegExp("pid=mm_0_0_0","gmi");
      var as   =   document.getElementsByTagName("A");
      for(var   i   =   0;   i <   as.length;   i   ++){
        as[i].href=as[i].href.replace(reg,"pid="+pid);
      } 
      document.getElementById("scroll_div_img").innerHTML =document.getElementById("scroll_div_img").innerHTML.replace(reg,"pid="+pid)
   }

})();

</script>
'; ?>

		</div>
	</div>
  </div>
   <div class="clearBoth"></div>
</div>
<div style="width: 973px;margin:auto;"><?php if ($this->_tpl_vars['language'] == 'en'): ?>Links:<?php else: ?>友情链接：<?php endif; ?> 
	<?php $this->assign('linklist', $this->_tpl_vars['linkdata']->GetLinkList()); ?>
	<?php $_from = $this->_tpl_vars['linklist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['linkinfo']):
?>
	<a href="<?php echo $this->_tpl_vars['linkinfo']->url; ?>
" title="<?php echo $this->_tpl_vars['linkinfo']->title; ?>
" target="_blank"><?php echo $this->_tpl_vars['linkinfo']->title; ?>
</a>
	<?php endforeach; endif; unset($_from); ?>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>