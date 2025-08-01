@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.US | Boston, USA">
<meta property="og:site_name" content="DevConf.US">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contributors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-us-social.svg">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-us-social.svg">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/site.css', 'assets/build') }}">
<link rel="stylesheet" href="{{ mix('css/timeline.css', 'assets/build') }}">
@endsection

@section('title')
<title>DevConf.US 2025</title>
@endsection


@section('body')
<header class="masthead min-vh-100">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top">
		<span class="nav-brand"><a href="#" class="home"><img src="/assets/images/devconf-logo-us-reverse.svg" alt="DevConf logo"></a></span>
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
					<a href="#themes" class="nav-link local">Conference Themes</a>
				</li>
				<li class="nav-item active px-3">
					<a href="#news" class="nav-link local">News</a>
				</li>
				<!-- <li class="nav-item active px-3">
					<a href="/us/schedule" class="nav-link local">Schedule</a>
				</li> -->
				<!-- <li class="nav-item active px-3">
                    <a href="/cz/blog" class="nav-link local">Blog</a>
                </li> -->
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
			<a href="https://www.linkedin.com/company/devconf-us" target="_blank" title="LinkedIn"><img src="/assets/images/linkedin.svg" alt="linkedin" class="social-icon"></a>
			<a href="https://twitter.com/devconf_us" target="_blank" title="Twitter"><img src="/assets/images/twitter.svg" alt="twitter" class="social-icon"></a>
			<a href="https://matrix.to/#/#main.us:devconf.cz" target="_blank" title="Matrix"><img src="/assets/images/matrix.svg" alt="matrix" class="social-icon"></a>
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
			<!-- <div class="virtual-stamp mont-700">
                virtual event
            </div> -->
            <!-- <div class="heading-text pt-1 mt-2">
            <a href="https://events.redhat.com/profile/form/index.cfm?PKformID=0x607868abcd" target="_blank" class="border p-3 h2 mont-700" style="border-width: 3px !important;">Call for Proposals</a>
            </div> -->
            <div class="heading-text mont-700 h1">
				        September 19-20, 2025
			</div>
			<div class="heading-text mont-700 h4">
			<i class="fa fa-map-marker"></i> Boston, USA
			</div>
			<div class="heading-text pt-1">
				<a href="https://pretix.eu/devconf/devconf-us-2025/" class="nav-link local border p-3 h2 mont-700" style="border-width: 3px !important;">REGISTER NOW!</a>
			</div>
			<!-- <div class="heading-text mont-400 h5 pb-2 pb-lg-5">
				Schedule coming by end of June 2025!
			</div>   -->
			<div class="heading-text pt-1 pt-xl-3 mt-3">
				<a href="/us/schedule/" class="border p-3 h2 mont-700" style="border-width: 3px !important;">SCHEDULE</a>
			</div>
			<!-- <div class="heading-text pt-1">
				<a href="https://forms.gle/zLdt2G8UEpmLPqn99" class="nav-link local border p-3 h2 mont-700" style="border-width: 3px !important;">Post-event survey</a>
			</div> -->
		</div>
	</div>
</header>

<section id="about" class="mx-auto col-lg-11">
	<div class="row mt-4 py-5">
		<div class="col-lg-4 mx-5 mb-5 text-center">
			<img src="/assets/images/devconf-d-boston.png" class="mw-100" alt="Boston DevConf image asset">
		</div>
		<div class="col-lg-6 px-5">
			<h1 class="mont-700 underline pb-4">About DevConf</h1>
			<div class="os-400">
                <p>DevConf.US 2025 is the 7th annual, free, Red Hat sponsored technology conference for community project and professional contributors to Free and Open Source technologies
		 at <strong>Boston University</strong> in the historic city of Boston, USA.</p>

        <p>There is no admission or ticket charge for DevConf.US events. However, you are required to complete a free registration. Talks, presentations, and workshops will all be in English.</p>

                <p>We encourage students and new graduates as well as professionals to attend DevConf.US. We also have attendee coaching available for people who are new to attending conferences! 
		 Please choose to either be a new attendee coach or apprentice when you register for the conference.</p>

                <p>We are committed to fostering an open and welcoming environment at our conference.
                   We set expectations for inclusive behavior through our code of conduct and media policies, and are prepared to enforce these.</p>
			</div>
		</div>
	</div>
</section>
<!--
<section id="registration" class="mx-auto col-lg-11">
    <div class="mt-4 py-5">
    	<h1 class="mont-700 underline pb-4">Registration</h1>
        <link rel="stylesheet" type="text/css" href="https://pretix.eu/devconf/devconfus2024/widget/v1.css" crossorigin>
		<script type="text/javascript" src="https://pretix.eu/widget/v1.en.js" async crossorigin></script>

        <div class="pretix-widget-compat" event="https://pretix.eu/devconf/devconfus2024/" single-item-select="button"></div>
		<noscript>
		<div class="pretix-widget">
			<div class="pretix-widget-info-message">
					JavaScript is disabled in your browser. To access our ticket shop without JavaScript, please <a target="_blank" rel="noopener" href="https://pretix.eu/devconf/devconfus2024/">click here</a>.
			</div>
		</div>
		</noscript>
    </div>
</section>
-->
<section id="themes" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h1 mx-5 pb-4 underline position-relative mont-700">Conference Themes</div>
	</div>
	<div class="row py-4">
		<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-2 mx-auto">
			<ul class="timeline timeline-centered">
			<?php

				$topics = array(
					array("name"=>"Cloud, Hybrid Cloud and Hyperscale Infrastructure","description"=>"Topics around Kubernetes, high availability, anything that powers large data centers or small private clouds, best practices for infrastructure management, operations at scale, and resource efficiency. Topics related to virtualization, containers, and Kubernetes.<br><br><i>Containers, OpenShift, Kubernetes, KVM, OpenStack, Cloud Native, MOC, Scalability, Availability, Data Center, Private Clouds, Virtualization</i>"),
                        array("name"=>"Artificial Intelligence and Data Science", "description"=>"Topic for artificial intelligence, statistics and machine learning, both theory and practice. Do you have an AI application to demonstrate, novel architecture, performance comparison, red teaming report or a data processing pipeline you are really proud of? This is the track for you. The only requirement is that artificial intelligence must be central to it.<br><br><i>InstructLab, Open Data Hub, LLM, PyTorch, llama.cpp, vLLM, KServe, Kubeflow</i>"),
                        array("name"=>"Application and Services Development", "description"=>"Topics around building and deploying apps, modern application development, services development, application monitoring and observability, cloud-native apps, application modernization, and single-sourcing documentation.<br><br><i>Application, Application Development, Application Services, Cloud-native, Monitoring, Observability, Programming Languages, Application Testing, Documentation</i>"),
                        array("name"=>"DevOps and Automation", "description"=>"Topics related to defining a release pipeline, automating developer environments, and building environments from developer sandboxes to production. This track covers ensuring application uptime, continuous application development, and agile development practices. It also includes discussions on Site Reliability Engineering (SRE) tools and best practices, AppOps, and testing strategies in DevOps environments. Additional focus areas include embedded intelligence in products for automation and the role of AI in test failure analysis, test generation, and test selection.<br><br><i>Automation, DevOps, Konflux, Ansible, AIOps, CI/CD, Tekton, ArgoCD</i>"),
                        array("name"=>"Security and Compliance", "description"=>"This track focuses on integrating security into development processes, shifting compliance left, and managing compliance in deployments. It explores areas such as the zero-trust security model, Post Quantum Cryptography (PQC) as well as the use of machine learning in security automation and risk management. This track also covers the evolution of legislation and mandates in terms of security compliance.<br><br><i>Remote Attestation, Policy as Code, PQC, Identity Management, MFA, Zero Trust, Data Governance, DORA, NIS2, Confidential Computing, SBOM, SSML, Vulnerability Management, Configuration Compliance, FIPS, Auditing</i>"),
                        array("name"=>"UX and Design", "description"=>"This track focuses on the issues related to User Experience Design (UX), including Interface Design (UI), research, design thinking, design methods, and other aspects of UX. It is dedicated to sharing knowledge on how to create seamless, intuitive, and impactful user experiences, including but not limited to interfaces. By exploring the intersection of human-centered design and emerging technologies like AI, this track provides insights into transformative digital strategies that shape the future of user interactions.<br><br><i>Patternfly, UX, UI, Design, Design Thinking, AI, Interfaces, Prototyping, Wireframe, Creative, Experience, User Engagement, Human-centered Design, Workflow, Use Cases, Outcomes, Ideation, Testing</i>"),
                        array("name"=>"Open Track", "description"=>"Open to any other topics! We welcome open source student projects, presentations of diploma and bachelor theses, proposals for new projects, and any other topic that doesn’t fall under the listed themes but relates to general open source community topics. This includes customer success stories with open source, examples of open source initiatives in the public sector, and open source projects in academia - from zero to a successful open source project.<br><br><i>Student Projects, New Project Proposals, Open Source Community, Customer Success Stories, Open Source in Education, Operating Systems, Kernel, Edge, Automotive, Linux, dnf5, RPM, bootc, Emerging Technologies, Research, Sustainable Computing, Web3, Quantum Computing, Agile Transformation, Continuous Improvement, Agile Leadership, Culture, Collaboration, Mentorship, Decision Making, Strategic Thinking, Customer Feedback, Talent Development, Accessibility, Representation</i>")
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
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Feb 28, 2025</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">CfP Opens</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">May 5, 2025</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">CfP Closes</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		<!-- Second pair -->
	<!-- <div class="row">
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Week of June 12, 2023</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Schedule Published & Registration Opens</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">August 16, 2023</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Workshops</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

		<!-- Third pair -->
	<!-- <div class="row">
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">August 17, 2023</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Conference Day 1</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">August 18, 2023</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Conference Day 2</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

		<!-- Fourth pair -->
	<!-- <div class="row">
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">August 19, 2023</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Conference Day 3</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- <div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">September 24, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Conference Day 1</div>
					</div>
				</div>
			</div>
		</div>-->
		<!-- <div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700"></div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600"></div>
					</div>
				</div>
			</div>
		</div> -->
        <!-- </div>  -->
</section>
<section id="news" class="mx-auto py-5 col-lg-11">
	<div class="row mt-4">
		<div class="h1 mx-5 pb-4 underline position-relative mont-700">News</div>
	</div>
	<div class="row">
		<div class="col-lg-6 px-5 mx-auto">
			<!-- <p class="os-400"><span class="h6 mont-700">May 31, 2024</span> Schedule is live!</p> -->
			<p class="os-400"><span class="h6 mont-700">June 2, 2025</span> Registration is open!</p>
			<p class="os-400"><span class="h6 mont-700">April 28, 2025</span> Call for Proposals deadline extended to May 5, 2025 at 11:59pm ET</p>
			<p class="os-400"><span class="h6 mont-700">February 28, 2025</span> Call for Proposals is open, deadline to submit proposals is April 28, 2025</p>
			<p class="os-400"><span class="h6 mont-700">February 28, 2025</span> DevConf.US 2025 date announced: September 19-20, 2025</p>
			<!-- <p class="os-400"><span class="h6 mont-700">Jan 20, 2023</span> We have published a <a href="/assets/files/devconfUS-cfp-help.pdf" target="_blank">CfP help guide</a> to help you write an awesome proposal!</p>
			<p class="os-400"><span class="h6 mont-700">Jan 20, 2023</span> Join our <a href="https://discord.gg/devconf" target="_blank">Discord server</a>. Reach out to us in the <b>#cfp-help</b> channel for any help with proposals.</p> -->
			<!-- <p class="os-400"><span class="h6 mont-700">Jun 21, 2022</span> <a href="https://devconfus2022.sched.com" target="_blank">Schedule</a> is live!</p>
			<p class="os-400"><span class="h6 mont-700">Jun 21, 2022</span> <a href="https://events.redhat.com/profile/form/index.cfm?PKformID=0x607868abcd" target="_blank">Registration</a> is live!</p> -->
		</div>

		<div class="col-lg-4 px-5 mx-auto">
			<form action="https://devconf.us5.list-manage.com/subscribe/post?u=ad2f341fc41f78b232f2765e6&amp;id=5c698e706b&amp;f_id=00b4a1ebf0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate px-2 py-3 bordered text-center" target="_blank" novalidate>
				<div class="h3 mont-700">Sign up for newsletter</div>
					<div class="mc-field-group">
						<input type="email" value="" name="EMAIL" class="required email p-2" id="mce-EMAIL" placeholder="Email address">
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_25582686a9fc051afd5453557_189578c854" tabindex="-1" value=""></div>
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="px-4 py-2 mont-400">
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<!-- <section id="video-tour" class="mx-auto py-5 col-lg-11">
<div class="row">
		<div class="h1 mx-5 pb-4 underline position-relative mont-700">Boston Video Tour!</div>
	</div>
	<div class="row">
		<h4 class="mont-700 mb-0 position-relative mx-5 py-4">Want to share what you love about the Boston area? <a href="https://docs.google.com/forms/d/e/1FAIpQLSeZFbBiW20arjFBrgLBkWydgVXspK-1AmaxxIHnWpd2lf-VQA/viewform" target="_blank">Submit</a> a video tour today and we will showcase it during the conference. Checkout the guidelines on this below!</h4>
	</div>
	<div class="row py-4">
        <a href="/assets/files/video-tour.pdf" target="_blank" class="mont-700 position-relative mx-5 p-4 d-inline-block purple-href">Video Guidelines!</a>
	</div>
</section> -->

<!--
<section id="schedule" class="mx-auto col-lg-12 background-gray text-center mt-5 py-5">
	<div class="h1 mont-700 py-4 mt-3">Schedule</div>
	<a class="p-3 mont-700 mb-3 d-inline-block purple-href">SCHEDULE ISN'T AVAILABLE YET</a>
</section>
-->
<!-- <section id="participation" class="mx-auto py-5 col-lg-11">
	<div class="row">
		<div class="mont-700 h1 underline position-relative mx-5 pb-4">Health & Safety</div>
	</div>
	<div class="row">
		<h4 class="mont-700 mb-0 position-relative mx-5 py-4">Check out the link below to find out more about DevConf.US!</h4>
    </div>
	<div class="row py-4">
        <a href="/us/faq" class="mont-700 position-relative mx-5 p-4 d-inline-block purple-href">WHAT WE KNOW!</a> -->
<section id="travel" class="mx-auto py-5 col-lg-11">
	<div class="row">
		<div class="mont-700 h1 underline position-relative mx-5 pb-4">How to get there?</div>
	</div>
	<div class="row py-4">
		<div class="col-xl-3 container card-body my-2 ml-xl-auto mr-xl-3" style="background: #ada3ff">
			<div class="row h-100 align-items-center">
				<div class="col text-center">
					<img src="/assets/images/travel-around.svg" class="my-4" alt="Getting around icon" style="height: 74px">
					<h2 class="mont-700 mb-0">Getting around Boston</h2>
					<div class="card-text os-400 pt-3">Boston has a robust public transit system and the site is accessible by car.</div>
					<p class="card-text my-5">
						<a href="/us/aroundboston" class="border p-3 mont-700">MORE INFORMATION</a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 container card-body my-2 mx-xl-3" style="background: #4a4a7e">
			<div class="row h-100 align-items-center">
				<div class="col text-center">
					<img src="/assets/images/way-to.svg" class="my-4" alt="Getting to icon" style="height: 74px">
					<h2 class="mont-700 mb-0">Getting to Boston</h2>
					<div class="card-text os-400 pt-3">Boston is easily accessible by car, bus, train and plane.</div>
					<p class="card-text my-5">
						<a href="/us/toboston" class="border p-3 mont-700">MORE INFORMATION</a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 container card-body my-2 ml-xl-3 mr-xl-auto" style="background: #8e83e4">
			<div class="row h-100 align-items-center">
				<div class="col text-center">
					<img src="/assets/images/hotel.svg" class="my-4" alt="Hotel icon" style="height: 74px">
					<h2 class="mont-700 mb-0">Hotels</h2>
					<div class="card-text os-400 pt-3">Need a place to stay in Boston? We suggest these properties.</div>
					<p class="card-text my-5">
						<a href="/us/hotels" class="border p-3 mont-700">MORE INFORMATION</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- <section class="col-12 px-0" style="height: 450px;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2951.0950292770904!2d-71.48131544837175!3d42.29783767908894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e38a27a40998f7%3A0xc901f7bfb3e62eaa!2sSheraton%20Framingham%20Hotel%20%26%20Conference%20Center!5e0!3m2!1scs!2scz!4v1581493814798!5m2!1scs!2scz" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section> -->
@endsection

@include('_layouts.footerus')
