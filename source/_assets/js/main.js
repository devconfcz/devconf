$(document).ready(function(){
	$(".nav-link.local, .local-nav a").click(function(event){
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
		if ($(this).scrollTop() >= (window.innerHeight*0.15)) {
			$('#return-to-top').fadeIn(500);
			$('.masthead.vh-100 .navbar.fixed-top').addClass('background-purple');
		} else {
			$('#return-to-top').fadeOut(300);
			$('.masthead.vh-100 .navbar.fixed-top').removeClass('background-purple');
		}
	});
	$('#return-to-top, .home').click(function() {
		$('body,html').animate({
			scrollTop : 0         
		}, 500);
	});
});
