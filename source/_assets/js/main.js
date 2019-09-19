$(document).ready(function(){
	$(".nav-link").click(function(event){
		if(this.hash !== ""){
			event.preventDefault();
			var hash = this.hash;
			$("html,body").animate({
				scrollTop: $(hash).offset().top
			}, 800, function(){
				history.pushState(null, null, hash);
			});
		}
	});
	$(window).scroll(function() {
		if ($(this).scrollTop() >= (window.innerHeight*0.6)) {
			$('#return-to-top').fadeIn(500);
		} else {
			$('#return-to-top').fadeOut(300);
		}
	});
	$('#return-to-top').click(function() {
		$('body,html').animate({
			scrollTop : 0         
		}, 500);
	});
});
