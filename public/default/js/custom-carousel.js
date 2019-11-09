// JavaScript Document

$(window).load(function(){
	
	//alert('dbsjb');
	var $j = jQuery.noConflict();
	
	
	//navigation jquery start
	var widthVal = $j(window).width();
	//alert(widthVal);	
		if(widthVal > 1024){
			  var hasActive = $j('.nav li').children('a').hasClass('active');
				$j('.nav li').hover(function() {
					//alert(hasActive);		
						$j('ul:first',this).stop(true,true).slideDown(400);
						if(hasActive === false){
							//alert('sfgsafjsa');
							$j(this).children('a').addClass('active');
						}else{
							
							$j(this).children('a').removeClass('active');
							}
					},function(){
						$j('ul:first',this).stop(true,true).slideUp('fast');
						if(hasActive == false){
							$j(this).children('a').removeClass('active');
						}
					});
		}else{
		 
			$j('.nav > li.parent-dropdown').click(function() {
				
				var hasActive = $j(this).children('a').hasClass('active');
				var hasActive1 = $j(this).children('a').hasClass('activeurl');
				var childUl  = $j(this).children('ul').css('display');
				var hasUrl = $j(this).children('a').attr('href');
				//alert(childUl);
						
			$j('ul:first',this).stop(true,true).slideToggle(400);
			
			
			if(hasActive == false){
				$j(this).children('a').toggleClass('active');
				return false;
			}else{
				//window.location.href = hasUrl;				
			}
			
			if(hasActive1 == false && childUl== 'none' ){
				$j(this).children('a').addClass('activeurl');
				return false;
			}else{
				window.location.href = hasUrl;
			}
        });
	}
	
	
	//responsive menu jquery start
	$j('.responsive').click(function(){
		var cheClass = $j('.nav').hasClass('activeWidth');
			if(cheClass == false){
			$j('.nav').addClass('flexnav-show')
			$j('.nav').addClass('activeWidth');
			}else{
			$j('.nav').removeClass('flexnav-show')
			$j('.nav').removeClass('activeWidth');
		}
	});	
	
	
	//faq accordian jquery start
	$j('.faq-list li a').attr('href','javascript:void(0)');
	
	//if(widthVal > 600){
		
	$j('.faq-list li a').click(function(){
		//alert("ss");
			var cheClass = $j(this).next('div.faq-cont').hasClass('activeWidth');
			var cheClassA = $j(this).addClass('active');
			 $j('.faq-list li').children('div.faq-cont').slideUp();
			 $j('.faq-list li').children('div.faq-cont').removeClass('activeWidth');
			  $j('.faq-list li').children('a').removeClass('active');
			
			  if(cheClass == false){
			   $j(this).next('div.faq-cont').slideDown()
			    $j(this).next('div.faq-cont').addClass('activeWidth');
				$j(this).addClass('active');
			  }else{
			   $j(this).next('div.faq-cont').slideUp();
			   $j(this).next('div.faq-cont').removeClass('activeWidth');
			   $j(this).removeClass('active');
			}
			
	});
	//}else(
//		$j('.faq-list li a').click(function(){
//			$j(this).parent('li').children('div.faq-cont').slideToggle();
//		})
//	)
	
	
});

