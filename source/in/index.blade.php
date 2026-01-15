@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.IN">
<meta property="og:site_name" content="DevConf.IN">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-in-social.png">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-in-social.png">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/site.css', 'assets/build') }}">
<link rel="stylesheet" href="{{ mix('css/timeline.css', 'assets/build') }}">
@endsection

@section('title')
<title>DevConf.IN 2026</title>
@endsection


@section('body')
<header class="masthead min-vh-100">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top">
		<span class="nav-brand"><a href="#" class="home"><img src="/assets/images/devconf-logo-in-reverse.svg" alt="DevConf logo"></a></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="#about" class="nav-link local">About</a>
				</li>
				<li class="nav-item active px-3">
                    <a href="#registration" class="nav-link local">Registration</a>
                </li>
                <li class="nav-item active px-3">
                    <a href="#topics" class="nav-link local">Topics</a>
                </li>
				<li class="nav-item active px-3">
					<a href="#news" class="nav-link local">News</a>
				</li>
			    <li class="nav-item active px-3">
					<a href="/in/faq" class="nav-link local">FAQ</a>
				</li>
				<li class="nav-item active px-3">
					<a href="#hotels" class="nav-link local">Hotels</a>
				</li>
    			<li class="nav-item active px-3">
					<a href="/in/schedule" class="nav-link local">Schedule</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/coc" class="nav-link local" target="_blank">Policies</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="row mr-0 mt-5" style="height: 85%">
		<div class="col-lg-1 border-right text-center pr-0">
			<a href="mailto:info@devconf.in" target="_blank" title="Mail"><img src="/assets/images/mail.svg" alt="mail" class="social-icon"></a>
            <a href="https://www.instagram.com/devconfindia/" target="_blank" title="Instagram"><img src="/assets/images/instagram.svg" alt="instagram" class="social-icon"></a>
			<a href="https://www.linkedin.com/company/devconf-in/" target="_blank" title="LinkedIn"><img src="/assets/images/linkedin.svg" alt="linkedin" class="social-icon"></a>
			<a href="https://matrix.to/#/#2026.in:devconf.cz" target="_blank" title=""><img src="/assets/images/matrix.svg" alt="matrix" class="social-icon"></a>
			<a href="https://www.youtube.com/channel/UCmYAQDZIQGm_kPvemBc_qwg" target="_blank" title="YouTube"><img src="/assets/images/youtube.svg" alt="youtube" class="social-icon"></a>
			<a href="https://github.com/devconfcz/devconf" target="_blank" title="Git Hub"><img src="/assets/images/github.svg" alt="github" class="social-icon"></a>
		</div>
		<div class="col-lg-10 h-100 px-0">
                	<div style="padding: 5% 0 0 0">
                        	<img src="/assets/images/devconf-logo-in-reverse.svg" alt="DevConf logo" class="text-logo">
                        	<img src="/assets/images/devconf-abstract.svg" alt="DevConf abstract logo" class="abstract-logo">
                        </div>
			<div class="heading-text mont-400 h5 pb-5">
				open source community conference
			</div>
			<div class="heading-text mont-700 h1 pt-3">
				February 13 - 14, 2026
			</div>
			<div class="heading-text mont-700 h4">
				<i class="fa fa-map-marker"></i> MIT World Peace University (MIT WPU), Pune
			</div>
			<div class="heading-text pt-5 mt-2">
                <a href="/in/schedule" target="_blank" class="nav-link local border p-3 h2 mont-700" style="border-width: 3px !important;">SCHEDULE</a>
            </div>
            <!--<div class="heading-text mt-2">
                <a href="https://photos.app.goo.gl/me2XZqLYQ3LGKgTDA" target="_blank" class="nav-link local border p-3 h2 mont-700" style="border-width: 3px !important;">2025 PHOTOS</a>
            </div>
            <div class="heading-text mont-400 h5 pb-2 pb-lg-2">
                 Submit your proposals by November 21, 2025. 
            </div>-->
           
		</div>
	</div>
</header>

<section id="about" class="mx-auto col-lg-11">
	<div class="row mt-4 py-5">
		<div class="col-lg-4 mx-5 mb-5 text-center">
			<img src="/assets/images/devconf-d-pune.png" class="mw-100" alt="DevConf image asset">
		</div>
		<div class="col-lg-6 px-5">
			<h1 class="mont-700 underline pb-4">About DevConf</h1>
			<div class="os-400">
                <p>DevConf.IN is the annual developer's conference organized by Red Hat. The conference provides a platform to the FOSS community participants and 
		enthusiasts to come together and engage in knowledge sharing activities through technical talks, workshops, panel discussions, hackathons and much more.</p>
		
		<p>There is no admission or ticket charge for DevConf events. However, you are required to complete a free registration.
		Talks, presentations and workshops will all be in English. More information coming soon!</p>

                <p>We are committed to fostering an open and welcoming environment at our conference.
                   We set expectations for inclusive behavior through our code of conduct and media policies, and are prepared to enforce these.</p>
			</div>
		</div>
	</div>
</section>
<section id="registration" class="mx-auto col-lg-11">
    <div class="mt-4 py-5">
    	<h1 class="mont-700 underline pb-4">Registration</h1>
        <link rel="stylesheet" type="text/css" href="https://pretix.eu/devconf/devconfin2026/widget/v2.css">
        <script type="text/javascript" src="https://pretix.eu/widget/v2.en.js" async></script>

        <div class="pretix-widget-compat" event="https://pretix.eu/devconf/devconfin2026/" single-item-select="button"></div>
        <noscript>
           <div class="pretix-widget">
               <div class="pretix-widget-info-message">
                    JavaScript is disabled in your browser. To access our ticket shop without JavaScript, please <a target="_blank" rel="noopener" href="https://pretix.eu/devconf/devconfin2026/">click here</a>.
                </div>
           </div>
        </noscript>
    </div>
</section>
<section id="topics" class="mx-auto col-lg-11">	
	<div class="row">
		<div class="h1 mx-5 mont-700">Topics</div>
	</div>
	<div class="row py-4">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-2 mx-auto">
			<ul class="timeline timeline-centered">
			<?php

				$topics = array(
						array("name"=>"AI, Data Science, and Emerging Tech","description"=>"The latest advancements in artificial intelligence, machine learning, and data science, along with cutting-edge emerging technologies shaping the future.<br><i>AI/ML, Data Science, Deep Learning, Neural Networks, Data Analytics, Natural Language Processing (NLP), Quantum Computing, Blockchain, AR/VR, Emerging Technologies</i>"),
						array("name"=>"Cloud, Edge, and Sustainable Computing","description"=>"Innovations in cloud computing, edge technologies, and platform engineering that drive scalability, efficiency, and sustainability across distributed systems.<br><i>Cloud Native, Kubernetes, Edge Computing, Hybrid Cloud, OpenShift, Infrastructure as Code (IaC), Containers, DevOps, Microservices, Platform Engineering, Green Computing, Sustainability</i>"),
						array("name"=>"Cybersecurity and Compliance","description"=>"Best practices and technologies for ensuring secure, resilient, and compliant systems, with a focus on data sovereignty.<br><i>Cybersecurity, Zero Trust, Encryption, Vulnerability Management, Cloud Security, Privacy, Governance, Compliance, Data Sovereignty, Threat Modeling</i>"),
						array("name"=>"User Experience and Design Engineering", "description"=>"The intersection of user experience (UX) and design engineering, focusing on how user interface (UI) and design thinking influence product development and user-centered solutions.<br><i>UX/UI Design, Design Thinking, Human-Centered Design, Accessibility, Frontend Development, Prototyping, Interaction Design, Design Systems</i>"),
						array("name"=>"Open Track","description"=>"A flexible track for community members to present topics beyond the listed categories. This is an opportunity to introduce diverse subjects that drive open source innovation, collaboration, leadership, and technological advancement.<br><i>Open Source, OpenStack, Linux, Collaborative Development, Git, Community Building, Leadership, Governance, FOSS, Ecosystem Development, Experimental Projects, Cross-disciplinary Topics, Tech for Good, Unique Innovations</i>")
					  );

				foreach($topics as $i=>$t){
					if($i%2 == 0){?>
				<li class="timeline-item">
					<div class="timeline-content-left">
						<div class="mont-600 timeline-title"><?php echo $t['name'];?></div>
						<p class="timeline-description os-400"><?php echo $t['description'];?></p>
					</div>
					<div class="timeline-marker"></div>
				<?php }else{ ?>
					<div class="timeline-content-right">
						<div class="mont-600 timeline-title"><?php echo $t['name'];?></div>
						<p class="timeline-description os-400"><?php echo $t['description'];?></p>
					</div>
				</li>
				<?php }
				}
				if(count($topics)%2 == 1){
					echo "</div></li>";
				}?>
			</ul>
		</div>
	</div>
</section>

<section id="news" class="mx-auto py-5 col-lg-11">
	
	 <!-- <div class="row">
		<!-- Keep in pairs - ->
		
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Oct 16, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">CfP Opens</div>
					</div>
 					<!-- <div class="row">
						<div class="col os-400"><a href="https://cfp.devconf.info">Submit your proposal &rarr;</a></div>
					</div> - ->
			</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Nov 23, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">CfP Closes</div>
					</div>
				</div>
			</div>
                </div>

		<!-- Second pair - ->
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Nov 16 - Dec 8, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Paper Review</div>
					</div>
				</div>
			</div>
        </div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Dec 9, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Communication of selected Talks</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Third pair - ->
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Dec 10, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Confirmation of talks and Publish of schedule</div>
					</div>
				</div>
			</div>
        </div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Dec 15, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Registration is now <a target="_blank" href="https://hopin.com/events/devconf-in-2021-5cd443de-4683-46f3-9260-2c7e6cb6f618">live!</a></div>
					</div>
				</div>
			</div>
		</div>-->
		<div class="row mt-4">
		    <div class="h1 mx-5 mont-700">News</div>
	    </div>
	    <div class="row">
		    <div class="col-lg-6 px-5 mx-auto">
                 <p class="os-400"><span class="h6 mont-700">Jan 15, 2026</span> Schedule is published <a href="/in/schedule" target="_blank">here</a>.</p>
                 <p class="os-400"><span class="h6 mont-700">Dec 16, 2025</span> Registration is open.</p>
                 <p class="os-400"><span class="h6 mont-700">Oct 3, 2025</span> Call for Proposals (CfP) is open, submit your  proposals by November 21, 2025.</p>
                 <p class="os-400"><span class="h6 mont-700">Sep 20, 2025</span> DevConf.IN 2026 dates announced: February 12-13, 2026.</p>
                 <p class="os-400"><span class="h6 mont-700">Feb 28 - Mar 1, 2025</span> DevConf.IN 2025 (<a href="https://photos.app.goo.gl/me2XZqLYQ3LGKgTDA" target="_blank">Conference Photos</a>, <a href="https://youtube.com/playlist?list=PLU1vS0speL2ZvQRS0Hg0xIgTPOyxUmBK4&si=fuIO-ciVlj_7ySdN" target="_blank">Session Recordings</a>)</p>
                 <p class="os-400"><span class="h6 mont-700">Jan 15, 2025</span> <a href="#registration" class="local">Registration</a> is open.</p>
                 
		    </div>
		    <div class="col-lg-4 px-5 mx-auto">
	            <form action="https://devconf.us5.list-manage.com/subscribe/post?u=ad2f341fc41f78b232f2765e6&amp;id=1892c1125f&amp;f_id=003c41edf0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate px-2 py-3 bordered text-center" target="_blank" novalidate>
                    <div class="h3 mont-700">Sign up for newsletter</div>
                    <div class="mc-field-group">
                        <input type="email" value="" name="EMAIL" class="required email p-2" id="mce-EMAIL" placeholder="Email address">
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ad2f341fc41f78b232f2765e6_1892c1125f" tabindex="-1" value=""></div>
                        <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="px-4 py-2 mont-400">
                    </div>
                </div>
                </form>
		    </div>
</section>

<section id="hotels" class="mx-auto py-5 col-lg-11">
		<div class="row mt-4">
		    <div class="h1 mx-5 mont-700">Recommended places to stay</div>
	    </div>
	    <div class="row">
		    <div class="col-lg-12 px-5 mx-auto">
                 <p class="os-400">Prices may depend on the hotels</p>
                 <p class="os-400">JW Marriott<br><a href="https://www.marriott.com/en-us/hotels/pnqmc-jw-marriott-hotel-pune/overview/?scid=f2ae0541-1279-4f24-b197-a979c79310b0" target="_blank">website</a> | <a href="https://maps.app.goo.gl/RUsTpjDtBbxgwWHv9" target="_blank">location</a> | INR 16k-18k per night | 6 km (20 min) from venue</p>
                 <p class="os-400">The Pride Hotel<br><a href="https://www.pridehotel.com/pride-hotel-pune/" target="_blank">website</a> | <a href="https://maps.app.goo.gl/EPHfLKXyX8iSY2Nc9" target="_blank">location</a> | INR 12k-14k per night | 7 km (25 min) from venue</p>
                 <p class="os-400">Ramee Grand<br><a href="https://rameehotels.com/ramee-grand-hotel-and-spa-pune/" target="_blank">website</a> | <a href="https://maps.app.goo.gl/3LAfNvZLwR3QmGg66" target="_blank">location</a> | INR 7k-8k per night | 5 km (20 min) from venue</p>
                 <p class="os-400">Hotel Centro<br><a href="https://centrohotels.in/" target="_blank">website</a> | <a href="https://maps.app.goo.gl/U4eqd7jJ7MyjNukNA" target="_blank">location</a> | INR 5k-6k per night | 6.5 km (25 min) from venue</p>
                 <p class="os-400">Tarawade Clarks Inn<br><a href="https://www.theclarkshotels.com/tarawade-clarks-inn-pune/" target="_blank">website</a> | <a href="https://maps.app.goo.gl/n5ZPkSWMzrxH7X8LA" target="_blank">location</a> | INR 4k-5k per night | 5 km (20 min) from venue</p>
                 <p class="os-400">Sharman Suites<br><a href="https://sharmansuites.com/" target="_blank">website</a> | <a href="https://maps.app.goo.gl/KBhmstJLEih9ndT1A" target="_blank">location</a> | Distance: 4 km (~15 min from venue)</p>
                 <p class="os-400">Hotel Royalty<br><a href="http://www.hotel-royalty.com/contactus.html" target="_blank">website</a> | <a href="https://maps.app.goo.gl/1eFXugZyG2NqGZGd6" target="_blank">location</a> | Distance: 4 km (~15 min from venue)</p>
                 
		    </div>
</section>

<section class="col-12 px-0 mt-5" style="height: 450px;" id="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.2464710766876!2d73.8125362758595!3d18.517760969258845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bfb9e53a05f9%3A0x2be5e8da02be693e!2sMIT%20World%20Peace%20University%20(MIT-WPU)!5e0!3m2!1sen!2sus!4v1723662301623!5m2!1sen!2sus" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>

@endsection

@include('_layouts.footerin')
