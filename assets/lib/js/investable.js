$(document).ready(function(){
	
	/* main nav animation */
	$(".navbar-nav>li>a").click(function(e){
		e.preventDefault();
		var alias = $(this).data("alias");
		scrollToSection(alias);
		$(".navbar-collapse.in").removeClass("in");
		return false;
		
		
	});
	
	$(".home_news_row").click(function(e){
		var url = $(this).data("url");
		window.location.href=url;
		
	});
	
	$(".faq_item").click(function(e){
		$(this).toggleClass("active");
	});
	/*
	$(".navbar-signin a#join-us").click(function(e){
		e.preventDefault();
		$.fancybox.open({
			href:"#register_form_wrapper",
			modal: false,
			closeBtn:true
			
			 
		});
		
	});*/
	
	$(".navbar-signin a#login").click(function(e){
		e.preventDefault();
		$.fancybox.open({
			href:"#login_form_wrapper",
			modal: false,
			closeBtn:true
			
			
		});
	});
});

// function definitions

function scrollToSection(target_section){
	$('html, body').animate({
    scrollTop: ($("#"+target_section).offset().top-110)
    }, 800);
	
	
}
