@extends('_layouts.master')

@section('title')
<title>DevConf Wi-Fi Connection</title>
<style>
.container{
	opacity: 0;
	z-index: 1;
	position: absolute;
	margin: 0px auto;
	max-width: 99%;
}

.active{
	opacity: 1;
	z-index: 3;
}

h1, h2, p{
	font-size: 400%;
	text-align: left;
	padding-left: 10%;
	padding-right: 2%;
	font-family: DevConfMontserrat, Montserrat, Arial, serif;
}

p{
	padding-top: 5%;
}

h1{
	font-weight: 700;
	font-size: 450%;
}

.masthead{
	background-image: url("/assets/images/devconf-wifi-background.svg");
}
</style>
@endsection

@section('body')
<!-- Full Page Image Header with Vertically Centered Content -->
<script type="text/javascript">
    path = window.location.pathname;
    if (window.location.pathname == "" || window.location.pathname == "/") {
      switch(window.location.hostname) {
        case "devconf.cz":
	case "www.devconf.cz":
          path = "/cz";
          break;
        case "devconf.in":
	case "www.devconf.in":
          path = "/in";
          break;
        case "devconf.us":
	case "www.devconf.us":
          path = "/us";
          break;
      }
    }
    if (window.location.hostname != "www.devconf.info" && window.location.hostname != "localhost") {
       window.location.href = 'https://www.devconf.info' + path; 
    }
  </script>
<div class="h-100 w-100 d-flex flex-column">
	<header class="masthead">
		<div class="pt-5 container active h-100" time="8000">
			<div class="row" style="padding: 1% 0 9% 0">
				<img src="/assets/images/devconf-logo-cz-reverse.svg" alt="DevConf logo" class="d-inline-block" style="margin-left: 7%; width: 15vw;">
			</div>
			<h1>Wi-Fi Connection</h1>
			<h2 style="padding-top: 3%">SSID: <strong>VUTBRNO</strong></h2>
			<h2>User: <strong>devconfcz</strong></h2>
			<h2>Password: <strong>Developers2020</strong></h2>
		</div>
		<div class="container h-100" time="6000">
			<p style="padding-top: 22%">Move to the middle and <strong>use every seat</strong>.<br>The fire code says <strong class="red">NO STANDING ALLOWED</strong>.</p>
		</div>
		<div class="container h-100" time="8000">
			<p style="padding-top: 18%">Follow us on Twitter and Facebook!</p>
			<p>Use <strong class="purple">#devconf_cz #defineFUTURE #opensource</strong> for your posts!</p>
		</div>
		<div class="container h-100" time="6000">
			<p style="padding-top: 22%">Come to the final session on Sunday! You can take part in our <strong>Pop Quiz and win some interesting prizes!</strong></p>
		</div>
	</header>

	<script>
		function slideSwitch(){
			var active = $("div.container.active");
			if ( active.length == 0 ) active = $("div.container:last");

			var next =  active.next().length ? active.next() : $("div.container:first") ;
			active.addClass("last-active");
			next.css({opacity: 0.0})
			     .addClass("active")
			     .animate({opacity: 1.0}, 2000);
				   
			active.animate({opacity: 0.0},2000).removeClass("active last-active");
			setTimeout( "slideSwitch()", $(".container.active").attr("time") );
		}

		function refresh(){
			window.location="https://www.devconf.info/cz/wifi";
		}

		$(function() {
			if($(".container").length > 1){
				setTimeout( "slideSwitch()", $(".container.active").attr("time"));
				setTimeout( "refresh()", 420000);
			}
		});

	</script>
</div>
@endsection
