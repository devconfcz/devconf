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

    $bgs = array("Cloud & Hyperscale" => "table-danger", "Future Tech and Open Research" => "table-primary",
                 "Bughunting" => "table-active", "Workshop" => "table-success");
	$schedule = array(
	    array("start"=>"14:00", "items"=>array(
    	    array("end"=>"14:15", "length"=>15, "name"=>"Check-in and welcome")
    	)),
        array("start"=>"14:15", "items"=>array(
            array("end"=>"14:55", "length"=>40, "name"=>"Panel discussion: This is how we use hybrid cloud", "description"=>"Linux Integration Engineering teams (formerly Cyborg) will show you how we embrace hybrid cloud, Red Hat's and IBM's strategic direction. There are many projects and services in our department that deploy into multiple platforms, datacenters and public clouds. Panelists are seasoned engineers who have years of experience in development, maintenance, service architecture, scalability and security. If you are working on microservices, in DevOps or SRE, or develop a service, you cannot miss this session.", "track"=>"Cloud & Hyperscale",
                "speakers"=>array(
                    array("name"=>"Tomáš Tomeček", "img"=>"", "socials"=>array("linkedin"=>"https://www.linkedin.com/in/tom%C3%A1%C5%A1-tome%C4%8Dek-20a30132/","github"=>"https://github.com/TomasTomecek")),
                    array("name"=>"Michael Hofmann", "img"=>"", "socials"=>array("linkedin"=>"https://www.linkedin.com/in/mh21/","github"=>"https://github.com/mh21")),
                    array("name"=>"Ondřej Budaj", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/ondrejbudai","github"=>"https://github.com/ondrejbudai")),
                    array("name"=>"Pavel Raiskup", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/pavel-raiskup","github"=>"https://github.com/praiskup")),
                    array("name"=>"Miroslav Vadkerti", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/miroslav-vadkerti-16119120","github"=>"https://github.com/thrix")),
                )
            )
        )),
        array("start"=>"15:00", "items"=>array(
            array("end"=>"15:40", "length"=>40, "name"=>"Easy automated Management of Virtual Machine with OpenShift Pipelines", "description"=>"OpenShift pipelines, based on Tekton, are powerful tools for automating tasks in a cluster like keeping applications up to date. But what happens when your applications are not yet containerized, and still in VMs? You require to apply your OpenShift pipeline to VMs. With kubevirt-tekton-tasks, cluster administrators can automate pipelines from copying a VM template, updating the template with new metadata, preparing a new disk with new files, to creating a new VM. Automating VMs can save a lot of time and money that would be invested in manual tasks.</p><p>In this session, we will introduce kubevirt-tekton-tasks and show how to automate creation of Windows 10 from copying and updating the template, creating the new disk with new files for the VM and creating the VM from it and how to customize it. We will also use kubevirt.io, an add-on for Kubernetes that is used to manage virtual machines.</p><p>Attendees will learn how to<br>- Create complete flow from creating / copying / modifying template to creating virtual machine from template<br>- Manage virtual machines with tekton", "track"=>"Cloud & Hyperscale", "room"=>"D2",
                "speakers"=>array(
                    array("name"=>"Karel Šimon", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/karel-%C5%A1imon-8b07a299","github"=>"https://github.com/ksimon1"))
                )
            ),
            array("end"=>"15:40", "length"=>40, "name"=>"Slice your business into functions and events", "description"=>"Various organizations started to look into serverless as a way of building business logic that can take advantage of the cloud. As it might look at first, it's not an easy task to rely strictly on functions that represent independent logic pieces. There is a risk of losing the big picture and by that not having full control over day-to-day operations.</p><p>In this session, Maciej will walk you through an approach that allows you to rely on serverless techniques such as functions and cloud events yet still working on the higher-level representation. He will introduce you to Workflow as a Function Flow concept that builds up on top of state of the art technologies such as Microprofile (Quarkus), CloudEvents, and KNative Eventing to deliver a highly scalable business-oriented solution that looks like a single service but runs as a set of functions.</p><p>The audience will get an introduction equipped with a set of demonstrations of function flows to prove the ease of use and visibility of the running solution.", "track"=>"Cloud & Hyperscale", "room"=>"D1",
                "speakers"=>array(
                    array("name"=>"Maciej Swiderski", "img"=>"", "socials"=>array("linkedin"=>"https://pl.linkedin.com/in/swiderskimaciej","github"=>"https://github.com/mswiderski"))
                )
            ),
            array("end"=>"15:40", "length"=>40, "name"=>"Self service cluster deployment using MCE", "description"=>"Have you ever tried to create a cluster in Openshift's Multicluster engine ? It can be quite a good experience if you have admin level of permissions. But what about typical developer/devops engineers ? We haven't had a good solution until now.</p><p>In this session, we will take a look at a new approach using cluster templates which allows admins to define guard-rails for developer/devops engineers who want to self-service their new, fully configured, cluster.", "track"=>"Cloud & Hyperscale", "room"=>"D3",
                "speakers"=>array(
                    array("name"=>"Rastislav Wágner", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/rastislav-w%C3%A1gner-b4a1534b","github"=>"https://github.com/rawagner"))
                )
            ),
            array("end"=>"16:40", "length"=>100, "name"=>"Bughunting challenge", "description"=>"BugHunting is a challenge for the conference attendees, who want to try their coding and debugging skills. Participants will be provided with several tasks in various programming languages. Each task consists of broken code and a bug report.</p><p>The purpose of every task is to find the bug and fix it in the code. Your solution is evaluated immediately after you submit it (you can submit as many times as you want) and you score points if your solution is correct (gained points can never be lost). Attendees with the most points will get a prize at the end of BugHunting session.</p><p>HOW TO JOIN<br>- You can just come and we’ll lend you a laptop.<br>- You can download and run the BugHunting container on your laptop (even any time after the conference - stop by for the credentials). For that, check the environment setup in our HowTo <a href='https://howto.bughunting.cz/env_setup.html' target='_blank'>https://howto.bughunting.cz/env_setup.html</a>.</p><p>For more information, see <a href='https://howto.bughunting.cz' target='_blank'>https://howto.bughunting.cz</a>.", "track"=>"Bughunting", "room"=>"S505",
                "speakers"=>array(
                    array("name"=>"Pavel Valena", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/pavel-valena-154422126","github"=>"https://github.com/pvalena")),
                    array("name"=>"Honza Horák", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/honza-hor%C3%A1k-7737163b","github"=>"https://github.com/hhorak")),
                    array("name"=>"Jarek Prokop", "img"=>"", "socials"=>array("github"=>"https://github.com/jackorp")),
                )
            ),
        )),
        array("start"=>"16:00", "items"=>array(
            array("end"=>"16:40", "length"=>40, "name"=>"Fine-tuning FinOps approach: the next step", "description"=>"Cloud financial management or FinOps in the cloud represents tools, products, practices, and cultural setup to increase the ability of an organization to understand and manage its cloud costs.</p><p>The current approaches for implementing FinOps practices rely on teams conforming to predefined rules that should make their technical solutions financially efficient. These rules are technical rules, based on financial models defined within the company to make sure that certain financial goals are met. For instance, the organization would create a rule that no snapshot should be older than certain number of days. A more extreme example might be setting the acceptable CPU utilization level for using certain instance type. This idea is focused on gaining financial benefit through educating teams how to lower the expenses, e.g., setting the retention policy for snapshots. This approach is assisted by various practices, tools, and products. No matter how implemented, the approach represents the extension of the financial side of an organization. Some recommendations will never get accepted by engineering teams because they are not providing enough technical evidence that applying them will lead to a sustainable engineering solution while saving money for the company.</p><p>Due to this business motivation, there is no long-lasting technical influence in the organization, making the overall impact limited.</p><p>The proposed approach offers methodology that establishes a framework not only for achieving financial results, but also for making a long-lasting technical influence. It is a framework that does not interfere directly with technical or financial domains, but coexists with them, acting as a corrective force. It treats an organization as a distributed system, affecting different subsystems to achieve its goals. The approach is about establishing advanced observability at scale, and it is most suitable for large organizations where it is difficult to discuss strategy with many teams directly.</p><p>The simple example might be a subsystem able to detect teams with different strategies for managing their snapshots and try to learn about them before imposing a rule that would affect the organization. These strategies might be different for different project types or for different environments. A more complex one would be the ability of a subsystem to detect different CPU utilization patterns and learn how to evaluate them more accurately. This learning would be supported by the subsystem but would have to be executed through a dialog with teams that have different usage patterns. This would empower the proposed subsystem with the new knowledge that would make the subsystem better at performing its recommendation function. The most complex example would be its strategic function. In this example, the company with a lot of teams would use the approach to steer its teams towards desired strategic goals which would unify technical and business goals. For instance, if an organization would like to improve its adoption of serverless technology, the subsystem would be able to detect different patterns for using serverless approach, e.g., some teams would use containers, some would use container platforms, some would use lambdas and some would use some combination, or something different. Then, a dialog between teams using representative patterns would be established and valuable knowledge would be formed. There is no algorithm that can generate this knowledge – the important part of the process, besides collecting a lot of data is engaging with teams, learning from this engagement, and feeding this knowledge into the system.</p><p>The difference between the current and the proposed approach is the effects they have on a system. The current approach favors short-term and easier to implement actions supported by rich reporting capabilities. It is more generic and applicable to wider range of organizations. The proposed one prefers long-term influence, through nurturing a dialog which would generate the knowledge that would be used to accomplish long-term organizational goals.</p><p>The need for the cultural shift is also discussed: the current approach expresses the cultural shift as a set of organizational rules for lowering expenses. There is no direct correlation between efforts to lower expenses and project goals. Therefore, these rules feel imposed upon teams. The proposed approach defines cultural shift as a contract between business and technology about the strategy that should bring success to an organization, hence the motivation to implement it. The proposed approach is used to guide strategy adoption.", "track"=>"Cloud & Hyperscale", "room"=>"D2",
                "speakers"=>array(
                    array("name"=>"Milorad Stević", "img"=>"", "socials"=>array("linkedin"=>"https://www.linkedin.com/in/miloradstevic/")),
                    array("name"=>"Andrew Thompson", "img"=>"","socials"=>array("linkedin"=>"https://www.linkedin.com/in/miloradstevic/")),
                )
            ),
            array("end"=>"16:40", "length"=>40, "name"=>"Red Hat OpenShift Data Foundation monitoring", "description"=>"Red Hat OpenShift Data Foundation (ODF) is a software-defined, container-native storage solution that's integrated with the OpenShift Container Platform. It is based on Rook, Ceph and NooBaa projects and as such, it provides file storage, block storage, or object storage for users to use. Each of those storage formats require user oversight and monitoring.</p><p>The audience will learn about various alerts that can appear in their storage cluster, where to check storage status and what monitoring is available for users that use ODF as Managed Service addon instead of standard offering.", "track"=>"Cloud & Hyperscale", "room"=>"D1",
                "speakers"=>array(
                    array("name"=>"Filip Balák", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/filip-balak","github"=>"https://github.com/fbalak"))
                )
            ),
            array("end"=>"16:40", "length"=>40, "name"=>"Perun: Keep your project's performance under control", "description"=>"Managing project's performance during its development is a tedious job and the lack of open-source tooling does not make it any easier. In this talk, we will introduce Perun: a tool for complex management of project's performance. Perun links profiling results to the corresponding project versions (commits) and leverages these associations for analysis of, e.g., performance changes.</p><p>We will demonstrate Perun's capabilities on two real-world use-cases: (1) we will show how Perun can be used to detect a known CPython performance issue and help with pinpointing the root cause of the issue; and, (2) we will show how Perun's fuzzing module can be used to generate inputs that could help manifest performance issues (e.g., ReDoS attacks) in the future.", "track"=>"Future Tech and Open Research", "room"=>"D3",
                "speakers"=>array(
                    array("name"=>"Jiri Pavela", "img"=>"", "socials"=>array("github"=>"https://github.com/JiriPavela"))
                )
            ),
        )),
        array("start"=>"17:00", "items"=>array(
            array("end"=>"17:20", "length"=>20, "name"=>"Migration Toolkit for Virtualization", "description"=>"Get your VMs into Cloud!", "track"=>"Cloud & Hyperscale", "room"=>"D2",
                "speakers"=>array(
                    array("name"=>"Martin Nečas", "img"=>"", "socials"=>array("linkedin"=>"https://www.linkedin.com/in/martin-n-17281713b/","github"=>"https://github.com/mnecas"))
                )
            ),
            array("end"=>"17:20", "length"=>20, "name"=>"500 commits journey to Kubernetes", "description"=>"In 2019 Zeta Global DevOps team started the long journey to the world of hybrid cloud. Since then we went through a successful migration of the business services from bare-metal servers to containerized setup, employing Kubernetes as a scheduler, and GitOps Toolkit as the entry point to the cluster.</p><p>During the talk I'll be sharing how our cluster deployment and maintenance processes and tooling matured, and how we worked with Engineering on making Zeta applications cloud-ready.</p><p>The talk is dedicated to the problem of going from bare-metal deployments to containers, and to the Kubernetes, and covers Zeta Global Kubernetes infrastructure in full.</p><p>We had a long journey, and I hope our experience will be helpful to both DevOps and Engineering organizations in other companies.", "track"=>"Cloud & Hyperscale", "room"=>"D1",
                "speakers"=>array(
                    array("name"=>"Vasyl Kaigorodov", "img"=>"", "socials"=>array("linkedin"=>"https://www.linkedin.com/in/vasyl-kaigorodov","github"=>"https://github.com/br0ziliy"))
                )
            ),
            array("end"=>"17:20", "length"=>20, "name"=>"Dreams vs. reality of applied data science in observability space", "description"=>"Service observability is a capability of software to produce sufficient output (metrics, logs, traces…) to reason about its internal state. In the last couple of years we've seen tremendous development in this area, especially in connection to distributed architecture and microservices. At the same time, AI/ML became commodity, with even very sophisticated tools available as open-source ready to be used against any data.</p><p>This talk will not be about applying the most sophisticated machine learning model of the year. Instead, we will share challenges, needs and lessons we've learned while working on a real world project centered around observability data.", "track"=>"Future Tech and Open Research", "room"=>"D3",
                "speakers"=>array(
                    array("name"=>"Ivan Nečas", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/ivan-necas-634a335a","github"=>"https://github.com/iNecas"))
                )
            ),
            array("end"=>"17:50", "length"=>50, "name"=>"Workshop: Simplify your Deployments with tanka and jsonnet", "description"=>"There are many configuration management approaches for Kubernetes. From plain yaml to complex Ansible Playbooks, everything is possible. We evaluated many solutions and found our perfect match with tanka and jsonnet.</p><p>In this workshop session, we'll migrate a yaml based Kubernetes deployment to tanka/jsonnet together and refine it for scale. Afterwards, you'll be able to simplify repetitive Kubernetes configurations and reuse common components across multiple projects.</p><p>To follow this workshop, you'll either need a Linux or MacOS workstation. WSL2 will also work.", "track"=>"Workshop", "room"=>"S505",
                "speakers"=>array(
                    array("name"=>"Dominik Süß", "img"=>"", "socials"=>array("github"=>"https://github.com/theSuess"))
                )
            ),
        )), 
		array("start"=>"17:30", "items"=>array(
		    array("end"=>"17:50", "length"=>20, "name"=>"log2rbac - Kubernetes operator that helps you to set up your RBAC rules correctly", "description"=>"If you have ever developed an operator pattern for Kubernetes, you have probably had to tweak your service account and assign it to a role. Setting up the RBAC correctly is not that hard, but it's not fun and it distracts you from the real problem the operator is about to solve. This often leads to assigning the cluster admin to the operator and neglecting the security altogether.</p><p>Log2rbac is a tool (yet another operator) that aims to solve this issue. It assists you with setting up your RBAC roles that are tailored for your application's needs. Come to see this talk and learn more.", "track"=>"Cloud & Hyperscale", "room"=>"D2",
                "speakers"=>array(
                    array("name"=>"Jiří Kremser", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/jirik","github"=>"https://github.com/jkremser"))
                )
            ),
            array("end"=>"17:50", "length"=>20, "name"=>"QtRVSim – RISC-V Simulator for Computer Architectures Classes", "description"=>"QtRVSim (<a href='https://github.com/cvut/qtrvsim' target='_blank'>https://github.com/cvut/qtrvsim</a>) is a free and open-source RISC-V-based computer system simulator designed for teaching and learning computer systems principles. The simulator allows students to run assembly programs and observe the instruction execution on single-cycle and pipelined microarchitectures. The simulator graphically displays the major components in the datapath, including the register file, the arithmetic-logic unit, memory caches, peripherals, and the control unit with control signals. The talk will present the current capabilities of the simulator and possible usages for teaching, as well as the design of its implementation and opportunities for future development.", "track"=>"Future Tech and Open Research", "room"=>"D1",
                "speakers"=>array(
                    array("name"=>"Jakub Dupak", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/jakub-dupak","github"=>"https://github.com/jdupak"))                )
            ),
            array("end"=>"17:50", "length"=>20, "name"=>"Testing IoT applications", "description"=>"", "track"=>"Future Tech and Open Research", "room"=>"D3",
                "speakers"=>array(
                    array("name"=>"Miroslav Jaroš", "img"=>"", "socials"=>array("linkedin"=>"https://cz.linkedin.com/in/mijaros","github"=>"https://github.com/mijaros"))
                )
            ),
		)),
		array("start"=>"18:00", "items"=>array(
		    array("end"=>"18:30", "length"=>30, "name"=>"Lightning talks", "description"=>"Share your lightning talks with us! You will be able to submit your lighting talk proposals on the whiteboard during the whole event. You can start thinking about your 5-minute talk you want to share with the audience now (slide-less is fine, keep the topic related to the conference).", "room"=>"D2")
		)),
		array("start"=>"18:30", "items"=>array(
		    array("end"=>"19:00", "length"=>30, "name"=>"Wrap up and move to the social event", "description"=>"", "room"=>"D2")
		))
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
				        }}} ?>
						<p><i class="fa fa-clock-o"></i>&nbsp;<?php echo $it['length']; ?> minutes<?php if(isset($it['room']) && $it['room'] != "") { ?> | <i class="fa fa-map-marker"></i>&nbsp;<?php echo $it['room']; } ?>
						<?php if(isset($it['track'])) { ?> | <i class="fa fa-tag"></i>&nbsp;<?php echo $it['track']; } 
						if(isset($it['description']) && $it['description']!=""){?>
						<span  data-toggle="collapse" data-target="#it<?php echo $k.$l; ?>" aria-expanded="false" aria-controls="it<?php echo $k.$l; ?>"><i class="fa fa-chevron-down"></i></span></p> <?php } ?>
				    </div>					
				    <div class="collapse" id="it<?php echo $k.$l; ?>">
                        <div class="card-body <?php if(isset($it['track'])){echo $bgs[$it['track']];}else{echo "table-warning";} ?>">
                            <p><?php echo $it['description']; ?></p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		
		<?php } ?>
	</div>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
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
