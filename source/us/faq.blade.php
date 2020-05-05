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
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>FAQ - DevConf.US</title>
@endsection


@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/us"><img src="/assets/images/devconf-logo-us-reverse.svg"></a></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="/us/" class="nav-link">Home</a>
				</li>
				<!-- <li class="nav-item active px-3">
					<a href="/us/aroundframingham" class="nav-link">Getting around Framingham</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/toframingham" class="nav-link">Getting to Framingham</a>
				</li> -->
				<!-- <li class="nav-item active px-3">
					<a href="/us/hotels" class="nav-link">Hotels</a>
				</li> -->
				<li class="nav-item active underline px-3">
					<a href="/us/faq" class="nav-link">FAQ</a>
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
				array("q" => "Will the talks be live-streamed or pre-recorded?", "a" => "This year, all sessions will be pre-recorded.  If your submission is chosen, you'll be asked to confirm your acceptance. Once you confirm your acceptance, you are expected to submit a video recording of your session by July 27.<br><br>We are still working out some details, but our plan is for each speaker to be available for Q&A at the end of their scheduled session time."),
				array("q" => "Will the workshops be live-streamed or pre-recorded?", "a" => "We are planning to include a day of live, virtual workshops on 23 September 2020.  You'll notice the CfP for workshops closes earlier than sessions, on 8 July 2020.  This is to allow plenty of time to work out the logistics of the workshops."),
				array("q" => "I have multiple sessions accepted.  Do I have to submit videos for all of them?", "a" => "Only confirm your acceptance for the sessions you will submit videos for.  There is a maximum of 3 videos allowed per speaker.  Once you confirm, we will expect to receive your video by July 27."),
				array("q" => "Can I add a co-speaker to my submission?", "a" => "Yes, please indicate on the CfP submission if you'll be co-presenting.  If you'd like to add a co-speaker to a submission or an accepted session, no worries!  Please email us at <a href='mailto:info@devconf.us'>info@devconf.us</a> with your update.")
			)),

		array("group" => "Schedule / CfP Questions", "id" => "schedule", 
			"questions" => array( 
				array("q" => "Where is the schedule? When will the schedule be ready?", "a" => "We hope to release the schedule around August 17, 2020.<br><br>We are planning to host workshops on 23 September 2020, then sessions on 24 September and end on 25 September. These dates may change slightly, so do watch for the final schedule."),
				array("q" => "When should I expect to receive an acceptance notification by?", "a" => "We receive a large number of high quality submissions. With the pivot to virtual this year, we have already sent out a first round of acceptance notifications.  We expect to send out acceptances throughout the open CfP, to allow for as much time as possible for our presenters to confirm and prepare their videos by July 27."),
				array("q" => "Once I confirm my acceptance and submit my video, can I be assured that my session will be shown?", "a" => "Our track teams will review your video submissions as they come in.  We may, on a case-by-case basis, ask for you to update your video if we find a problem (technical or otherwise).  We will provide guidelines for how to record and submit your video, we'll be adding information to this site in the days ahead.")
			)),

		array("group" => "Registration Questions", "id" => "registration", 
			"questions" => array( 
				array("q" => "How much does it cost to attend DevConf.US?  Do I need to register?", "a" => "Admission to DevConf.US is free and only requires that you register. Registration details should be available around August 17, 2020."),
				array("q" => "If the conference is free, why do I have to register?", "a" => "We use registration to manage several logistics issues around DevConf.US.  We've never planned a virtual conference before!!<br><br>We want to ensure we've chosen the right platform for our sessions, chats, booths, and workshops based on the registration numbers.")
			)),

		array("group" => "Speaker Questions", "id" => "speaker", 
			"questions" => array( 
				array("q" => "Why does the speaker confirmation form ask you for a sched.org email address?", "a" => "We will be publishing our schedule there and having your preferred email address for that service lets us give you some editing rights for your session. Some speakers may use a different address for sched.org so we want to collect that from them. If you don’t have a preference or don’t have one already, just provide any email address you read and we will do the rest."),
				array("q" => "What else should I know?", "a" => "We're excited for our first Virtual DevConf.US.  We hope you'll be patient with us as we work out the details, together. Please email us at <a href='mailto:info@devconf.us'>info@devconf.us</a> with any other questions and especially any ideas you have!")
		)),

		array("group" => "Diversity & Inclusion Questions", "id" => "diversityandinclusion",
			"questions" => array(
				array("q"=>"How is DevConf.US encouraging diversity and inclusion now that the conference is virtual?", "a" => "In past years, we've offered diversity scholarships and coaching for new speakers.  We'll be offering programs for our virtual event, also.  We will pair coaches with new speakers to help with presentation content as well as video production.  This option will be available on the acceptance notification.  More details on this and other efforts will be added to our site in the near future.")
		))
	);

?>
<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Frequently Asked Questions (FAQ)</div>
	</div>
    <div class="row">
       <div class="h3 mx-5 mont-700 position-relative">We are excited to organize our first ever Virtual DevConf.US with you!</div>
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

@include('_layouts.footerus')
