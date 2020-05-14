@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.US | Virtual">
<meta property="og:site_name" content="DevConf.US">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-us-social.png">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-us-social.png">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/site.css', 'assets/build') }}">
<link rel="stylesheet" href="{{ mix('css/timeline.css', 'assets/build') }}">
@endsection

@section('title')
<title>DevConf.US 2020</title>
@endsection


@section('body')
<header class="masthead vh-100">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top">
		<span class="nav-brand"><a href="#" class="home"><img src="/assets/images/devconf-logo-us-reverse.svg" alt="DevConf logo"></a></span>
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
<!--				<li class="nav-item active px-3">
					<a href="#schedule" class="nav-link local">Schedule</a>
				</li>
-->				<li class="nav-item active px-3">
					<a href="#participation" class="nav-link local">How to participate?</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/faq" class="nav-link local">FAQ</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/coc" class="nav-link local" target="_blank">Policies</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="row mr-0 mt-5" style="height: 85%">
		<div class="col-lg-1 border-right text-center pr-0">
			<a href="mailto:info@devconf.us" target="_blank" title="Mail"><img src="/assets/images/mail.svg" alt="mail" class="social-icon"></a>
			<a href="https://www.facebook.com/DevConf.US" target="_blank" title="Facebook"><img src="/assets/images/facebook.svg" alt="facebook" class="social-icon"></a>
			<a href="https://twitter.com/devconf_us" target="_blank" title="Twitter"><img src="/assets/images/twitter.svg" alt="twitter" class="social-icon"></a>
			<a href="https://t.me/devconfus" target="_blank" title="Telegram"><img src="/assets/images/telegram.svg" alt="telegram" class="social-icon"></a>
			<a href="https://www.youtube.com/channel/UCmYAQDZIQGm_kPvemBc_qwg" target="_blank" title="YouTube"><img src="/assets/images/youtube.svg" alt="youtube" class="social-icon"></a>
			<a href="https://github.com/devconfcz/devconf" target="_blank" title="Git Hub"><img src="/assets/images/github.svg" alt="github" class="social-icon"></a>
		</div>
		<div class="col-lg-10 h-100 px-0">
                	<div style="padding: 5% 0 0 0">
                        	<img src="/assets/images/devconf-logo-us-reverse.svg" alt="DevConf logo" class="text-logo">
                        	<img src="/assets/images/devconf-abstract.svg" alt="DevConf abstract logo" class="abstract-logo">
                        </div>
			<div class="heading-text mont-400 h5 pb-5">
				open source community conference
			</div>
			<div class="heading-text mont-700 h1 pt-5">
				September 24-25, 2020
			</div>
			<div class="heading-text mont-700 h4">
				Web Browser Near You!
			</div>
			<div class="heading-text pt-5 mt-5">
				<a href="https://cfp.devconf.info" target="_blank" class="border p-3 h2 mont-700" style="border-width: 3px !important;">SUBMIT YOUR PROPOSAL</a>
			</div>
		</div>
	</div>
</header>

<section id="about" class="mx-auto col-lg-11">
	<div class="row mt-4 py-5">
		<div class="col-lg-4 mx-5 mb-5 text-center">
			<img src="/assets/images/devconf-d-wfh.png" class="mw-100" alt="Brno DevConf image asset">
		</div>
		<div class="col-lg-6 px-5">
			<h1 id="going-virtual" class="mont-700 pb-4">DevConf.US 2020 Goes Virtual!</h1>
			<div class="os-400">
                <p>In response to COVID-19, we have made the difficult decision to make DevConf.US 2020 a virtual event. While we are disappointed that we won’t be able to see you all in
				person, the well-being of our attendees required us to make this decision. We also recognize that we are making this decision, seemingly, very early. However, in order to
				shift to an awesome virtual event, we need a lot of lead time for the organizers, volunteers and speakers to produce an entirely different event.</p>
			</div>
			<h1 class="mont-700 underline pb-4">About DevConf</h1>
			<div class="os-400">
                <p>DevConf.US 2020 is the 3rd annual, free, Red Hat sponsored technology conference for community project and professional contributors to Free and Open Source technologies
		 coming to a web browser near you!</p>

		<p>There is no admission or ticket charge for DevConf.US events. However, you are required to complete a free registration. Watch this site for updates about registration. 
		Talks, presentations and workshops will all be in English.</p>

                <p>We encourage students and new graduates as well as professionals to submit proposals to DevConf.US. See our topics below for ideas on what to submit!
		 Please indicate if you are a student or new graduate through the checkbox on your submission.</p>

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
						array("name"=>"Application Development with Serverless & Containerization","description"=>"Application Development has gone through a number of changes in recent years with sophisticated tools, remote development environments, AI support, etc. Not to mention new deployment methods like serverless/functions, containers, and cloud-native. We are hoping to gather session submissions addressing experience with these changes. We are also happy to see sessions that focus on how to be more efficient and the new cool stuff available to do your application development with."),
						array("name"=>"Operating at Scale","description"=>"The operations of modern cloud computing including physical bare metal machines, VMs, containers. Cloud, and clusters. podman, CRI-O, Docker/Moby, Kubernetes, Skopeo. Hybrid cloud and other buzzwords - your cloud and apps-at-scale topics go here."),
						array("name"=>"Ensuring Software Quality","description"=>"All aspects of Quality including the documentation and development that goes into the QE/QA components, such as automated testing, CI/CD, and traditional testing."),
						array("name"=>"Security, Privacy & Data Governance","description"=>"With all the work being done with Machine Learning and in the public cloud, privacy and managing data are becoming huge concerns. What techniques are available to keep our data secure and private? What attacks should we be watching out for?"),
						array("name"=>"Open Source & Process","description"=>"How to Open Source, and what software development is like in the Open Source world."),
						array("name"=>"Machine Learning & Artifical Intelligence","description"=>"Development tools for data engineering and data science, model development and deployment, interesting models to solve problems. We also want to hear about other AI hot buttons like AI Dev Support, AIOps, etc."),
						array("name"=>"Systems Engineering & Hardware","description"=>"All the low-level work happening in Linux as well as interesting hardware challenges and solutions. "),
						array("name"=>"User Experience in Open Source","description"=>"UX in the Open Source world, with a focus on implementing user experience design processes. We know UX is different when everything is done in public, tell us how and what to do about it."),
						array("name"=>"Evolving Technology","description"=>"Highlighting emerging technology and academic research. In other words, 'All your awesome and crazy ideas -- backed up by science!'"),
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
	<div class="row">
		<div class="h1 mx-5 pb-4 underline position-relative mont-700">Important Dates</div>
	</div>
	<div class="row">
		<!-- Keep in pairs -->
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Feb 19, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">CfP Opens</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">May 30, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">CfP Closes</div>
					</div>
				</div>
			</div>
                </div>

		<!-- Second pair -->
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">July 8, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Live Workshop Proposals Closes</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">July 27, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Video Recordings Due</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Third pair -->
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">August 17, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Schedule Published & Registration Opens</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">September 23, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Workshop Day</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Fourth pair -->
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">September 24, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Conference Day 1</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">September 25, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Conference Day 2</div>
					</div>
				</div>
			</div>
		</div>
        </div>
</section>

<!--
<section id="schedule" class="mx-auto col-lg-12 background-gray text-center mt-5 py-5">
	<div class="h1 mont-700 py-4 mt-3">Schedule</div>
	<a class="p-3 mont-700 mb-3 d-inline-block purple-href">SCHEDULE ISN'T AVAILABLE YET</a>
</section>
-->
<section id="participation" class="mx-auto py-5 col-lg-11">
	<div class="row">
		<div class="mont-700 h1 underline position-relative mx-5 pb-4">How to participate?</div>
	</div>
	<div class="row">
		<h4 class="mont-700 mb-0 position-relative mx-5 py-4">Watch this space. We'll be adding information to help you produce your videos.</h4>
    </div>
	<div class="row py-4">
        <a href="/us/faq" class="mont-700 position-relative mx-5 p-4 d-inline-block purple-href">WHAT WE KNOW NOW!</a>
		<!-- <div class="col-xl-3 container card-body my-2 mx-xl-3" style="background: #4a4a7e">
			<div class="row h-100 align-items-center">
				<div class="col text-center">
					<img src="/assets/images/way-to.svg" class="my-4" alt="Getting to icon" style="height: 74px">
					<h2 class="mont-700 mb-0">Getting to Framingham</h2>
					<div class="card-text os-400 pt-3">Framingham is easily accessible by car, bus, train and plane.</div>
					<p class="card-text my-5">
						<a href="/us/toframingham" class="border p-3 mont-700">MORE INFORMATION</a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 container card-body my-2 ml-xl-3 mr-xl-auto" style="background: #8e83e4">
			<div class="row h-100 align-items-center">
				<div class="col text-center">
					<img src="/assets/images/hotel.svg" class="my-4" alt="Hotel icon" style="height: 74px">
					<h2 class="mont-700 mb-0">Hotels</h2>
					<div class="card-text os-400 pt-3">Need a place to stay in Framingham? We suggest these properties.</div>
					<p class="card-text my-5">
						<a href="/us/hotels" class="border p-3 mont-700">MORE INFORMATION</a>
					</p>
				</div>
			</div>
		</div> -->
	</div>
</section>
<!-- <section class="col-12 px-0" style="height: 450px;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2951.0950292770904!2d-71.48131544837175!3d42.29783767908894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e38a27a40998f7%3A0xc901f7bfb3e62eaa!2sSheraton%20Framingham%20Hotel%20%26%20Conference%20Center!5e0!3m2!1scs!2scz!4v1581493814798!5m2!1scs!2scz" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section> -->
@endsection

@include('_layouts.footerus')
