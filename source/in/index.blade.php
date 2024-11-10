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
<title>DevConf.IN 2025</title>
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
					<a href="#about" class="nav-link local">About & Topics</a>
				</li>
				<li class="nav-item active px-3">
					<a href="#news" class="nav-link local">News</a>
				</li>
			<li class="nav-item active px-3">
					<a href="/in/faq" class="nav-link local">FAQ</a>
				</li>
<!--				<li class="nav-item active px-3">
					<a href="#schedule" class="nav-link local">Schedule</a>
				</li>
-->
				<li class="nav-item active px-3">
					<a href="/coc" class="nav-link local" target="_blank">Policies</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="row mr-0 mt-5" style="height: 85%">
		<div class="col-lg-1 border-right text-center pr-0">
			<a href="mailto:info@devconf.in" target="_blank" title="Mail"><img src="/assets/images/mail.svg" alt="mail" class="social-icon"></a>
			<a href="https://twitter.com/devconf_in" target="_blank" title="Twitter"><img src="/assets/images/twitter.svg" alt="twitter" class="social-icon"></a>
			<a href="https://www.linkedin.com/company/devconf-in/" target="_blank" title="LinkedIn"><img src="/assets/images/linkedin.svg" alt="linkedin" class="social-icon"></a>
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
			<div class="heading-text mont-700 h1 pt-5">
				February 28 - March 1, 2025
			</div>
			<div class="heading-text mont-700 h4">
				<i class="fa fa-map-marker"></i> MIT World Peace University (MIT WPU), Pune
			</div>
			<div class="heading-text pt-5 mt-5">
                        <a href="https://pretalx.devconf.info/devconf-in-2025/cfp" class="nav-link local border p-3 h2 mont-700" style="border-width: 3px !important;">CALL FOR PROPOSALS</a>
                    </div>
                     <div class="heading-text mont-400 h5 pb-2 pb-lg-5">
                       Submit your proposals by December 15, 2024.
        			</div>
			</div>
		</div>
	</div>
</header>

<section id="about" class="mx-auto col-lg-11">
	<div class="row mt-4 py-5">
		<div class="col-lg-4 mx-5 mb-5 text-center">
			<img src="/assets/images/devconf-d-pune.png" class="mw-100" alt="Virtual DevConf image asset">
		</div>
		<div class="col-lg-6 px-5">
			<h1 class="mont-700 underline pb-4">About DevConf</h1>
			<div class="os-400">
                <p>DevConf.IN 2025 is the annual developer's conference organized by Red Hat, India. The conference provides a platform to the FOSS community participants and 
		enthusiasts to come together and engage in knowledge sharing activities through technical talks, workshops, panel discussions, hackathons and much more.</p>
		
		<p>There is no admission or ticket charge for DevConf.IN events. However, you are required to complete a free registration.
		Talks, presentations and workshops will all be in English. More information coming soon!</p>

                <p>We are committed to fostering an open and welcoming environment at our conference.
                   We set expectations for inclusive behavior through our code of conduct and media policies, and are prepared to enforce these.</p>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="h1 mx-5 mont-700">Topics</div>
	</div>
	<div class="row py-4">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-2 mx-auto">
			<ul class="timeline timeline-centered">
			<?php

				$topics = array(
						array("name"=>"Cloud, Edge, and Platform Technologies","description"=>"nnovations in cloud computing, edge technologies, and platform engineering that drive scalability, efficiency, and reliability across distributed systems.<br><i>Cloud Native, Kubernetes, Edge Computing, Hybrid Cloud, OpenShift, Infrastructure as Code (IaC), Containers, DevOps, Microservices, Platform Engineering</i>"),
						array("name"=>"AI, Data Science, and Emerging Tech","description"=>"The latest advancements in artificial intelligence, machine learning, and data science, along with cutting-edge emerging technologies shaping the future.<br><i>AI/ML, Data Science, Deep Learning, Neural Networks, Data Analytics, Natural Language Processing (NLP), Quantum Computing, Blockchain, AR/VR</i>"),
						array("name"=>"Security and Sustainable Computing","description"=>"Cybersecurity best practices and technologies, along with sustainable computing approaches to ensure secure, energy-efficient, and resilient systems.<br><i>Cybersecurity, Zero Trust, Encryption, Vulnerability Management, Green Computing, Sustainability, Cloud Security, Privacy, Governance</i>"),
						array("name"=>"Open Source Innovation and Leadership","description"=>"Open-source collaboration, community leadership, and contributions that drive innovation and technological advancement worldwide.<br><i>Open Source, OpenStack, Linux, Collaborative Development, Git, Community Building, Leadership, Governance, FOSS, Ecosystem Development</i>"),
						array("name"=>"User Experience and Design Engineering", "description"=>"The intersection of user experience (UX) and design engineering, focusing on how user interface (UI) and design thinking influence product development and user-centered solutions.<br><i>UX/UI Design, Design Thinking, Human-Centered Design, Accessibility, Frontend Development, Prototyping, Interaction Design, Design Systems</i>"),
						array("name"=>"Open Track","description"=>"A flexible track for community members to present topics beyond the listed categories. This is an opportunity to introduce diverse subjects that inspire discussion and innovation in the realm of open source.<br><i>Emerging Technologies, Experimental Projects, Cross-disciplinary Topics, Tech for Good, Diversity in Tech, Collaboration, Unique Innovations</i>")
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
                 <p class="os-400"><span class="h6 mont-700">Nov 11, 2024</span> <a href="https://pretalx.devconf.info/devconf-in-2025/cfp" target="_blank">Call for Proposals</a> is open, deadline to submit proposals is December 15, 2024.</p>
                 <p class="os-400"><span class="h6 mont-700">Sep 6, 2024</span> DevConf.IN is now on <a href="https://www.linkedin.com/company/devconf-in/" target="_blank">LinkedIn</a>.</p>
                 <p class="os-400"><span class="h6 mont-700">Aug 16, 2024</span> DevConf.IN dates announced: February 28 - March 1, 2025</p>                 
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

<section class="col-12 px-0 mt-5" style="height: 450px;" id="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.2464710766876!2d73.8125362758595!3d18.517760969258845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bfb9e53a05f9%3A0x2be5e8da02be693e!2sMIT%20World%20Peace%20University%20(MIT-WPU)!5e0!3m2!1sen!2sus!4v1723662301623!5m2!1sen!2sus" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>

@endsection

@include('_layouts.footerin')
