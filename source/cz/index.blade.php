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
<title>DevConf.CZ 2023</title>
@endsection


@section('body')
<header class="masthead min-vh-100">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top">
		<span class="nav-brand"><a href="#" class="home"><img src="/assets/images/devconf-logo-cz-reverse.svg" alt="DevConf logo"></a></span>
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
				<li class="nav-item active px-3">
					<a href="https://devconfcz2023.sched.com/" target="_blank" class="nav-link local">Schedule</a>
				</li>
				<li class="nav-item active px-3">
					<a href="#travel" class="nav-link local">How to get here?</a>
				</li>
                <li class="nav-item active px-3">
                    <a href="/cz/blog" class="nav-link local">Blog</a>
                </li>
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
			<a href="https://fosstodon.org/@devconf_cz" target="_blank" title="Fosstodon"><img src="/assets/images/fosstodon.svg" alt="fosstodon" class="social-icon"></a>
			<a href="https://matrix.to/#/#2023:devconf.cz" target="_blank" title=""><img src="/assets/images/matrix.svg" alt="matrix" class="social-icon"></a>
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
<!--            <div class="mini-stamp d-none d-lg-block">
                <span class="mont-700">MINI</span><br>LOCAL<br>IN-PERSON<br>CONFERENCE
            </div> 
            <div style="padding: 0 0 0 3rem" class="my-1 d-lg-none">
                <div class="mini-chip">
                    <span class="mont-700">MINI</span> LOCAL IN-PERSON CONFERENCE
                </div>
            </div>-->

            
            <div class="row py-5">
			    <div class="col-xl-6">
			        <div class="heading-text mont-700 h1">
				        See you in 2024
			        </div>
			        <div class="heading-text mont-700 h4">
                        <a href="#map" class="nav-link local d-inline-block" style="color: white; padding: 0px"><i class="fa fa-map-marker"></i> Brno, Czech Republic</a>
                    </div> 
                    <div class="heading-text pt-1 pt-xl-5 mt-5">
                        <a href="https://forms.gle/cWMSUKMRPG1scB8e6" target="_blank" class="border p-3 h2 mont-700" style="border-width: 3px !important;">POST-EVENT SURVEY</a>
                    </div>
                    <div class="heading-text pt-1">
                        <a href="https://www.youtube.com/playlist?list=PLU1vS0speL2ZdGybMAqmQjVWsi0GjH7d3" target="_blank" class="border p-3 h2 mont-700" style="border-width: 3px !important;">RECORDINGS</a>
                    </div>
  		        </div>      		    
   		    </div>
<!--        <div class="road-timeline-big">
            <ul class="timeline timeline-centered">
			<?php

				$roadmap = array(
                        array("name"=>"Jan 18, 2023", "next"=>false),
                        array("name"=>"DevConf.CZ 2023 CfP opens", "description"=>"", "next"=>false),
                        array("name"=>"Mar 17, 2023", "next"=>false),
                        array("name"=>"DevConf.CZ 2023 CfP closes", "description"=>"", "next"=>false),
                        array("name"=>"Mar 31, 2023", "next"=>false),
                        array("name"=>"DevConf.cz Mini", "description"=>"Brno", "next"=>false),
                        array("name"=>"Apr, 2023", "next"=>false),
                        array("name"=>"DevConf.CZ 2023 schedule published", "description"=>"", "next"=>false),
                        array("name"=>"Apr, 2023", "next"=>false),
                        array("name"=>"DevConf.CZ 2023 registration opens", "description"=>"", "next"=>false),
                        array("name"=>"Jun 16-18, 2023", "next"=>true),
                        array("name"=>"DevConf.CZ 2023", "description"=>"Brno/Hybrid", "next"=>true),
                        array("name"=>"Oct/Nov, 2023", "next"=>false),
                        array("name"=>"DevConf.cz Mini", "description"=>"Brno", "next"=>false),
					  );

				foreach($roadmap as $i=>$t){
					if($i%2 == 0){?>
                <?=($t['next']?"<div class='next-tag-big mont-700'>next</div>":"")?>
				<li class="timeline-item">
					<div class="timeline-content-left">
						<div class="<?=($t['next']?"mont-700":"mont-400")?> timeline-title"><?php echo $t['name'];?></div>
					</div>
					<div class="timeline-marker"></div>
				<?php }else{ ?>
					<div class="timeline-content-right">
						<div class="<?=($t['next']?"mont-700":"mont-400")?> timeline-title"><?php echo $t['name'];?></div>
						<p class="timeline-description <?=($t['next']?"os-700":"os-400")?>"><?php echo $t['description'];?></p>
					</div>
				</li>
				<?php }
				}
				if(count($roadmap)%2 == 1){
					echo "</div></li>";
				}?>
			</ul>
            </div>
-->
		</div>
	</div>
</header>
<!--<section class="mx-auto col-lg-11 roadmap-section">
    <div class="row pt-5">
        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-2 mx-auto">
            <ul class="timeline timeline-centered">
			<?php

				foreach($roadmap as $i=>$t){
					if($i%2 == 0){?>
                
				<li class="timeline-item">
					<div class="timeline-content-left">
						<div class="<?=($t['next']?"mont-700":"mont-400")?> timeline-title"><?=($t['next']?"<div class='next-tag-mobile mont-700'>next</div>":"")?><?php echo $t['name'];?></div>
					</div>
					<div class="timeline-marker"></div>
				<?php }else{ ?>
					<div class="timeline-content-right">
						<div class="<?=($t['next']?"mont-700":"mont-400")?> timeline-title"><?=($t['next']?"<div class='next-tag mont-700'>next</div>":"")?><?php echo $t['name'];?></div>
						<p class="timeline-description <?=($t['next']?"os-700":"os-400")?>"><?php echo $t['description'];?></p>
					</div>
				</li>
				<?php }
				}
				if(count($roadmap)%2 == 1){
					echo "</div></li>";
				}?>
			</ul>
        </div>
    </div>
</section> -->
<section id="about" class="mx-auto col-lg-11">
	<div class="row mt-4 py-5">
		<div class="col-lg-4 mx-5 mb-5 text-center">
			<img src="/assets/images/devconf-d-brno.png" class="mw-100" alt="DevConf image asset">
		</div>
		<div class="col-lg-6 px-5">
			<h1 class="mont-700 underline pb-4">About DevConf</h1>
			<div class="os-400">
                <p><strong>DevConf.CZ</strong> is annual, free, Red Hat sponsored community conference for developers, admins, DevOps engineers, testers, documentation writers and other contributors to open source technologies.
                   At DevConf.CZ, FLOSS communities sync, share, and hack on upstream projects together.</p>

               <!-- <p><strong>DevConf.cz Mini</strong> is a bi-annual, highly focused, local, in-person version of DevConf.cz. It offers an opportunity to return to our conference themes in a smaller setting and establishes a platform
                   for the Czech Republic and EMEA based community to sync, share and hack on upstream projects together.</p>-->

				<p>There is no admission or ticket charge for DevConf.CZ events. However, you are required to complete a free registration. Watch this site for updates about registration.</p>

                <p>We are committed to fostering an open and welcoming environment at our conference.
                   We set expectations for inclusive behavior through our code of conduct and media policies, and are prepared to enforce these.</p>
			</div>
	    </div>
    </div>
</section>
<section id="themes" class="mx-auto col-lg-11">
    <div class="row mt-4 py-5">
    	<div class="row w-100">
	    	<div class="h1 mx-5 mont-700">Conference Themes</div>
    	</div>
	    <div class="row py-4">
		    <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-2 mx-auto">
			    <ul class="timeline timeline-centered">
			<?php

				$topics = array(
						array("name"=>"Cloud, Hybrid Cloud and Hyperscale Infrastructure","description"=>"Topics around Kubernetes, high availability, anything that powers large data centers or small private clouds, best practices for infrastructure management and operations at scale, resource efficiency, setting up developer environments. Topic related to virtualization and kubernetes."),
                        array("name"=>"Future Tech and Open Research", "description"=>"What’s next? Any topics that are discussed or actively researched yet their impact is still potential. Best practices and great examples of open source research collaborations are welcome.<br><br>Trending topics from software development, metaverse, new trends in existing areas such as microservices, distributed computing, and continuous improvement, observability, quantum computing."),
                        array("name"=>"Edge, Mobile and Automotive", "description"=>"Modern embedded systems, microcontrollers, management of embedded systems, infrastructure for embedded systems, resource optimization and resource lean appliances, peripherals, tools for specific use cases, and edge in automotive."),
                        array("name"=>"HPC, Big Data and Data Science", "description"=>"High performance systems, data storing and processing, best practices for data lakes/data mesh, and parallelism and vector computing."),
                        array("name"=>"Linux Distributions and Operating Systems", "description"=>"Firmware, Linux kernel, base platform for containers, unorchestrated containers, desktop, updates from Fedora land, Silverblue, CentOS Stream, etc.<br><br>OS building and distribution, release management topics, package manager tools, data driven package management, integrating components into the system."),
                        array("name"=>"DevOps and Automation, Security and Compliance", "description"=>"How to define a release pipeline, how to automate developer environments, how to build developer sandboxes, how to ensure application uptime, continuous application development, agile development, SRE tools and best practices, AppOps and testing in DevOps environments.<br><br>Embedded intelligence in products for automation, IoB (internet of behaviors), analytics and automated remediation capabilities, risk and change analysis, AI powered orchestration, and machine learning in test automation (i.e, test failure analysis, test generation, and test selection)."),
                        array("name"=>"Application and Services Development", "description"=>"Build and deploy apps, modern application development, services development and challenges with running applications in cloud, application monitoring and cloud-ready apps, application modernization, single-sourcing documentation, etc."),
                        array("name"=>"Open Source Success Stories", "description"=>"Customer success stories with open source, examples of open source initiatives in public sector, open source projects in academia.<br><br>Ideas for new open source projects (includes lightning talks for pitching new ideas!)"),
                        array("name"=>"Agility, Leadership and DEI", "description"=>"Agile practices, UX, design/design thinking, community management and open source in education, open management practices.<br><br>Diversity, Equity and Inclusion topics (DEI)."),
                        array("name"=>"Open track", "description"=>"Open to any other topics!<br><br>Open Source student projects, diploma and bachelor thesis presentations, ideas for new projects and any other topic that does not fit into listed themes.")
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

<!--<section id="coffee" class="mx-auto col-lg-11">
	<div class="row mt-4 py-5">

        <div class="col-lg-6 px-5">
            <h1 class="mont-700 underline pb-4">Doubleshot at DevConf.CZ 2022</h1>
            <div class="os-400">
                <p>Our attendees always tell us how important it is to grab a cup of coffee at DevConf.cz and sit down in the hall for a chat with long-time friends and new acquaintances. 

We couldn't meet in Brno last year so we worked with our <a href="https://www.doubleshot.cz/en/products/devconf-sample-pack" target="_blank">friends at doubleshot</a> to put together a coffee tasting for you to enjoy during the conference. We're pleased to have worked with them again to bring this experience back in 2022!</p>

                <p>Doubleshot has chosen three coffees to compliment your experience at the DevConf.CZ 2022 virtual conference. One coffee for each day (3 x 70 g) plus one bonus coffee for the day before or day after. </p>

                <p><a href="https://www.doubleshot.cz/en/products/devconf-sample-pack" target="_blank">You can order your coffee on their website</a> for 197 CZK (~7.5 EUR) plus shipping. Order deadlines vary by country,
                so order early.  We look forward to seeing you online.</p>
            </div>
    </div>

    <div class="col-lg-4 mx-5 mb-5 text-center">
            <img src="/assets/images/devconf-d-coffee.png" class="mw-100" alt="Coffee DevConf image asset">
        </div>


    </div>

</section>-->

<section id="news" class="mx-auto py-5 col-lg-11">
<!--	<div class="row">
		<div class="h1 pb-4 mx-5 position-relative mont-700">Important dates</div>
	</div>
	<div class="row">
		<!-- Keep in pairs 
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Jan 28-29, 2022</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">DevConf.CZ</div>
					</div>

					<div class="row">
						<div class="col os-400"><a href="https://cfp.devconf.info">Submit your proposal &rarr;</a></div>
					</div>

				</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">May, 2022</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">DevConf.cz Mini Schedule published</div>
					</div>
				</div>
			</div>
                </div>
-->
		<!-- Second pair -->
<!--		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">May, 2022</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">DevConf.cz Mini Registration opens</div>
					</div>
				</div>
			</div>
		</div>

        <div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
            <div class="row">
                <div class="col-4 h5 mont-700">Jun 2, 2022</div>
                <div class="col-8">
                    <div class="row">
                        <div class="col mont-600">DevConf.cz Mini</div>
                    </div>
                </div>
            </div>
                </div>
    </div> -->
	<div class="row mt-4">
		<div class="h1 mx-5 mont-700">News</div>
	</div>
	<div class="row">
		<div class="col-lg-6 px-5 mx-auto">
             <p class="os-400"><span class="h6 mont-700">Jun 9, 2023</span> Piloting Matrix on DevConf.cz 2023. Join the space: <a href="https://matrix.to/#/#2023:devconf.cz" target="_blank">https://matrix.to/#/#2023:devconf.cz</a>.</p>
             <p class="os-400"><span class="h6 mont-700">Apr 28, 2023</span> DevConf.cz 2023 <a href="https://devconfcz2023.sched.com/" target="_blank">schedule</a> is published and <a href="https://devconfcz2023.eventbrite.com" target="_blank">registration</a> is open.</p>
             <p class="os-400"><span class="h6 mont-700">Mar 20, 2023</span> <a href="https://cfp.devconf.info" target="_blank">CfP for lightning talks</a> remains open.</p>
             <p class="os-400"><span class="h6 mont-700">Mar 10, 2023</span> Deadline to submit session for main DevConf.CZ event is extended to March 17, 2023 EOD everywhere.</p>
             <p class="os-400"><span class="h6 mont-700">Mar 10, 2023</span> DevConf.cz Mini | March 2023 - CfP closed.</p>
             <p class="os-400"><span class="h6 mont-700">Mar 8, 2023</span> You can follow us at <a href="https://fosstodon.org/@devconf_cz" target="_blank">Fosstodon</a>.</p>
             <p class="os-400"><span class="h6 mont-700">Mar 3, 2023</span> Online CfP office hours on Friday, from 2 - 3 PM CET (<a href="https://calendar.google.com/calendar/render?action=TEMPLATE&dates=20230303T130000Z%2F20230303T140000Z&details=Join%20the%20google%20meet%20room%3A%20meet.google.com%2Fpoz-gxuw-pnr%0A%0ACome%20and%20discuss%20your%20proposals%20for%20DevConf.cz%202023%20as%20the%20deadline%20for%20Call%20for%20Proposals%20is%20coming%20soon%20%28March%2010%2C%202023%29.%20Please%20join%20us%20if%3A%0A%0A%2Ayou%20have%20an%20idea%20for%20a%20talk%20at%20DevConf.cz%202023%20and%20need%20some%20help%20framing%20it%2C%C2%A0%0A%2Ayou%20know%20a%20topic%20and%20would%20like%20to%20get%20some%20feedback%20to%20prepare%20a%20presentation%2C%0A%2Ayou%27re%20working%20on%20something%2C%20but%20you%20are%20not%20sure%20if%20it%20can%20be%20interesting%20for%20the%20audience%20-%20come%20and%20tell%20us%20because%20what%20may%20seem%20boring%20to%20you%20can%20be%20supremely%20useful%20to%20others%2C%C2%A0%0A%2Ayou%20don%27t%20have%20a%20topic%20in%20your%20mind%2C%20but%20you%20want%20to%20see%20what%20other%20people%20are%20submitting.%0A%C2%A0%0ACfP%20Portal%3A%20https%3A%2F%2Fcfp.devconf.info%2F%C2%A0%0AConference%20website%3A%20https%3A%2F%2Fwww.devconf.info%2Fcz%2F%0ACfP%20deadline%3A%20March%2010%2C%202023%20%20%0AConference%20dates%20-%20June%2016-18%2C%202023&location=meet.google.com%2Fpoz-gxuw-pnr&text=Discussion%20about%20DevConf.CZ%202023%20CfP%20topics" target="_blank">Google</a>, <a href="https://calendar.yahoo.com/?desc=Join%20the%20google%20meet%20room%3A%20meet.google.com%2Fpoz-gxuw-pnr%0A%0ACome%20and%20discuss%20your%20proposals%20for%20DevConf.cz%202023%20as%20the%20deadline%20for%20Call%20for%20Proposals%20is%20coming%20soon%20%28March%2010%2C%202023%29.%20Please%20join%20us%20if%3A%0A%0A%2Ayou%20have%20an%20idea%20for%20a%20talk%20at%20DevConf.cz%202023%20and%20need%20some%20help%20framing%20it%2C%C2%A0%0A%2Ayou%20know%20a%20topic%20and%20would%20like%20to%20get%20some%20feedback%20to%20prepare%20a%20presentation%2C%0A%2Ayou%27re%20working%20on%20something%2C%20but%20you%20are%20not%20sure%20if%20it%20can%20be%20interesting%20for%20the%20audience%20-%20come%20and%20tell%20us%20because%20what%20may%20seem%20boring%20to%20you%20can%20be%20supremely%20useful%20to%20others%2C%C2%A0%0A%2Ayou%20don%27t%20have%20a%20topic%20in%20your%20mind%2C%20but%20you%20want%20to%20see%20what%20other%20people%20are%20submitting.%0A%C2%A0%0ACfP%20Portal%3A%20https%3A%2F%2Fcfp.devconf.info%2F%C2%A0%0AConference%20website%3A%20https%3A%2F%2Fwww.devconf.info%2Fcz%2F%0ACfP%20deadline%3A%20March%2010%2C%202023%20%20%0AConference%20dates%20-%20June%2016-18%2C%202023&et=20230303T140000Z&in_loc=meet.google.com%2Fpoz-gxuw-pnr&st=20230303T130000Z&title=Discussion%20about%20DevConf.CZ%202023%20CfP%20topics&v=60" target="_blank">Yahoo</a>, <a href="https://outlook.live.com/calendar/0/deeplink/compose?body=Join%20the%20google%20meet%20room%3A%20meet.google.com%2Fpoz-gxuw-pnr%0A%0ACome%20and%20discuss%20your%20proposals%20for%20DevConf.cz%202023%20as%20the%20deadline%20for%20Call%20for%20Proposals%20is%20coming%20soon%20%28March%2010%2C%202023%29.%20Please%20join%20us%20if%3A%0A%0A%2Ayou%20have%20an%20idea%20for%20a%20talk%20at%20DevConf.cz%202023%20and%20need%20some%20help%20framing%20it%2C%C2%A0%0A%2Ayou%20know%20a%20topic%20and%20would%20like%20to%20get%20some%20feedback%20to%20prepare%20a%20presentation%2C%0A%2Ayou%27re%20working%20on%20something%2C%20but%20you%20are%20not%20sure%20if%20it%20can%20be%20interesting%20for%20the%20audience%20-%20come%20and%20tell%20us%20because%20what%20may%20seem%20boring%20to%20you%20can%20be%20supremely%20useful%20to%20others%2C%C2%A0%0A%2Ayou%20don%27t%20have%20a%20topic%20in%20your%20mind%2C%20but%20you%20want%20to%20see%20what%20other%20people%20are%20submitting.%0A%C2%A0%0ACfP%20Portal%3A%20https%3A%2F%2Fcfp.devconf.info%2F%C2%A0%0AConference%20website%3A%20https%3A%2F%2Fwww.devconf.info%2Fcz%2F%0ACfP%20deadline%3A%20March%2010%2C%202023%20%20%0AConference%20dates%20-%20June%2016-18%2C%202023&enddt=2023-03-03T14%3A00%3A00%2B00%3A00&location=meet.google.com%2Fpoz-gxuw-pnr&path=%2Fcalendar%2Faction%2Fcompose&rru=addevent&startdt=2023-03-03T13%3A00%3A00%2B00%3A00&subject=Discussion%20about%20DevConf.CZ%202023%20CfP%20topics" target="_blank">Outlook</a>, <a href="https://outlook.office.com/calendar/0/deeplink/compose?body=Join%20the%20google%20meet%20room%3A%20meet.google.com%2Fpoz-gxuw-pnr%0A%0ACome%20and%20discuss%20your%20proposals%20for%20DevConf.cz%202023%20as%20the%20deadline%20for%20Call%20for%20Proposals%20is%20coming%20soon%20%28March%2010%2C%202023%29.%20Please%20join%20us%20if%3A%0A%0A%2Ayou%20have%20an%20idea%20for%20a%20talk%20at%20DevConf.cz%202023%20and%20need%20some%20help%20framing%20it%2C%C2%A0%0A%2Ayou%20know%20a%20topic%20and%20would%20like%20to%20get%20some%20feedback%20to%20prepare%20a%20presentation%2C%0A%2Ayou%27re%20working%20on%20something%2C%20but%20you%20are%20not%20sure%20if%20it%20can%20be%20interesting%20for%20the%20audience%20-%20come%20and%20tell%20us%20because%20what%20may%20seem%20boring%20to%20you%20can%20be%20supremely%20useful%20to%20others%2C%C2%A0%0A%2Ayou%20don%27t%20have%20a%20topic%20in%20your%20mind%2C%20but%20you%20want%20to%20see%20what%20other%20people%20are%20submitting.%0A%C2%A0%0ACfP%20Portal%3A%20https%3A%2F%2Fcfp.devconf.info%2F%C2%A0%0AConference%20website%3A%20https%3A%2F%2Fwww.devconf.info%2Fcz%2F%0ACfP%20deadline%3A%20March%2010%2C%202023%20%20%0AConference%20dates%20-%20June%2016-18%2C%202023&enddt=2023-03-03T14%3A00%3A00%2B00%3A00&location=meet.google.com%2Fpoz-gxuw-pnr&path=%2Fcalendar%2Faction%2Fcompose&rru=addevent&startdt=2023-03-03T13%3A00%3A00%2B00%3A00&subject=Discussion%20about%20DevConf.CZ%202023%20CfP%20topics" target="_blank">Office365</a>)</p>
            <p class="os-400"><span class="h6 mont-700">Jan 18, 2023</span> <a href="https://cfp.devconf.info" target="_blank">CfP opens</a>, deadline to submit proposals is Mar 10, 2023.</p>
            <p class="os-400"><span class="h6 mont-700">Dec 12, 2022</span> DevConf.CZ 2023 dates announced: Jun 16-18, 2023.</p>
            <p class="os-400"><span class="h6 mont-700">Oct 4, 2022</span> <a href="https://www.eventbrite.com/e/devconfcz-mini-november-2022-tickets-430870755027" target="_blank">Registration</a> for autumn Mini event is open.</p>
		</div>
		<div class="col-lg-4 px-5 mx-auto">
		        <form action="https://devconf.us5.list-manage.com/subscribe/post?u=ad2f341fc41f78b232f2765e6&id=acab0ee8de" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate px-2 py-3 bordered text-center" target="_blank" novalidate>
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
</section> 
<section id="schedule" class="mx-auto col-lg-12 background-gray text-center mt-5 pt-5">
	<div class="h1 mont-700 position-relative py-4 mt-3">Schedule</div>
	<a class="p-3 mont-700 mb-3 d-inline-block purple-href" target="_blank" href="https://devconfcz2022.sched.com/">SCHEDULE IS LIVE</a>
</section> -->
<section id="travel" class="mx-auto py-5 col-lg-11">
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
<section class="col-12 px-0 mt-5" style="height: 450px;" id="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5828.8794114720895!2d16.593681273902156!3d49.223568069664026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471294099dc06bbb%3A0xbfcf161b01a48b0d!2sFaculty%20of%20Information%20Technology%2C%20Brno%20University%20of%20Technology!5e0!3m2!1sen!2scz!4v1569001018524!5m2!1sen!2scz" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>
<a rel="me" href="https://fosstodon.org/@devconf_cz"></a>
@endsection

@include('_layouts.footercz')
