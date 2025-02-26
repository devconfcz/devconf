@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.cz | Brno, Czechia">
<meta property="og:site_name" content="DevConf.cz">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-cz-social.png">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-cz-social.png">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
<script src="/assets/build/js/matchHeight.js"></script>
@endsection

@section('title')
<title>Schedule - DevConf.CZ</title>
@endsection


@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/cz"><img src="/assets/images/devconf-logo-cz-reverse.svg"></a></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="/cz/" class="nav-link">Home</a>
				</li>
<!--				<li class="nav-item active px-3">
					<a href="/cz/aroundbrno" class="nav-link">Getting around Brno</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/tobrno" class="nav-link">Getting to Brno</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/hotels" class="nav-link">Hotels</a>
				</li> -->
                <li class="nav-item active px-3">
                    <a href="/cz/blog" class="nav-link">Blog</a>
                </li>
				<li class="nav-item active px-3">
					<a href="/cz/faq" class="nav-link">FAQ</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/coc" target="_blank" class="nav-link">Policies</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<?php

    $bgs = array("Workshop" => "table-danger", "Analysis, Testing and Automation" => "table-primary",
                 "HPC, Big Data and Data Science" => "table-active", "Open Source Education" => "table-success");
    $streams = array(); //array("D1"=>"https://youtube.com/live/OJd2hFcuaTo", "D2"=>"https://youtube.com/live/u9BatcpCUIc", "D3"=>"https://youtube.com/live/bHlaAVABLtg");
	$schedule = array(
	    array("start"=>"14:00", "items"=>array(
    	    array("end"=>"14:15", "length"=>15, "name"=>"Check in and welcome", "description"=>"")
    	)),
        
        array("start"=>"14:15", "items"=>array(
            array("end"=>"14:55", "length"=>40, "name"=>"OpenSource as a venue for an education", "description"=>"In this panel, we will focus on how open source projects can support education in a meaningful way. We will dive deep into challenges and opportunities in open source project contribution, their readiness to onboard new contributors, necessary time involvement, and desired skill sets from both sides - new contributors and project maintainers.", "room"=>"D2",
                "speakers"=>array(array("name"=>"Marek Haičman"), array("name"=>"Barbora Bühnová"), array("name"=>"Dan Čermák"), array("name"=>"Matěj Týč"), array("name"=>"Lukáš Kotek")),
                ),
            )
        ),
        
        array("start"=>"15:00", "items"=>array(
            array("end"=>"15:20", "length"=>20, "name"=>"Teaching technical writing fundamentals. Lesson learned.", "description"=>"Preparing and launching the technical writing course for the university. Support and collaboration with Red Hat colleagues. Improvements, takeaways, influence over 6 classes with the university students.", "track"=>"Open Source Education", "room"=>"D2", "files"=> array(array("name"=>"Slides", "path"=>"https://github.com/devconfcz/archive/blob/main/2023/March/DevConfCZMini/Teaching-technical-writing-fundamentals-Lesson-learned-Alexandra-Nikandrova-Sarka-Jana-Janderkova.pdf")),
                "speakers"=>array(array("name"=>"Alexandra Nikandrova"), array("name"=>"Šárka Jana Janderková")),
                ),
            array("end"=>"15:50", "length"=>40, "name"=>"Dealing with false failures in automated tests", "description"=>"Anything above a well isolated unit test suffers from sporadic failure with no evident reason. It complicates CI systems as it breaks smooth unattended workflow, it makes test results review time consuming and frustrating yet hides real issues if \"red\" result becomes the new standard. Some common strategies exist on how to deal with this non-deterministic behavior. Identification and understanding the root causes of test instability helps to choose the best option from these strategies and apply it to mitigate the flakiness.", "track"=>"Analysis, Testing and Automation", "room"=>"D1", "files"=> array(array("name"=>"Slides", "path"=>"https://github.com/devconfcz/archive/blob/main/2023/March/DevConfCZMini/Dealing-with-false-failures-in-automated-tests-Marian-Ganisin.pdf")),
                "speakers"=>array(array("name"=>"Marian Ganišin")),
                ),
            array("end"=>"15:20", "length"=>20, "name"=>"Toxicity Monitoring: Assurance of Community Health", "description"=>"The difficult aspect of community management is the detection of toxic messages, as a hostile community can destroy an otherwise successful project. Improvement of workflows by employing automatic post-processing and alerting frees the hands of moderators. In this talk, we will focus on the steps we took in the development of an NLP toxicity detection system based on a pre-trained classifier and showcase containerized services for convenient improvements and enhancements. Further, we will explore how is the system implemented into the current moderation process and used for the early detection of toxic messages, in addition to how it calculates long-term values from the ratio of toxic and non-toxic messages. These long-term values are used as a benchmark for alerting, incident identification, and mitigation as well as an overall indicator of community health. The aim of this talk is to provide a better understanding of community toxicity and its impact on Open-Source project reputation", "track"=>"Analysis, Testing and Automation", "room"=>"D3", "files"=> array(array("name"=>"Slides", "path"=>"https://github.com/devconfcz/archive/blob/main/2023/March/DevConfCZMini/Toxicity-Monitoring-DevConf-Presentation.pdf")),
                "speakers"=>array(array("name"=>"Václav Navrátil")),
                ),
            array("end"=>"17:00", "length"=>120, "name"=>"Your Gig with SonicPi", "description"=>"Would you like to make some friends and express yourself using music and code?<br>SonicPi is an open-source toolkit for music and digital art that lets you do just that.</p><p>Our workshop is designed for anyone interested in exploring the possibilities of SonicPi, from music enthusiasts to experienced programmers. We'll start with the basics and gradually move on to more advanced techniques, such as live coding and external hardware integration. You'll have the opportunity to experiment with various SonicPi features and experiment with your colleagues.</p><p>By the end of the workshop, you'll have a good understanding of how to use SonicPi to create your own music and digital art. To participate, all you need is a laptop with SonicPi installed, and headphones for a fully immersive experience.</p><p>We look forward to helping you unlock your creativity with SonicPi.", "track"=>"Workshop", "room"=>"S505",
                "speakers"=>array(array("name"=>"Julio Faerman")),
                )
            )
        ),
        
        array("start"=>"15:30", "items"=>array(
            array("end"=>"15:50", "length"=>20, "name"=>"Six principles related to how you teach and learn", "description"=>"Since we were kids, we have always seen that teachers speak and students listen. As kids, we sat in our classroom chairs just looking at the teacher in front of us “teaching” about the subjects and we were there “learning”.</p><p>As adults, we can notice that not a lot has changed. The same concepts are incorporated in how people participate in training classes. The trainer is talking and we, the learners, are listening, because the trainer is the subject matter expert, they know everything and we don’t. But researchers show that 70% of people that decide to participate in a training class to learn something new and maybe apply something on the job, already know a few things about the topic being covered.</p><p>In this talk I want to share six principles that should make every training, every class a lot more interesting and fun and where actually learners will learn. The principles and concepts apply to everything, regardless of environment (virtual or F2F) or tools used (open source or not). If you are a trainer/instructor/facilitator, you will apply these principles in your next class. If you are a learner, you will know exactly when you will be in a class really learning something or not.", "track"=>"Open Source Education", "room"=>"D2", "files"=> array(array("name"=>"Slides", "path"=>"https://github.com/devconfcz/archive/blob/main/2023/March/DevConfCZMini/Six-principles-related-to-how-you-teach-and-learn-Fernando-Colleone.pdf")),
                "speakers"=>array(array("name"=>"Fernando Colleone")),
                ),
            array("end"=>"15:50", "length"=>20, "name"=>"Packit: Fedora releases automated", "description"=>"Do you want to automate how you build and test your RPM packages? Do you maintain any package in Fedora and want to automate the releases? Or are you just interested in CI/CD on GitHub or GitLab, Fedora and integration of upstream projects with RPM-based Linux distributions? Then make sure to come to our talk about Packit. In this session, we would like to share our recent progress and invite you to use our automation.</p><p>Packit (https://packit.dev) started connecting upstream and downstream in 2019 and has grown rapidly since then. It is a tool and a service to help you integrate your open-source projects with RPM-based operating systems. Packit also automated the Fedora release process providing Fedora packagers with an easy way to maintain their packages.</p><p>If you are interested in all the news of what we have been working on in Packit lately or what are our plans and priorities for the future, this is the right talk for you to attend!", "track"=>"Analysis, Testing and Automation", "room"=>"D3", "files"=> array(array("name"=>"Slides", "path"=>"https://github.com/devconfcz/archive/blob/main/2023/March/DevConfCZMini/Packit-Fedora-releases-automated-Laura-Barcziova-Frantisek-Lachman-Matej-Focko.pdf")),
                "speakers"=>array(array("name"=>"Matej Focko"),array("name"=>"Laura Barcziová"),array("name"=>"František Lachman")),
                ),
            )
        ),  
        
        array("start"=>"16:00", "items"=>array(
            array("end"=>"16:40", "length"=>40, "name"=>"Learn deeplearning while racing autonomous cars", "description"=>"I will be presenting the donkeycar framework (https://docs.donkeycar.com/). An opensource framework written to race small radio controlled sized cars autonomously and how it is a great way to dive into deeplearning. The framework is mainly written in python, we are using Tensorflow to train the deeplearning models. The framework is usable to anyone: from low to advanced programming knowledge.</p><p>- Introduction: what is donkeycar, how it started and the community behind<br>- The core of the framework, how does it work, how do we acheive autonomous driving / racing using AI/ Deeplearning<br>- Learning even without a physical car -> a simulator we developped during covid to enable racing and remote teaching while lockdown. The simulator is also a great way to get in touch with the framework and avoid physical issues (batteries discharge, crashing into walls). (https://github.com/tawnkramer/sdsandbox).<br>- A demo of autonomous driving in the simulator ; Show some cool projects from the community", "track"=>"Open Source Education", "room"=>"D2",
                "speakers"=>array(array("name"=>"Maxime Ellerbach")),
                ),
            array("end"=>"16:40", "length"=>40, "name"=>"[in Czech] Superpočítač Karolina - minulost, současnost a budoucnost...", "description"=>"Představení superpočítače Karolina, administrace superpočítače, rozdíly oproti klasickým serverům, kompilace a použití software a specifické případy z produkce.", "track"=>"HPC, Big Data and Data Science", "room"=>"D1",
                "speakers"=>array(array("name"=>"Lukáš Krupčík"), array("name"=>"Jakub Kropáček")),
                ),
            array("end"=>"16:40", "length"=>40, "name"=>"Testing Farm - Testing System as a Service", "description"=>"Testing is an essential part of the software development process. Let's look at how the Testing Farm Team provides a significant value to other teams by offloading them from the hurdles to reliably run their tests and deal with unreliable infrastructure.</p><p>Testing Farm is an open-source Testing System as a Service. It is used as a testing backend for Fedora CI, CentOS Stream CI, Packit Github app, and RHEL9 CI. Let's look closely at the currently supported use cases, testing workloads, and integrations with the service from other CI systems, services, and users. The service is capable to run the tests in public or inside Red Hat. It uses various infrastructures for test execution, including PSI Openstack, Beaker, AWS, and Azure.</p><p>At the end of the presentation, we outline the future of the service, how we envision the service to provide value to Fedora contributors.", "track"=>"Analysis, Testing and Automation", "room"=>"D3",
                "speakers"=>array(array("name"=>"Miroslav Vadkerti")),
                )
            )
        ),  
        
        array("start"=>"17:00", "items"=>array(
            array("end"=>"17:20", "length"=>20, "name"=>"OSS & High Schools: Inside / Outside Perspective", "description"=>"The talk summarizes the experiences with promoting Open Source Software from two different angles. It offers the perspective of a former teacher of IT subjects at High School and a current Red Hat employee doing talks and workshops about Open Source and Linux for High School students. What are the expectations of High Schools about Open Source in subject instruction? Where may Open Source and Linux fit into its curriculum? What are the limitations? Are there any common misconceptions? And is there a common ground between Open Source industry and High Schools? These are the key questions the talk would like to answer.", "track"=>"Open Source Education", "room"=>"D2", "files"=> array(array("name"=>"Slides", "path"=>"https://github.com/devconfcz/archive/blob/main/2023/March/DevConfCZMini/OSS-High-Schools-Inside-Outside-Perspective-Lukas-Kotek.pdf")),
                "speakers"=>array(array("name"=>"Lukáš Kotek")),
                ),
            array("end"=>"17:20", "length"=>20, "name"=>"Dos and Don'ts of Messing Up with Big Data", "description"=>"When it comes to developing an application for a single user to access 1GB of data, it's not much of a challenge. However, when the application must work for thousands of users accessing the 1TB database simultaneously, many challenges can be encountered. In this talk, the focus will be on the challenges of making an application big data and cloud environment ready, particularly from the perspective of how it interacts with a database.</p><p>The talk is intended to be easily understood by medium-experienced developers, and will combine a bit of theory with a few practical examples. Several generic recommendations will be provided to keep in mind when developing an application for the cloud. By the end of the talk, attendees will have a higher chance of avoiding some of the traps in developing cloud-ready applications that access bigger databases. But don't worry, you'll not loose all the fun, there are many more traps waiting to be discovered along the way.", "track"=>"HPC, Big Data and Data Science", "room"=>"D1", "files"=> array(array("name"=>"Slides", "path"=>"https://github.com/devconfcz/archive/blob/main/2023/March/DevConfCZMini/DevConfcz-mini-Developers-Messing-Up-with-Data-in-Cloud.pdf")),
                "speakers"=>array(array("name"=>"Honza Horak")),
                ),
            array("end"=>"17:20", "length"=>20, "name"=>"Testing and Delivery of the Base Container images", "description"=>"BCI (Base Container Images) is a set of open-source container images that developers and operators can use as a foundation for containerizing applications.</p><p>BCIs cover a wide range of use cases and scenarios compared to traditional enterprise distribution images. We had to take a different approach to testing and delivery to cover all these new use cases.</p><p>In this session we briefly cover the history of the Base Container Images and the tooling that we created in the process. This includes our Dockerfile generator, the BCI test suite, and the pytest_container plugin. We also take a look how we moved the development from our internal build service to the public Open Build Service on https://build.opensuse.org and then to Github.", "track"=>"Analysis, Testing and Automation", "room"=>"D3",
                "speakers"=>array(array("name"=>"Dan Čermák")),
                )
            )
        ),  
        
        array("start"=>"17:30", "items"=>array(
            array("end"=>"17:50", "length"=>20, "name"=>"Significant performance improvements - first steps", "description"=>"Many developers dream about performance improvements. Dream big - how about significant performance improvements? This talk will answer questions and discuss principles of how and where to start maximizing efforts to attain significant performance improvements in your project. Principles will be explained using examples existing in DNF's codebase today.", "track"=>"Open Source Education", "room"=>"D2", "files"=> array(array("name"=>"Slides", "path"=>"https://github.com/devconfcz/archive/blob/main/2023/March/DevConfCZMini/Performance-improvements.pdf")),
                "speakers"=>array(array("name"=>"Jaroslav Mráček")),
                ),
            array("end"=>"17:50", "length"=>20, "name"=>"Run CI for everyone and still sleep at night", "description"=>"In this not-too-serious session, I would like to talk about what it means to run tooling, engineering services, and developer platform teams of the world. Especially the ones that both develop and operate their platform software. If you are a product developer, I'll tell you why the team cannot implement that one super important feature for your product to be released next week or why I really have no idea why your CI job failed, despite being the \"CI guy.\" If you are a test platform developer, I will tell you why you still should implement that feature and why you should try to understand why your developer users' CI job failed.</p><p>I have spent most of my professional life around development tooling: continuous integration pipelines, automated testing frameworks, static analyzers, and whatnot. My former team, called \"Test Platform,\" develops, operates, and supports OpenShift CI: a system that installs thousands of OpenShift clusters daily to run all kinds of tests. Life in test platform is always exciting, usually too much! Most days, they are developers, sometimes cluster operators, and sometimes product owners, but without a product and a business. Everything must always work; when it does not, developers cannot merge. Everything must be insanely configurable, but at the same time, everything must be rock solid.", "track"=>"Analysis, Testing and Automation", "room"=>"D3",
                "speakers"=>array(array("name"=>"Petr Müller")),
                )
            )
        ),  
        
        array("start"=>"18:00", "items"=>array(
            array("end"=>"18:30", "length"=>30, "name"=>"Lightning talks", "description"=>"Share your lightning talks with us! You will be able to submit your lighting talk proposals on the whiteboard during the whole event. You can start thinking about your 5-minute talk you want to share with the audience now (slide-less is fine, keep the topic related to the conference).", "room"=>"D1"),
            )
        ),
        
        array("start"=>"18:30", "items"=>array(
            array("end"=>"19:00", "length"=>30, "name"=>"Wrap up and move to social event", "description"=>"", "room"=>"D1"),
            )
        ),
	);

?>
<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Schedule</div>
	</div>
</section>
<hr>
<?php
foreach($schedule as $k=>$time){
?>
<section id="<?php echo $k; ?>" class="mx-auto col-lg-11 mb-5">
	<div class="row">
		<div class="h2 mx-5 my-4 mont-700"><?php echo $time['start']; ?></div>


		<?php foreach( $time['items'] as $l=>$it ){ ?>
		<div class="col-xs-12 col-sm-6 col-md-3 px-2">
			<div class="card mb-2">
				<div class="card-body <?php if(isset($it['track'])){echo $bgs[$it['track']];}else{echo "table-warning";} ?>">
				    <div class="card-title">
				        <strong><?php echo $it["name"]; ?></strong>
				    </div>
				    <div class="card-text">
				        <p><?php if(isset($it['speakers'])){foreach($it['speakers'] as $si=>$s){ if($si>0){echo ", ";} else { ?><i class="fa fa-user"></i> <?php } echo $s['name']; if(isset($s['socials'])){
                            echo " (";
                            $add = false;
				            foreach($s['socials'] as $sk=>$sv){
				            if($add){ echo " | ";
				            }else{ $add = true;
				            }?>
				            <a href="<?php echo $sv;?>" target="_blank"><i class="fa fa-<?php echo $sk;?> text-dark"></i></a>
				            <?php
				            }
				            echo ")";
				        }}} 
                        if(isset($it['room']) && $it['room'] != "" && isset($streams[$it['room']])){
                        ?>
                        <p><i class="fa fa-youtube-play"></i>&nbsp;<a class="text-decoration-none text-dark" href="<?php echo $streams[$it['room']]; ?>" target="_blank">Live stream</a></p>
                        <?php } 
                        if(isset($it['files'])){ foreach($it['files'] as $fi=>$f){ if($fi>0){echo ", "; } else { ?><p><i class="fa fa-files-o"></i>&nbsp; <?php } ?>
                        <a class="text-decoration-none text-dark" href="<?php echo $f['path']; ?>" target="_blank"><?php echo $f['name']; ?></a>
                        <?php } echo "</p>"; } ?>
						<p><i class="fa fa-clock-o"></i>&nbsp;<?php echo $it['length']; ?> minutes<?php if(isset($it['room']) && $it['room'] != "") { ?> | <i class="fa fa-map-marker"></i>&nbsp;<?php echo $it['room']; } ?>
						<?php if(isset($it['track'])) { ?> | <i class="fa fa-tag"></i>&nbsp;<?php echo $it['track']; } 
						if(isset($it['description']) && $it['description']!=""){?>
						<span class="float-right" data-toggle="collapse" style="cursor: pointer" data-target="#it<?php echo $k.$l; ?>" aria-expanded="false" aria-controls="it<?php echo $k.$l; ?>"><i class="fa fa-chevron-down"></i></span></p> <?php } ?>
				    </div>					
				    <div class="collapse" id="it<?php echo $k.$l; ?>">
                        <div class="card-body <?php if(isset($it['track'])){echo $bgs[$it['track']];}else{echo "table-warning";} ?>">
                            <p><?php echo (isset($it['description'])?$it['description']:""); ?></p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		
		<?php } ?>
	</div>
</section>
<?php
    
}
?>
<script>

    $(document).ready(function() {
        // matchHeight the contents of each .card-pf and then the .card-pf itself
        $(".row > [class*='col'] > .card .card-title").matchHeight({property: 'min-height'});
        $(".row > [class*='col'] > .card > .card-body").matchHeight({property: 'min-height'});
        $(".row > [class*='col'] > .card > .card-footer").matchHeight({property: 'min-height'});
        $(".row > [class*='col'] > .card").matchHeight({property: 'min-height'});

    });
</script>

@endsection

@include('_layouts.footercz')
