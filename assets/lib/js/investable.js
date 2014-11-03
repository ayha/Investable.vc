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
	
	$("a.send_msg_button").click(function(e){
        e.preventDefault();
         $("#send_message_form")[0].reset();
        $("#send_message_form #action_type").val("message");
        $("#send_message_form").attr("action", $("#send_message_form #msg_action_page").val());
        $("#send_message_form #recipient_id").val($(this).data("uid"));
        $("#send_message_form").show();
       
         $("#send_message_form").parent().children(".form_message").hide();
        $.fancybox.open({
		href:"#send_message_wrapper",
		modal: false,
		closeBtn: true
		});
    });
    
    $("a.connect_button").click(function(e){
        e.preventDefault();
         $("#send_message_form")[0].reset();
        $("#send_message_form #action_type").val("connect");
        $("#send_message_form").attr("action", $("#send_message_form #connect_action_page").val());
        $("#send_message_form #recipient_id").val($(this).data("uid"));
        $("#send_message_form").show();
         $("#send_message_form").parent().children(".form_message").hide();
        $.fancybox.open({
		href:"#send_message_wrapper",
		modal: false,
		closeBtn: true
		});
    });
    
    $("a.approve_connect_button").click(function(e){
    	e.preventDefault();
    	var url=$(this).parent().parent().parent().data("url");
    	//url += "?requestid="+$(this).data("rid")+"&hash="+$(this).data("hash");
    	var send_data = {"requestid":$(this).data("rid"), "hash":$(this).data("hash")};
    	//console.log(url);
    	$.ajax(url, {
    		   cache:false,
    		   type:"POST",
    		   data: send_data,
    		   complete: function(xhr,status){
    		   	  if(status == "success"){
    		   	  	window.location.reload();
    		   	  //	consolg.log(xhr);
    		   	  }
    		   }
    			
    		});
    });
    
    $(".message_table_row").click(function(e){
    	if($(this).data("msgid") != "" && $(this).data("hash") != ""){
    		var msg_url = $(this).parent().data("load-url")+"?msgid="+$(this).data("msgid")+"&hash="+$(this).data("hash");
    		$.ajax(msg_url, {
    		   cache:false,
    		   type:"GET",
    		   complete: function(xhr,status){
    		   	  if(status == "success"){
    		   	  	msg_content = xhr.responseText;
    		   	  	$.fancybox.open({
						content: msg_content,
						modal: false,
						closeBtn: true
					});
    		   	  }
    		   }
    			
    		});
    		
    		
    	}
    	
    });
    
    $("body").on("click",".msg_reply .reply_button", function(e){
    	e.preventDefault();
    	 $("#send_message_form")[0].reset();
    	var uid = $(this).parent().parent().data("sender-id");
    	var subject = "Re: " + $(this).parent().parent().children(".msg_subject").children(".row_content").html();
    	
    	 $("#send_message_form #recipient_id").val(uid);
    	 $("#send_message_form #msg_subject").val(subject);
         $("#send_message_form").show();
         $("#send_message_form").parent().children(".form_message").hide();
        $.fancybox.open({
		href:"#send_message_wrapper",
		modal: false,
		closeBtn: true
		});
    });
    
    $("#send_message_submit").on("click", function(e){
    	e.preventDefault();
    	
    	var msg_url = $(this).parent().parent().attr("action");
    	//console.log(url);
    	var msg_from = $(this).parent().parent().children("input#sender_id").val();
    	var msg_to = $(this).parent().parent().children("input#recipient_id").val();
    	var msg_subject  = $(this).parent().parent().find("#msg_subject").val();
    	var msg = $(this).parent().parent().find("#msg_message").val();
    	var form = $(this).parent().parent();
    	$.ajax(msg_url,
    		{
    			cache: false,
    			type: 'post',
    			data: {from: msg_from, to: msg_to, subject:msg_subject, message: msg},
    			complete: function(xhr, status){
    				 
    				if(status=="success" && xhr.responseText=="1"){  //success
    				   
    				  // form.html("Message Sent.");
    				  form.hide();
    				  form.parent().children(".form_message").show();
    				}else{
    				   alert("There was a problem sending the message. Please try again.");
    				}
    			
    			}
    		})    	
    });
});

// function definitions

function scrollToSection(target_section){
	$('html, body').animate({
    scrollTop: ($("#"+target_section).offset().top-110)
    }, 800);
	
	
}



