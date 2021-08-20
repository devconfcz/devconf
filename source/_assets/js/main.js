import hljs from 'highlight.js/lib/core';

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
			$('.masthead.min-vh-100 .navbar.fixed-top').addClass('background-purple');
		} else {
			$('#return-to-top').fadeOut(300);
			$('.masthead.min-vh-100 .navbar.fixed-top').removeClass('background-purple');
		}
	});
	$('#return-to-top, .home').click(function() {
		$('body,html').animate({
			scrollTop : 0         
		}, 500);
	});
	


    // Syntax highlighting
    hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'));
    hljs.registerLanguage('css', require('highlight.js/lib/languages/css'));
    hljs.registerLanguage('html', require('highlight.js/lib/languages/xml'));
    hljs.registerLanguage('javascript', require('highlight.js/lib/languages/javascript'));
    hljs.registerLanguage('json', require('highlight.js/lib/languages/json'));
    hljs.registerLanguage('markdown', require('highlight.js/lib/languages/markdown'));
    hljs.registerLanguage('php', require('highlight.js/lib/languages/php'));
    hljs.registerLanguage('scss', require('highlight.js/lib/languages/scss'));
    hljs.registerLanguage('yaml', require('highlight.js/lib/languages/yaml'));

    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightBlock(block);
    });
});


