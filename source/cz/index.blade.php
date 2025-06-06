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
<title>DevConf.CZ 2025</title>
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
					<a href="/cz/schedule" class="nav-link local">Schedule</a>
				</li>
				<li class="nav-item active px-3">
					<a href="#travel" class="nav-link local">Getting to Brno</a>
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
            <a href="https://fosstodon.org/@devconf_cz" target="_blank" title="Fosstodon"><img src="/assets/images/fosstodon.svg" alt="fosstodon" class="social-icon"></a>
			<a href="https://twitter.com/devconf_cz" target="_blank" title="Twitter"><img src="/assets/images/twitter.svg" alt="twitter" class="social-icon"></a>
			<a href="https://www.linkedin.com/company/102081562/admin/feed/posts/" target="_blank" title="LinkedIn"><img src="/assets/images/linkedin.svg" alt="linkedin" class="social-icon"></a>
			<a href="https://matrix.to/#/#2025:devconf.cz" target="_blank" title=""><img src="/assets/images/matrix.svg" alt="matrix" class="social-icon"></a>
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
				        June 12-14, 2025
			        </div>
			        <div class="heading-text mont-700 h4">
                        <a href="#map" class="nav-link local d-inline-block" style="color: white; padding: 0px"><i class="fa fa-map-marker"></i> Brno, Czech Republic</a>
                    </div> 
                    <div class="heading-text mt-3 pt-1">
                        <a href="#registration" class="border nav-link local p-3 h2 mont-700" style="border-width: 3px !important;">Free Registration</a>
                    </div>
                    <div class="heading-text pt-1">
                        <a href="/cz/schedule" class="nav-link local border p-3 h2 mont-700" style="border-width: 3px !important;">SCHEDULE</a>
                    </div>
<!--                      <div class="heading-text mont-400 h5 pb-2 pb-lg-5">
                        The schedule will be released in April.
        			</div> -->       
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
                <p><strong>DevConf.CZ</strong> is an annual, free, Red Hat-sponsored technology conference for users, operators, administrators, and contributors to Free and Open Source technologies.</p>

               <!-- <p><strong>DevConf.cz Mini</strong> is a bi-annual, highly focused, local, in-person version of DevConf.cz. It offers an opportunity to return to our conference themes in a smaller setting and establishes a platform
                   for the Czech Republic and EMEA based community to sync, share and hack on upstream projects together.</p>-->

				<p>There is no admission or ticket charge for DevConf.CZ events. However, you are required to complete a free registration. Watch this site for updates about registration.</p>

                <p>We are committed to fostering an open and welcoming environment at our conference.
                   We set expectations for inclusive behavior through our code of conduct and media policies, and are prepared to enforce these.</p>
			</div>
	    </div>
    </div>
</section>
<section id="registration" class="mx-auto col-lg-11">
    <div class="mt-4 py-5">
    	<h1 class="mont-700 underline pb-4">Registration</h1>
        <link rel="stylesheet" type="text/css" href="https://pretix.eu/devconf/devconfcz2025/widget/v1.css">
        <script type="text/javascript" src="https://pretix.eu/widget/v1.en.js" async></script>

        <div class="pretix-widget-compat" event="https://pretix.eu/devconf/devconfcz2025/" single-item-select="button"></div>
        <noscript>
           <div class="pretix-widget">
               <div class="pretix-widget-info-message">
                    JavaScript is disabled in your browser. To access our ticket shop without JavaScript, please <a target="_blank" rel="noopener" href="https://pretix.eu/devconf/devconfcz2025/">click here</a>.
                </div>
           </div>
        </noscript>
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
						array("name"=>"Cloud, Hybrid Cloud and Hyperscale Infrastructure","description"=>"Topics around Kubernetes, high availability, anything that powers large data centers or small private clouds, best practices for infrastructure management, operations at scale, and resource efficiency. Topics related to virtualization, containers, and Kubernetes.<br><br><i>Containers, OpenShift, Kubernetes, KVM, OpenStack, Cloud Native, Scalability, Availability, Data Center, Private Clouds, Virtualization</i>"),
                        array("name"=>"Future Tech and Open Research", "description"=>"What’s next? Any topics that are being discussed or actively researched, yet whose impact is still potential. Best practices and great examples of open source research collaborations are welcome. Trending topics from software development, new trends in existing areas such as microservices, distributed computing, sustainable computing, Web3, or quantum computing.<br><br><i>Emerging Technologies, Research, Sustainable Computing, Web3, Quantum Computing</i>"),
                        array("name"=>"Artificial Intelligence and Data Science", "description"=>"Topic for artificial intelligence, statistics and machine learning, both theory and practice. Do you have an AI application to demonstrate, novel architecture, performance comparison, red teaming report or a data processing pipeline you are really proud of? This is the track for you. The only requirement is that artificial intelligence must be central to it.<br><br><i>InstructLab, Open Data Hub, LLM, PyTorch, llama.cpp, vLLM, KServe, Kubeflow</i>"),
                        array("name"=>"Linux Distributions, Operating Systems, and Edge", "description"=>"Everything related to Linux-based operating systems with a focus on Fedora Linux, CentOS Stream, RHEL, CoreOS, and Silverblue. Topics can include the operating system or new technologies and features such as bootc, immutable systems, dnf5, Konflux, edge, and automotive. All levels are welcome, from kernel and hardware, through operating system components and desktop news. Tools and processes for building distributions are also a great fit<br><br><i>Operating Systems, Kernel, Edge, Automotive, Linux, dnf5, RPM, bootc, Konflux</i>"),
                        array("name"=>"Application and Services Development", "description"=>"Topics around building and deploying apps, modern application development, services development, application monitoring and observability, cloud-native apps, application modernization, and single-sourcing documentation.<br><br><i>Application, Application Development, Application Services, Cloud-native, Monitoring, Observability, Programming Languages, Application Testing, Documentation</i>"),
                        array("name"=>"DevOps and Automation", "description"=>"Topics related to defining a release pipeline, automating developer environments, and building environments from developer sandboxes to production. This track covers ensuring application uptime, continuous application development, and agile development practices. It also includes discussions on Site Reliability Engineering (SRE) tools and best practices, AppOps, and testing strategies in DevOps environments. Additional focus areas include embedded intelligence in products for automation and the role of AI in test failure analysis, test generation, and test selection.<br><br><i>Automation, DevOps, Ansible, AIOps, CI/CD, Tekton, ArgoCD</i>"),
                        array("name"=>"Security and Compliance", "description"=>"This track focuses on integrating security into development processes, shifting compliance left, and managing compliance in deployments. It explores areas such as the zero-trust security model, Post Quantum Cryptography (PQC) as well as the use of machine learning in security automation and risk management. This track also covers the evolution of legislation and mandates in terms of security compliance.<br><br><i>Remote Attestation, Policy as Code, PQC, Identity Management, MFA, Zero Trust, Data Governance, DORA, NIS2, Confidential Computing, SBOM, SSML, Vulnerability Management, Configuration Compliance, FIPS, Auditing</i>"),
                        array("name"=>"Agility, Leadership, and Inclusion", "description"=>"This track explores the intersection of agility, leadership, and inclusion, offering strategies to build inclusive cultures, foster psychological safety, and lead diverse teams effectively. Learn how to align agile practices with inclusion principles to drive innovation and unlock your team’s potential.<br><br><i>Agile Transformation, Business Agility, Lean Principles, Continuous Improvement, Agile Leadership, Scaling Agile, Agile Coaching, Culture, Collaboration, Facilitation, Mentorship, Product Ownership, Change Management, Decision Making, Strategic Thinking, Customer Feedback, Talent Development, Diversity, Accessibility, Representation, Allyship, Intersectionality</i>"),
                        array("name"=>"UX and Design", "description"=>"This track focuses on the issues related to User Experience Design (UX), including Interface Design (UI), research, design thinking, design methods, and other aspects of UX. It is dedicated to sharing knowledge on how to create seamless, intuitive, and impactful user experiences, including but not limited to interfaces. By exploring the intersection of human-centered design and emerging technologies like AI, this track provides insights into transformative digital strategies that shape the future of user interactions.<br><br><i>Patternfly, UX, UI, Design, Design Thinking, AI, Interfaces, Prototyping, Wireframe, Creative, Experience, User Engagement, Human-centered Design, Workflow, Use Cases, Outcomes, Ideation, Testing</i>"),
                        array("name"=>"Open Track", "description"=>"Open to any other topics! We welcome open source student projects, presentations of diploma and bachelor theses, proposals for new projects, and any other topic that doesn’t fall under the listed themes but relates to general open source community topics. This includes customer success stories with open source, examples of open source initiatives in the public sector, and open source projects in academia - from zero to a successful open source project.<br><br><i>Student Projects, Diploma Theses, Bachelor Theses, New Project Proposals, Open Source Community, Project Development, Customer Success Stories, Academic Open Source, Public Sector Open Source, Open Source in Education, From Concept to Success</i>")
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
             <p class="os-400"><span class="h6 mont-700">Apr 15, 2025</span> Registration is open.</p>
             <p class="os-400"><span class="h6 mont-700">Mar 9, 2025</span> Call for Proposals (CfP) has been closed.</p>
             <p class="os-400"><span class="h6 mont-700">Feb 28, 2025</span> Call for Proposals (CfP) deadline is extended to March 9, 2025</p>
             <p class="os-400"><span class="h6 mont-700">Dec 9, 2024</span> Call for Proposals (CfP) is open, submit your proposals by March 2, 2025</p>
             <p class="os-400"><span class="h6 mont-700">Nov 28, 2024</span> DevConf.CZ 2025 date announced: June 12-14, 2025</p>
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
