
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
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>FAQ - DevConf.IN</title>
@endsection


@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/in"><img src="/assets/images/devconf-logo-in-reverse.svg"></a></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="/in/" class="nav-link">Home</a>
				</li>
				<li class="nav-item active underline px-3">
					<a href="/in/faq" class="nav-link">FAQ</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/coc" target="_blank" class="nav-link">Policies</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<?php
	$questions = array(
		array("group" => "General Questions", "id" => "general", 
			"questions" => array( 
				array("q" => "Do you provide visa invitation letters?", "a" => "Yes, we can provide a visa invitation letter to accepted speakers and registered attendees. Please <a href='https://forms.gle/nr62qyM1E44Z8ubg6' target='_blank'>fill out the form</a> to request a visa invitation letter. If you need the visa invitation letter before our acceptance letters are sent out or before registration opens, specify the reason in the 'Additional Information' section of the form."),
				array("q" => "How can I contact the organizers and get in touch with other attendees?", "a" => "You can reach the organizers by emailing info@devconf.in. The official chat platform for communication is Matrix.")
			)),

		array("group" => "CfP Questions", "id" => "cfp", 
			"questions" => array( 
				array("q" => "What is the format of DevConf.IN? Can I present online?", "a" => "DevConf.IN is primarily an in-person event with some virtual elements, such as conference chat and streaming of select sessions. However, all presentations must be delivered in person, and virtual presentations are not an option."),
				array("q" => "What is a session/talk?", "a" => "A talk is where you present, usually with slides and demos, to an audience. The default time slot for each talk and Q&A is 35 minutes (we recommend 25-minute talk and 10-minute Q&A). A talk has one primary speaker and, optionally, a secondary speaker.<br><br>A talk should be bite-sized and focused on a certain topic. This means that you should not expect to be able to cover multiple broad areas in one talk. You can submit more than one proposal, to cover a set of topics, but we cannot guarantee their final scheduled order. Therefore, we recommend topics be independent so that they do not need to be presented in a specific order.<br><br>Please note that this year all presentations will be delivered in person."),
				array("q" => "What is a lightning talk?", "a" => "A lightning talk is a short presentation focused on getting people interested in something new. The goal of the lightning talk is to convey key information in a clear and concise manner. Smaller technical topics, project introductions, and research/thesis topic introductions are great topics for lightning talks.<br><br>A lightning talk is 15 minutes long. A lightning talk has one primary speaker.<br><br>All lightning talks are delivered in person."),
				array("q" => "What is a workshop?", "a" => "A workshop is a hands-on demo where you and other workshop leads interact with the audience with the goal to share your knowledge and experience on a particular bite-sized topic. The goal of a workshop is to teach or practice a skill. As a result, workshops should be actionable and goal-oriented.<br><br>A workshop is 80 minutes long. We allow up to 3 active presenters in a workshop. You must designate one of them to be the primary session leader.<br><br>All workshops are conducted live and are not recorded or streamed."),
				array("q" => "What is a meetup?", "a" => "Meetups are organized as in-person meetings. They are open to all participants, and they serve as a place for open discussions during the dedicated time, sharing the latest project developments and interaction with contributors and attendees.<br><br>A meetup is 80 minutes long. We allow up to 3 active presenters in a meetup. You must designate one of them to be the primary session leader.<br><br>All meetups are conducted live and are not recorded nor streamed."),
				array("q" => "What is a booth?", "a" => "A booth is a staffed table at the event. Booths are open to all participants at all times, and they serve as a place for conversations about the project and interaction with contributors, users, and attendees.<br><br>There must be at least one person at the booth at all times and there must be at least two staff members registered. Preference is given to booths that will run on both days.")
			)),

		array("group" => "Registration Questions", "id" => "registration", 
			"questions" => array( 
				array("q" => "How much does it cost to attend DevConf.IN?  Do I need to register?", "a" => "Admission to DevConf.IN is free and only requires that you register for a free ticket."),
				array("q" => "If the conference is free, why do I have to register?", "a" => "We use registration to manage several logistics issues around DevConf.IN.")
			)));
?>
<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Frequently Asked Questions (FAQ)</div>
	</div>
    <div class="row">
       <div class="h3 mx-5 mont-700 position-relative">We are excited to bring the DevConf India chapter back, this time in Pune!</div>
    </div>
	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
			<?php   foreach($questions as $q){
					echo '<a href="#' . $q['id'] . '">' . $q['group'] . '</a>';
				}
			?>
		</div>
	</div>
</section>
<hr>
<?php
foreach($questions as $q){
?>
<section id="<?php echo $q['id']; ?>" class="mx-auto col-lg-11 mb-5">
	<div class="row">
		<div class="h2 mx-5 my-4 mont-700"><?php echo $q['group']; ?></div>

		<div class="accordion w-100 mx-5" id="sub-<?php echo $q['id']; ?>">
		<?php foreach( $q['questions'] as $id => $value ){ ?>
			<div class="card">
				<div class="card-header collapsed mont-600" id="heading-<?php echo $q['id'] . $id; ?>" data-toggle="collapse" 
				     data-target="#collapse-<?php echo $q['id'] . $id; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $q['id'] . $id; ?>">
						<?php echo $value['q']; ?>
						<i class="fa"></i>
					
				</div>

				<div id="collapse-<?php echo $q['id'] . $id; ?>" class="collapse" aria-labelledby="heading-<?php echo $q['id'] . $id; ?>" data-parent="#sub-<?php echo $q['id']; ?>">
					<div class="card-body os-400">
						<?php echo $value['a']; ?>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section>
<?php
}
?>
@endsection

@include('_layouts.footerin')
