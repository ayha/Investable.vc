$(document).ready(function(){
	
	/* main nav animation */
	$(".navbar-nav>li>a").click(function(e){
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
});

// function definitions

function scrollToSection(target_section){
	$('html, body').animate({
    scrollTop: ($("#"+target_section).offset().top-110)
    }, 800);
	
	
}
