$(document).ready(function(){
	$(".nav-link").click(function(event){
		if(this.hash !== ""){
			event.preventDefault();
			var hash = this.hash;
			$("html,body").animate({
				scrollTop: $(hash).offset().top - $('.navbar.fixed-top').outerHeight()
			}, 800, function(){
				history.pushState(null, null, hash);
			});
		}
	});
	$(window).scroll(function() {
		if ($(this).scrollTop() >= (window.innerHeight*0.6)) {
			$('#return-to-top').fadeIn(500);
			$('.masthead.vh-100 .navbar.fixed-top').addClass('background-purple');
			$('.masthead.vh-100 .nav-brand a').removeClass('d-none');
		} else {
			$('#return-to-top').fadeOut(300);
			$('.masthead.vh-100 .navbar.fixed-top').removeClass('background-purple');
			$('.masthead.vh-100 .nav-brand a').addClass('d-none');
		}
	});
	$('#return-to-top, .home').click(function() {
		$('body,html').animate({
			scrollTop : 0         
		}, 500);
	});
});
