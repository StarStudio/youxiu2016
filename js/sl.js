$(function() {
	jQuery.focus = function(slid) {
		var sWidth = $(slid).width();
		var len = $(slid).find("ul li").length; 
		var index = 0;
		var picTimer;
		
		
		var btn = "<div class='btnBg'></div><div class='btn'>";
		for(var i=0; i < len; i++) {
			var ii = i+1;
			btn += "<span>"+ii+"</span>";
		}
		$(slid).append(btn);
		$(slid).find("div.btnBg").css("opacity",0.5);
	
		
		$(slid+" div.btn span").css("opacity",0.4).mouseenter(function() {
			index = $(slid+" .btn span").index(this);
			showPics(index);
		}).eq(0).trigger("mouseenter");
	
		
		$(slid+" .preNext").css("opacity",0.2).hover(function() {
			$(this).stop(true,false).animate({"opacity":"0.5"},300);
		},function() {
			$(this).stop(true,false).animate({"opacity":"0.2"},300);
		});
	
	
		$(slid+" .pre").click(function() {
			index -= 1;
			if(index == -1) {index = len - 1;}
			showPics(index);
		});
	
	
		$(slid+" .next").click(function() {
			index += 1;
			if(index == len) {index = 0;}
			showPics(index);
		});
	
		
		$(slid+" ul").css("width",sWidth * (len));
		
	
		$(slid).hover(function() {
			clearInterval(picTimer);
		},function() {
			picTimer = setInterval(function() {
				showPics(index);
				index++;
				if(index == len) {index = 0;}
			},4000);
		}).trigger("mouseleave");
		
		
		function showPics(index) {
			var nowLeft = -index*sWidth; 
			$(slid+" ul").stop(true,false).animate({"left":nowLeft},300); 
			$(slid+" .btn span").removeClass("on").eq(index).addClass("on"); 
			$(slid+" .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); 
		}
	
	};
	
});
	
		var speed=20; 
		var tab=document.getElementById("rollpic");
		var tab1=document.getElementById("rollpic1");
		var tab2=document.getElementById("rollpic2");
		tab2.innerHTML=tab1.innerHTML;
		function Marquee(){
		if(tab2.offsetWidth-tab.scrollLeft<=0)
		tab.scrollLeft-=tab1.offsetWidth
		else{
		tab.scrollLeft++;
		}
		}
		var MyMar=setInterval(Marquee,speed);
		tab.onmouseover=function() {clearInterval(MyMar)};
		tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};


function drChange(){
	 document.getElementById("drchange").onclick=function(){
        document.getElementById("dr").innerHTML='<iframe src="dream2.php" height="763" width="1016" scrolling="no" ></iframe>';
     	 document.getElementById('drback').style.display="block";
     	document.getElementById('drchange').style.display="none";
    }
}	
function drBack(){
	document.getElementById("drback").onclick=function(){
        document.getElementById("dr").innerHTML='<iframe src="dream.php" height="763" width="1016" scrolling="no" ></iframe>';
     	 document.getElementById('drchange').style.display="block";
     	 document.getElementById('drback').style.display="none";
     	    	
}
}

function grChange(){
	 document.getElementById("grchange").onclick=function(){
        document.getElementById("gr").innerHTML='<iframe src="group2.php" height="763" width="1016" scrolling="no" ></iframe>';
     	 document.getElementById('grback').style.display="block";
     	 document.getElementById('grchange').style.display="none";

    }
}	
function grBack(){
	document.getElementById("grback").onclick=function(){
        document.getElementById("gr").innerHTML='<iframe src="group.php" height="763" width="1016" scrolling="no" ></iframe>';
     	 document.getElementById('grchange').style.display="block";
     	 document.getElementById('grback').style.display="none";
     	    	
}
}

window.onload=function(){
 
   grChange();
   drChange();
   grBack();
   drBack();
}
$(document).ready(function(){
		  	$.focus("#focus001");
		});