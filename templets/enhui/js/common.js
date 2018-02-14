function checkSearch(){
 if(document.getElementById("keywords").value=="")
   {
     alert("ÇëÊäÈë¼ìË÷¹Ø¼ü×Ö");
     return;
   }
   var query = document.getElementById("keywords").value;
   var s = query;	
   location.href="products.asp?lx=search&q="+s;
}

function DownImage(ImgD,w,h){ 
    var image=new Image(); 
    image.src=ImgD.src; 
    if(image.width>0 && image.height>0){//flag=true; 
	if(image.width>w){
		if(image.height*w/image.width<=h){
           if(image.width>=w){ 
               ImgD.width=w; 
               ImgD.height=(image.height*w)/image.width; 
           }else{ 
               ImgD.width=image.width; 
               ImgD.height=image.height; 
           }
		}else{
           if(image.height>=h){ 
               ImgD.height=h; 
               ImgD.width=(image.width*h)/image.height; 
           }else{ 
               ImgD.width=image.width; 
               ImgD.height=image.height; 
           }
		}
	}else{
           if(image.height>=h){ 
               ImgD.height=h; 
               ImgD.width=(image.width*h)/image.height; 
           }else{ 
               ImgD.width=image.width; 
               ImgD.height=image.height; 
           }
	}		     
    } 
}

function goURL(str){
	var a=str;
 	window.location.href=a;
}
function LoadFlash(wmode,url,width,Height)
{ 
document.write(
'<embed src="' + url + '" wmode=' + wmode +
' quality="high" pluginspage=http://www.macromedia.com/go/getflashplayer type="application/x-shockwave-flash" width="' + width + 
'" height="' + Height + '"></embed>'); 
}
//menu 
    var isIE = document.all ? true : false;

    function showSubNav(menuID, source)
    {
        var leftPos = 0;
        var leftMiddlePos = 0;
       
       var divcontainer = document.getElementById("topNav_dropdownMenuDiv");
       if (source != "null")
       {
	        var submenus = divcontainer.getElementsByTagName("div");
            for (i = 0; i < submenus.length; i++) {
                submenus[i].style.display='none';
            }
       
	        var whereIs=getElementOffsetLocation(source);
	        //elementTop=whereIs[1];
            leftPos=whereIs[0];
            
            //This will help us center the menu under the parent menu item - no longer part of spec
            //leftMiddlePos = leftPos + (source.offsetWidth/2);
            
             //alert ("left Pos = " + leftPos);
              //alert ("left Middle Pos = " + leftMiddlePos);
            
       }
       
       var submenu;
       submenu = document.getElementById(menuID);
       //alert ("submenu = " + submenu);
       if (submenu == null)
       {
           var s;
           var submenus = document.getElementsByTagName("div");
           for (s in submenus)
           {
                //alert(submenus[s].id);
                if (submenus[s].name == menuID)
                {
                    submenu = submenus[s];
                    break;
                }    
           }
       }

       
        if (submenu != null)
        {
            submenu.style.display='block';
            if (source != "null")
            {
                var whereIsMenuStart = getElementOffsetLocation(divcontainer);
                //alert ("submenu pos = " + (leftMiddlePos - (submenu.offsetWidth/2)) + " and divcountainer pos = " + whereIsMenuStart[0]);

                //This places menu at left edge of parent menu item  
                //submenu.style.left = leftPos;
              
                //This will center the menu under the parent menu item - no longer part of spec
                //if (leftMiddlePos - (submenu.offsetWidth/2) < whereIsMenuStart[0])
                //    submenu.style.left = whereIsMenuStart[0];
                //else
                //    submenu.style.left = leftMiddlePos - (submenu.offsetWidth/2);
            }
        }
    }
    
    
    function leaveNavButton(subMenuID, topNavItem, e)
    {
        //alert ("hiding subnav");
        var menu = document.getElementById(subMenuID);
        
       if (menu == null)
       {
           var s;
           var submenus = document.getElementsByTagName("div");
           for (s in submenus)
           {
                //alert(submenus[s].id);
                if (submenus[s].name == subMenuID)
                {
                    menu = submenus[s];
                    break;
                }    
           }
       }

        if (menu != null)
        {
 	        var whereIs=getElementOffsetLocation(topNavItem);
	        var top=whereIs[1];
            var left=whereIs[0];
            var right = left + topNavItem.offsetWidth;
            var bottom = top + topNavItem.offsetHeight;
            
            var eve;
            //=e||event;
            if(!e)
            { eve = window.event;}
            else
            { eve = e;}

            var mousepositions=getMousePosition(eve);
            
            //alert ("mouse position - left: " + mousepositions[0] + ", top: " + mousepositions[1] + "menu position - left: " + left + ", right: " + right + ", top: " + top + ", bottom: " + bottom );
            
            if ( mousepositions[0] < left+15  || 
                 mousepositions[0] > right-15 || 
                // mousepositions[1] < top -15 ||
                 mousepositions[1] >bottom+50
               )
            {
                menu.style.display='none';
            }
        }
    }
    

    
    function hideSubNav(menuID, e)
    {
        //alert ("hiding subnav");
        var menu = document.getElementById(menuID);
        
       if (menu == null)
       {
           var s;
           var submenus = document.getElementsByTagName("div");
           for (s in submenus)
           {
                //alert(submenus[s].id);
                if (submenus[s].name == menuID)
                {
                    menu = submenus[s];
                    break;
                }    
           }
       }

        if (menu != null)
        {
 	        var whereIs=getElementOffsetLocation(menu);
	        var top=whereIs[1];
            var left=whereIs[0];
            var right = left + menu.offsetWidth;
            var bottom = top + menu.offsetHeight;
            
            var eve;
            //=e||event;
            if(!e)
            { eve = window.event;}
            else
            { eve = e;}

            var mousepositions=getMousePosition(eve);
            
           //alert ("mouse position - left: " + mousepositions[0] + ", top: " + mousepositions[1] + "menu position - left: " + left + ", right: " + right + ", top: " + top + ", bottom: " + bottom );
            
            if ( mousepositions[0] < left+10  || 
                mousepositions[0] > right-10 || 
               //mousepositions[1] < top + 5 || 
                mousepositions[1] >bottom-10
               )
            {
                menu.style.display='none';
            }
        }
    }
    
    
    function getMousePosition(ev)
    {
	    var _x;
	    var _y;
	    if (!isIE) {
		    _x = ev.pageX;
		    _y = ev.pageY;
	    }
	    if (isIE) {
		    _x = ev.clientX + document.body.scrollLeft;
		    _y = ev.clientY + document.body.scrollTop;
	    }
	    posX = _x;
	    posY = _y;
        var  pos=Array(posX,posY);
	    return pos;
    }

    function giveLayout(obj)
    {
	    //if this is IE, and theposition of the element is relative, give it haslayout - otherwise, calculating offset location is wrong
	    if (obj.currentStyle){ //do the hasLayout if it is relative
		    if (obj.currentStyle.position=='relative') {
			    obj.style.zoom='100%'
		    }
	    }
    }

    function getElementOffsetLocation(obj) 
    {
    //adapted from an example at quirksmode.org 
	    giveLayout(obj);
    	
	    var curleft = curtop = 0;
	    if (obj.offsetParent) {
		    curleft = obj.offsetLeft;
		    curtop = obj.offsetTop;
		    while (obj = obj.offsetParent) {
			    giveLayout(obj);
			    curleft += obj.offsetLeft
			    curtop += obj.offsetTop
		    }
	    }
    	
	    return [curleft,curtop];
    }