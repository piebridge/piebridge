// �ҵ�JQuery����

	
/*��½����򱳾������л�*
-------------------------------------*/	
$(document).ready(function(){
  $("input.email").keydown(function(){
    $("label.email").hide();
  });
   $("input.password").keydown(function(){
    $("label.password").hide();
  });
});

/*Tab�˵����л�*
-------------------------------------*/	
$(document).ready(function(){
	$('#menu').tabify();
});

/*ͼƬ�������*
-------------------------------------*/	
$(document).ready(function(){
	$('#horiz_container_outer').horizontalScroll();
});
