// JavaScript Document

$(function(){
	
	//equalheight jquery start
	$(window).bind("load", function() {
		equalHeight($(".home-student-list li"));
		equalHeight($(".mission"));
		equalHeight($(".our-program ul li h4"));
		equalHeight($(".program-list li h5"));
                equalHeight($(".rslides li img"));
                equalHeight($(".rslides li .wrapper"));
	});
	
	
	//navigation jquery start
	var widthVal = $(window).width();
	//alert(widthVal);	
		if(widthVal > 1280){
			  var hasActive = $('.nav li').children('a').hasClass('active');
				$('.nav li').hover(function() {		
						$('ul:first',this).stop(true,true).slideDown(400);
						if(hasActive == false){
							$(this).children('a').addClass('active');
						}
					},function(){
						$('ul:first',this).stop(true,true).slideUp('fast');
						if(hasActive == false){
							$(this).children('a').removeClass('active');
						}
					});
		}else{
		 
			$('.nav > li.parent-dropdown').click(function() {
				
				var hasActive = $(this).children('a').hasClass('active');
				var hasActive1 = $(this).children('a').hasClass('activeurl');
				var childUl  = $(this).children('ul').css('display');
				var hasUrl = $(this).children('a').attr('href');
				//alert(childUl);
						
			$('ul:first',this).stop(true,true).slideToggle(400);
			
			
			if(hasActive == false){
				$(this).children('a').toggleClass('active');
				return false;
			}else{
				//window.location.href = hasUrl;				
			}
			
			if(hasActive1 == false && childUl== 'none' ){
				$(this).children('a').addClass('activeurl');
				return false;
			}else{
				window.location.href = hasUrl;
			}
        });
	}
	
	
	//responsive menu jquery start
	$('.responsive').click(function(){
		var cheClass = $('.nav').hasClass('activeWidth');
			if(cheClass == false){
			$('.nav').addClass('flexnav-show')
			$('.nav').addClass('activeWidth');
			}else{
			$('.nav').removeClass('flexnav-show')
			$('.nav').removeClass('activeWidth');
		}
	});	
	
		
	//form jquery start	
	$('form input[type=text],form input[type=email],form input[type=password], form textarea').each(function(){
		var textVal = $(this).val();
		var idVal = $(this).attr('id');
		
		$('#'+idVal).focus(function(){
			if($(this).val() == textVal)
				$(this).val('');
		});
		
		$('#'+idVal).blur(function(){
			if($(this).val() == '')
				$(this).val(textVal);
		});
		
	});	
	
	
	//background jquery start
	$(window).scroll(function() {
		var makeItResponsive  = $('#testi-carousel').height();
		var widowTop = $(window).scrollTop();
		$('#countVal').html(widowTop);
			$('.testi-carousel').css('background-position', 'center '+parseInt(-widowTop / 9)+'px');
	});
	
	
	//faq accordian jquery start
	$('.faq-list li a').attr('href','javascript:void(0)');
	
	//if(widthVal > 600){
		
	$('.faq-list li a').click(function(){
		//alert("ss");
			var cheClass = $(this).next('div.faq-cont').hasClass('activeWidth');
			var cheClassA = $(this).addClass('active');
			 $('.faq-list li').children('div.faq-cont').slideUp();
			 $('.faq-list li').children('div.faq-cont').removeClass('activeWidth');
			  $('.faq-list li').children('a').removeClass('active');
			
			  if(cheClass == false){
			   $(this).next('div.faq-cont').slideDown()
			    $(this).next('div.faq-cont').addClass('activeWidth');
				$(this).addClass('active');
			  }else{
			   $(this).next('div.faq-cont').slideUp();
			   $(this).next('div.faq-cont').removeClass('activeWidth');
			   $(this).removeClass('active');
			}
			
	});
	//}else(
//		$('.faq-list li a').click(function(){
//			$(this).parent('li').children('div.faq-cont').slideToggle();
//		})
//	)
	
	
	//video iframe jquery start
	$('.play').click(function(ev){
		$(this).fadeOut();
		$("#video")[0].src += "&autoplay=1";
	});
	
	
	//carousel jquery start		 
	$('.myCarousel').jcarousel({
		auto: 0,
		wrap: 'circular',
		scroll: 1			
	});
	
	
});


$(window).resize(function() {	
			 
	$(".home-student-list li, .mission, .our-program ul li h4, .program-list li h5").css('height','auto');
			 
	equalHeight($(".home-student-list li"));
	equalHeight($(".mission"));
	equalHeight($(".our-program ul li h4"));
	equalHeight($(".program-list li h5"));
	equalHeight($(".rslides li img"));
        equalHeight($(".rslides li .wrapper"));
		
});

function equalHeight(group) {
	 var tallest = 0;
	 group.each(function() {
	 var thisHeight = jQuery(this).height();
	 if(thisHeight > tallest) {
	 tallest = thisHeight;
	 }
	 });
	 group.height(tallest);
}


var onImgLoad = function(selector, callback){
    $(selector).each(function(){
        if (this.complete || /*for IE 10-*/ $(this).height() > 0) {
            callback.apply(this);
        }
        else {
            $(this).on('load', function(){
                callback.apply(this);
            });
        }
    });
};