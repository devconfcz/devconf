@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.CZ | Brno, Czechia">
<meta property="og:site_name" content="DevConf.CZ">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-cz-social.png">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-cz-social.png">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/site.css', 'assets/build') }}">
<link rel="stylesheet" href="{{ mix('css/timeline.css', 'assets/build') }}">
@endsection

@section('title')
<title>DevConf.CZ 2021</title>
@endsection


@section('body')
<header class="masthead vh-100">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top">
		<span class="nav-brand"><a href="#" class="home"><img src="/assets/images/devconf-logo-cz-reverse.svg" alt="DevConf logo"></a></span>
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
					<a href="#schedule" class="nav-link local">Schedule</a>
				</li>
<!--				<li class="nav-item active px-3">
					<a href="#travel" class="nav-link local">How to get here?</a>
				</li> -->
				<li class="nav-item active px-3">
					<a href="/cz/faq" class="nav-link local">FAQ</a>
				</li> 
				<li class="nav-item active px-3">
					<a href="/coc" class="nav-link local" target="_blank">Policies</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="row mr-0 mt-5" style="height: 85%">
		<div class="col-lg-1 border-right text-center pr-0">
			<a href="mailto:info@devconf.cz" target="_blank" title="Mail"><img src="/assets/images/mail.svg" alt="mail" class="social-icon"></a>
			<a href="https://www.facebook.com/DevConf.CZ" target="_blank" title="Facebook"><img src="/assets/images/facebook.svg" alt="facebook" class="social-icon"></a>
			<a href="https://twitter.com/devconf_cz" target="_blank" title="Twitter"><img src="/assets/images/twitter.svg" alt="twitter" class="social-icon"></a>
			<a href="https://t.me/devconfcz" target="_blank" title="Telegram"><img src="/assets/images/telegram.svg" alt="telegram" class="social-icon"></a>
			<a href="https://www.youtube.com/channel/UCmYAQDZIQGm_kPvemBc_qwg" target="_blank" title="YouTube"><img src="/assets/images/youtube.svg" alt="youtube" class="social-icon"></a>
			<a href="https://github.com/devconfcz/devconf" target="_blank" title="Git Hub"><img src="/assets/images/github.svg" alt="github" class="social-icon"></a>
		</div>
		<div class="col-lg-10 h-100 px-0">
                	<div style="padding: 5% 0 0 0">
                        	<img src="/assets/images/devconf-logo-cz-reverse.svg" alt="DevConf logo" class="text-logo">
                        	<img src="/assets/images/devconf-abstract.svg" alt="DevConf abstract logo" class="abstract-logo">
                        </div>
			<div class="heading-text mont-400 h5 pb-2 pb-lg-5">
				open source community conference
			</div>
            <div class="virtual-stamp mont-700">
                virtual event
            </div>
			<div class="heading-text mont-700 h1 pt-1 pt-lg-5">
				February 18-20, 2021
			</div>
			<div class="heading-text mont-700 h4">
                <i class="fa fa-map-marker"></i> All over the world
			</div>
<!--
			<div class="heading-text pt-1 pt-lg-5 mt-1 mt-lg-5">
				<a href="https://cfp.devconf.info" target="_blank" class="border p-3 h2 mont-700" style="border-width: 3px !important;">SUBMIT YOUR PROPOSAL</a>
			</div>
-->
		</div>
	</div>
</header>
<section id="about" class="mx-auto col-lg-11">
	<div class="row mt-4 py-5">
		<div class="col-lg-4 mx-5 mb-5 text-center">
			<img src="/assets/images/devconf-d-virtual.png" class="mw-100" alt="Virtual DevConf image asset">
		</div>
		<div class="col-lg-6 px-5">
			<h1 class="mont-700 underline pb-4">About DevConf</h1>
			<div class="os-400">
                <p>DevConf.CZ 2021 is the 13th annual, free, Red Hat sponsored virtual community conference for developers, admins, DevOps engineers, testers, documentation writers and other contributors to open source technologies.
                   The conference includes topics on Linux, Middleware, Virtualization, Storage, Cloud and mobile. At DevConf.CZ, FLOSS communities sync, share, and hack on upstream projects together.</p>
                <p>While we are disappointed that we won’t be able to see you all in person, we're shifting to an awesome virtual event in 2021!</p>

				<p>There is no admission or ticket charge for DevConf.CZ events. However, you are required to complete a free registration. Watch this site for updates about registration.</p>

                <p>We are committed to fostering an open and welcoming environment at our conference.
                   We set expectations for inclusive behavior through our code of conduct and media policies, and are prepared to enforce these.</p>
			</div>
            <div class="h1 mont-700">Session formats</div>
            <p class="os-400">We are switching to a virtual format in 2021 and we want to make sure all CfP submission types are clearly defined and adjusted to the virtual environment. Have a look at the detailed descriptions and as always, we’re open to new ideas!</p>
		</div>
	</div>

	<div class="row">
		
        <div class="os-400 mx-5">
                <div class="h4 mont-700">Talk</div>
                <p>A <b>talk</b> is where you talk using slides and demos to an audience that listens. A talk is either <b>20 or 40 minutes long</b>, make sure you reserve time at the end for Q&A. If speakers wish to continue with the <b>Q&A</b> after their time slot, there will be a dedicated place for it. Feel free to recruit your colleagues to interact with people in chat while you are talking. A talk has one primary speaker, optionally another (secondary) speaker.</p>
                <p><b>A talk should be bite-sized and focused</b> on a certain topic. This means that you should not expect to be able to cover multiple broad areas in one talk. You can submit more than one proposal, to cover a set of topics, but we cannot guarantee their final scheduled order. Therefore, we recommend topics be structured in a way so as to minimize their interdependence so that they do not need to be presented in a specific order.</p>
                <p>We give speakers <b>a choice to speak live or send us a pre-recorded session</b>. We understand pre-recording your session requires extra time and extra set of skills and we are currently considering ways to make it easier for you. If you choose to pre-record your session, remember it only needs to be as good as you would do live. This is not a Hollywood movie :)</p>

                <div class="h4 mont-700">Discussion</div>
                <p><b>A discussion</b> is a bit where <b>you lead/moderate a discussion with a group of knowledgeable panelists</b> where they answer prepared questions or questions from the audience as selected by you for appropriateness to your topic and session’s goal. It is more interactive than a talk because you could engage with the audience during the session. If you are willing to open the discussion to attendees, consider holding a fishbowl discussion where you start with a group of speakers and an empty “seat” which could be filled by active audience members in the course of a discussion.</p>
                <p>A discussion is <b>40 minutes long</b>. If speakers wish to continue after the 40-minute slot, there will be a dedicated place for it. A discussion has a dedicated moderator and <b>up to 5 active speakers</b>.</p>
                <p>Discussions are <b>delivered live</b>. We do not accept pre-recorded discussions.</p>

                <div class="h4 mont-700">Workshop</div>
                <p><b>A workshop is a hands-on demo</b> where you and other workshop leads interact among each other and with audience members on chat, sharing your knowledge and experience on a particular bite-sized topic. The goal of a workshop is to teach or practice a skill. You should not expect the audience following each step of the worksop live, however, they should have all necessary instructions if they wish to. As a result workshops should be actionable and goal oriented.</p>
                <p>A workshop is <b>40 minutes long</b>, although we will consider exceptions. The number of attendees is not limited like it would be in an in-person event.</p>
                <p>We allow <b>up to 3 active presenters</b> in a workshop. You must designate one of them to be the primary session leader. Feel free to recruit your colleagues to interact with people in chat while you are talking.</p>
                <p>All workshops are <b>conducted live</b>. We do not accept pre-recorded workshops. However, you may find it <b>useful to pre-record demo components</b> of your workshop.</p>

                <div class="h4 mont-700">Meetups, Booths and Contests</div>
                <p><b>Meetups and booths</b> are open to all participants, they serve as a place for open discussions, sharing the latest project developments and interaction with contributors and attendees.</p>
                <p>We recognize that adjusting booths and meetups to the virtual environment is very challenging and we are considering steps we can take to ensure high meetup and booth traffick. We are working on a list of suggestions for virtual booths and meetups. We are open to working together with booth staff and meetup organizers in order to find the best possible solution in the virtual environment.</p>
                <p><b>Contests</b> are easy to set up, there should be an intro meeting for those who want to join and then they can work on their own. We will provide a chat channel to help and monitor the contest.</p>
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
						array("name"=>"Agile, DevOps","description"=>"The Agile, DevOps track is intended to address the practices, methods and tooling that technical audiences need to deliver increased business value and responsiveness through rapid, high-quality delivery. Topics include engineering best practices, defining and building Agile & DevOps cultures, Open Source tools to make Developers and Operations successful, and many more."),
						array("name"=>"Cloud and Containers","description"=>"Cloud, containers, clusters. Buildah, CRI-O, Docker, Kubernetes, Skopeo. Hybrid cloud and other buzzwords - your cloud and container topics go here. Daemons of all sizes and shapes."),
						array("name"=>"Community","description"=>"Building open source software is more than just about coding. Learn about the many aspects of creating and maintaining healthy, robust, and diverse open source communities."),
                        array("name"=>"Debug / Tracing","description"=>"Developer tools for debugging and tracing your application and its enviroment.  Kernel level to userland application level."),
                        array("name"=>"Desktop","description"=>"Traditional and new package management tools, GUI applications, optimizations for the desktop, anything desktop-related goes here."),
                        array("name"=>"Developer Tools","description"=>"Developer tools for planning, creating, compiling, running, and analyzing code. Including all programming languages, frameworks and online development environments."),
                        array("name"=>"Documentation","description"=>"Guides, manuals, howtos, articles, and other kinds of help content. New ideas, documentation workflows, user-story focus, modularity, and automation."),
                        array("name"=>"Fedora","description"=>"All things Fedora!"),
                        array("name"=>"Frontend / UI / UX","description"=>"The Frontend/UX/UI track is intended to address user experience design, user interface design, and front end development. Topics include: processes and tools related to design and frontend development, approaches to research and collecting user feedback, and strategies towards increased transparency for design and development across teams."),
                        array("name"=>"Kernel","description"=>"All things Linux Kernel"),
						array("name"=>"Immutable OS","description"=>"Everything from the previous CoreOS and Atomic operating systems to the new Fedora CoreOS, an automatically updating, minimal, monolithic, container-focused operating system, designed for clusters while also operable standalone. Server-related topics around rpm-ostree too."),
                        array("name"=>"IoT (Internet of Things)","description"=>"Data crunching applications, microcontrollers, protocols and embedded software. Development and testing tools. Deployment and maintenance techniques. Security challenges and interesting use cases."),
						array("name"=>"Microservices","description"=>"Microservices architecture, design, challenges, patterns and testing. Including RHOAR based technologies (Vert.x, Spring Boot, Node.js, Thorntail, MicroProfile, Fuse) and other platforms, including development & production related topics."),
						array("name"=>"Middleware","description"=>"Infrastructure exists to run applications, and applications are built on Middleware.  Red Hat has several runtimes and services designed to integrate with our platforms for efficient performance and rapid development."),
						array("name"=>"ML / AI / Big Data","description"=>"Development tools for data engineering and data science, model development and deployment, interesting models to solve problems, e.g., in software engineering, system/cloud administration."),
						array("name"=>"Networking","description"=>"What is on the horizon for the next 3-12 months for networking. What is work in progress and will land in next few months. What are the directions we would want to take things in. How can networking solve some of the existing problems for our customers, our layered products. How can networking solve the bottlenecks in layered products."),
						array("name"=>"Platform / OS","description"=>"Anything related to GNU/Linux base operating system - when it does not better fit to other tracks ;)"),
						array("name"=>"Quality / Testing","description"=>"Automation, STLC, QE frameworks, QE in Open Source, basically all things Quality Engineering!"),
						array("name"=>"Security / IdM","description"=>"Secure infrastructure and identity management on Linux"),
						array("name"=>"Storage / Ceph / Gluster","description"=>"Storage infrastructure, including topics from low-level to software-defined distributed storage systems."),
						array("name"=>"Virtualization","description"=>"Virtualization from low level kernel support to high level management tools, and everything in between, such as userspace runtimes and libraries. Multiple architecture support for Virtualization is evolving. User level tuning and experiences with Virtualization are also great topics.")
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

<section id="news" class="mx-auto pt-5 col-lg-11">
	<div class="row">
		<div class="h1 underline pb-4 mx-5 position-relative mont-700">Important dates</div>
	</div>
	<div class="row">
		<!-- Keep in pairs -->
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Sep 24, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">CfP Opens</div>
					</div>
<!--
					<div class="row">
						<div class="col os-400"><a href="https://cfp.devconf.info">Submit your proposal &rarr;</a></div>
					</div>
-->
				</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Nov 6, 2020</div>
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
				<div class="col-4 h5 mont-700">Nov 30, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">1st round of speaker acceptance letters</div>
					</div>
				</div>
			</div>
                </div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Jan 11, 2021</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Registration opens</div>
					</div>
				</div>
			</div>
		</div>
        </div>
	<div class="row mt-4">
		<div class="h1 mx-5 mont-700">News</div>
	</div>
	<div class="row">
		<div class="col-10 mx-auto">
			<p class="os-400">Join <a href="https://t.me/devconfcz" target="_blank">Telegram DevConf.CZ Attendees group chat</a>! Connect with other attendees and get instant updates from the organizers!</p>
		</div>
	</div>
<!--	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-2 mx-auto">
			This is the list of booths you can expect at DevConf.CZ this year. Get ready for some stickers and so much more!
			<ul class="timeline timeline-centered pt-5">
			<?php

				$booths = array(
						array("name"=>"Base48","description"=>""),
						array("name"=>"Ceph","description"=>""),
						array("name"=>"Fedora","description"=>""),
						array("name"=>"Foreman","description"=>"Friday and Saturday only"),
						array("name"=>"Integration Platform for Cloud-Native Application Development","description"=>"Friday and Saturday only"),
						array("name"=>"Kubernetes OKD","description"=>""),
						array("name"=>"Kubernetes native CI/CD with Tekton pipelines","description"=>"Friday and Saturday only"),
						array("name"=>"Learn to make games with CircuitPython ","description"=>"Saturday only"),
						array("name"=>"ManageIQ/Ansible","description"=>"Friday and Saturday only"),
						array("name"=>"Mozilla.cz","description"=>"Saturday and Sunday only"),
						array("name"=>"Prometheus","description"=>"Friday and Saturday only"),
						array("name"=>"Pulp","description"=>""),
						array("name"=>"Python","description"=>""),
						array("name"=>"RDO Project","description"=>""),
						array("name"=>"Red Hat Brno 3D print and open hardware lab ","description"=>""),
						array("name"=>"Red Hat Neurodiversity Community","description"=>""),
						array("name"=>"Red Hat Research","description"=>"Friday and Saturday only"),
						array("name"=>"Red Hat Talent Acquisition","description"=>""),
						array("name"=>"The oVirt Project","description"=>""),
						array("name"=>"The search for usable documentation","description"=>""),
						array("name"=>"Ubuntu","description"=>""),
						array("name"=>"UXD/Patternfly","description"=>"Friday and Saturday only"),

					  );

				foreach($booths as $i=>$t){
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
				if(count($booths)%2 == 1){
					echo "</div></li>";
				}?>
			</ul>
		</div>
	</div>
-->
</section>
<section id="schedule" class="mx-auto col-lg-12 background-gray text-center mt-5 py-5">
	<div class="h1 mont-700 position-relative py-4 mt-3">Schedule</div>
	<a class="p-3 mont-700 mb-3 d-inline-block purple-href" href="#">Will be announced in January</a>
</section>
<!--<section id="travel" class="mx-auto py-5 col-lg-11">
	<div class="row">
		<div class="mont-700 h1 underline position-relative mx-5 pb-4">How to get there?</div>
	</div>
	<div class="row py-4">
		<div class="col-xl-3 container card-body my-2 ml-xl-auto mr-xl-3" style="background: #ada3ff">
			<div class="row h-100 align-items-center">
				<div class="col text-center">
					<img src="/assets/images/travel-around.svg" class="my-4" alt="Getting around icon" style="height: 74px">
					<h2 class="mont-700 mb-0">Getting around Brno</h2>
					<div class="card-text os-400 pt-3">Brno has a 24 hour public transit system and the site is accessible by car.</div>
					<p class="card-text my-5">
						<a href="/cz/aroundbrno" class="border p-3 mont-700">MORE INFORMATION</a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 container card-body my-2 mx-xl-3" style="background: #4a4a7e">
			<div class="row h-100 align-items-center">
				<div class="col text-center">
					<img src="/assets/images/way-to.svg" class="my-4" alt="Getting to icon" style="height: 74px">
					<h2 class="mont-700 pb-4">Getting to Brno</h2>
					<div class="card-text os-400 pt-4">Brno is easily accessible by car, bus, train and plane.</div>
					<p class="card-text my-5">
						<a href="/cz/tobrno" class="border p-3 mont-700">MORE INFORMATION</a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 container card-body my-2 ml-xl-3 mr-xl-auto" style="background: #8e83e4">
			<div class="row h-100 align-items-center">
				<div class="col text-center">
					<img src="/assets/images/hotel.svg" class="my-4" alt="Hotel icon" style="height: 74px">
					<h2 class="mont-700 pb-4">Hotels</h2>
					<div class="card-text os-400 pt-4">Need a place to stay? We suggest these properties.</div>
					<p class="card-text my-5">
						<a href="/cz/hotels" class="border p-3 mont-700">MORE INFORMATION</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="col-12 px-0" style="height: 450px;">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5828.8794114720895!2d16.593681273902156!3d49.223568069664026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471294099dc06bbb%3A0xbfcf161b01a48b0d!2sFaculty%20of%20Information%20Technology%2C%20Brno%20University%20of%20Technology!5e0!3m2!1sen!2scz!4v1569001018524!5m2!1sen!2scz" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

</section> -->
@endsection

@include('_layouts.footercz')
