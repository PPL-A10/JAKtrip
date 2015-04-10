$(document).ready(function () {

		//	$('.submenufaq > li:nth-child(2)').css("color", "#db2719");  
		//	$('.submenufaq > li:nth-child(2)').css("border-bottom", "solid 5px #db2719");
            
            $('.submenua').click(function(e){
			    $('.submenua').css("color", "#1c1c1c");
			    $('.submenua').css("padding-bottom", "");
			    $('.submenua').css("border-bottom", "");
			    $('.submenupost').css("color", "#1c1c1c");
			    $('.submenupost').css("padding-bottom", "");
			    $('.submenupost').css("border-bottom", "");
			    $('.submenusugg').css("color", "#1c1c1c");
			    $('.submenusugg').css("padding-bottom", "");
			    $('.submenusugg').css("border-bottom", "");
			    $('.submenustat').css("color", "#1c1c1c");
			    $('.submenustat').css("padding-bottom", "");
			    $('.submenustat').css("border-bottom", "");
			    $(this).css("color", "#db2719");  
			    $(this).css("padding-bottom", "15px");
			    $(this).css("border-bottom", "solid 5px #db2719");
			});

			$('.smp').click(function(e){
			    $('.submenua').css("color", "#1c1c1c");
			    $('.submenua').css("padding-bottom", "");
			    $('.submenua').css("border-bottom", "");
			    $('.smp').css("color", "");
			    $(this).css("color", "#db2719");  
			    $('.submenupost').css("color", "#db2719");  
			    $('.submenupost').css("padding-bottom", "15px");
			    $('.submenupost').css("border-bottom", "solid 5px #db2719");
			});

			$('.sms').click(function(e){
			    $('.submenua').css("color", "#1c1c1c");
			    $('.submenua').css("padding-bottom", "");
			    $('.submenua').css("border-bottom", "");
			    $('.sms').css("color", "");
			    $(this).css("color", "#db2719");  
			    $('.submenusugg').css("color", "#db2719");  
			    $('.submenusugg').css("padding-bottom", "15px");
			    $('.submenusugg').css("border-bottom", "solid 5px #db2719");
			});

			$('.smst').click(function(e){
			    $('.submenua').css("color", "#1c1c1c");
			    $('.submenua').css("padding-bottom", "");
			    $('.submenua').css("border-bottom", "");
			    $('.smst').css("color", "");
			    $(this).css("color", "#db2719");  
			    $('.submenustat').css("color", "#db2719");  
			    $('.submenustat').css("padding-bottom", "15px");
			    $('.submenustat').css("border-bottom", "solid 5px #db2719");
			});
        });
    	