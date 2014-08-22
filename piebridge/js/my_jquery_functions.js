// ÎÒµÄJQueryº¯Êý

	
/*µÇÂ½ÊäÈë¿ò±³¾°ÎÄ×ÖÇÐ»»*
-------------------------------------*/	
$(document).ready(function(){
  $("input.email").keydown(function(){
    $("label.email").hide();
  });
   $("input.password").keydown(function(){
    $("label.password").hide();
  });
});

/*Tab²Ëµ¥ÏîÇÐ»»*
-------------------------------------*/	
$(document).ready(function(){
	$('#menu').tabify();
});

/*Í¼Æ¬»¥¶¯ä¯ÀÀ*
-------------------------------------*/	
$(document).ready(function(){
	$('#horiz_container_outer').horizontalScroll();
});
