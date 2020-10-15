@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.IN | Virtual">
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
<title>DevConf.IN 2020</title>
@endsection


@section('body')
<header class="masthead vh-100">
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
			<a href="https://www.facebook.com/DevConf.IN" target="_blank" title="Facebook"><img src="/assets/images/facebook.svg" alt="facebook" class="social-icon"></a>
			<a href="https://twitter.com/devconf_in" target="_blank" title="Twitter"><img src="/assets/images/twitter.svg" alt="twitter" class="social-icon"></a>
			<a href="https://t.me/devconfin" target="_blank" title="Telegram"><img src="/assets/images/telegram.svg" alt="telegram" class="social-icon"></a>
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
			  <div class="virtual-stamp mont-700">
                virtual event
            </div>
			<div class="heading-text mont-700 h1 pt-5">
				December 17-19, 2020
			</div>
			<div class="heading-text mont-700 h4">
				<i class="fa fa-map-marker"></i> All over the world
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
			<img src="/assets/images/devconf-d-bengaluru.png" class="mw-100" alt="Brno DevConf image asset">
		</div>
		<div class="col-lg-6 px-5">
			<h1 class="mont-700 underline pb-4">About DevConf</h1>
			<div class="os-400">
                <p>DevConf.IN 2020 is the annual developer's conference organized by Red Hat, India. The conference provides a platform to the FOSS community participants and 
		enthusiasts to come together and engage in knowledge sharing activities through technical talks, workshops, panel discussions, hackathons and much more.</p>
		
		<p>While we are disappointed that we won’t be able to see you all in person, we're shifting to an awesome virtual event!</p>
		<p>There is no admission or ticket charge for DevConf.IN events. However, you are required to complete a free registration. Watch this site for updates about registration. 
		Talks, presentations and workshops will all be in English.</p>

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
						array("name"=>"Trending Tech","description"=>"Artificial Intelligence (AI), Machine Learning (ML), Internet of Things (IoT), Blockchain, Mobile"),
						array("name"=>"Storage and Networking","description"=>"Cloud Native Storage, Software Defined Storage, Storage Management, Distributed File System, Datastores, Big Data,  NFV/ VNF, DPDK, ODL, Software Defined Networking."),
						array("name"=>"Open Hybrid Cloud","description"=>"Multi-Cloud, Automation, OpenStack, Kubernetes, Serverless, Microservices, Containers, OpenShift/ PaaS, Hybrid Cloud Management, Operators, CNI, Virtualization, Kernel, Service Mesh."),
						array("name"=>"Developer Tools","description"=>"Container Tooling, CI/CD, DevOps, Code Editors Cloud native IDE, CLI, Local Development for Containers, Language Runtime, Debugging/Tracing, QE."),
						array("name"=>"FOSS Community & Standards", "description"=>"Community Trends, Governance, Licensing, Participation, Leadership, Agile."),
						array("name"=>"Design","description"=>"Experience Design, Emotional Design, Design for Wearables, VUI, AR/VR, Interaction Design, Information Architecture, Design Tools and Processes, Design Thinking, Design in Open Source, User Research, Methods of Collecting User Feedback, Strategies Towards Increased Transparency/Collaboration for Design and Development Across Teams."),
						array("name"=>"Documentaion", "description"=>"Writing for Enterprise Products, Automations Tools, Documentation Tools and Processes, Interactive Content, Content Structuring, Topic Based Authoring, Modularity, User Story Based or User Focused Documentation, UX Microcopy Documentation, Help Content, AI and Documentation, Upstream/Community Documentation, Findable Content, Documentation Workflows, Minimalism in Documentation, Information Architecture."),
						array("name"=>"Security", "description"=>"Open Source Security.")
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
		<div class="h1 mx-5 mont-700">Important dates</div>
	</div>
	<div class="row">
		<!-- Keep in pairs -->
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Oct 16, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">CfP Opens</div>
					</div>
 					<div class="row">
						<div class="col os-400"><a href="https://cfp.devconf.info">Submit your proposal &rarr;</a></div>
					</div>
			</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Nov 15, 2020</div>
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
				<div class="col-4 h5 mont-700">Nov 16 - Dec 5, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Paper Review</div>
					</div>
				</div>
			</div>
        </div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Dec 6, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Communication of selected Talks</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Third pair -->
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
				<div class="col-4 h5 mont-700">Dec 10, 2020</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Regsitration Opens</div>
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
@endsection

@include('_layouts.footerin')
