
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
				array("q" => "Will the talks be live-streamed or pre-recorded?", "a" => "This year, all sessions will be pre-recorded.  If your submission is chosen, you'll be asked to confirm your acceptance. Once you confirm your acceptance, you are expected to submit a video recording of your session by Nov 15.<br><br>We are still working out some details, but our plan is for each speaker to be available for Q&A at the end of their scheduled session time."),
				array("q" => "Will the workshops be live-streamed or pre-recorded?", "a" => "Yes, the workshops need to be live, however you can pre-record it and share to your SPOC (will be communicated once your paper gets selected) to ensure you have a backup in case of network outage."),
				array("q" => "I have multiple sessions accepted.  Do I have to submit videos for all of them?", "a" => "Only confirm your acceptance for the sessions you will submit videos for.  There is a maximum of 3 videos allowed per speaker.  Once you confirm, we will expect to receive your video by Nov 15."),
				array("q" => "Can I add a co-speaker to my submission?", "a" => "Yes, please indicate on the CfP submission if you'll be co-presenting.  If you'd like to add a co-speaker to a submission or an accepted session, no worries!  Please email us at <a href='mailto:info@devconf.in'>info@devconf.in</a> with your update."),
				array("q" => "How long is a pre-recorded session?", "a" => "The pre-recorded sessions should be no longer than 35 minutes. There will be 10 minutes of live Q&A after each session. The speakers are required to be present during their sessions to answer any questions that come up.")

			)),

		array("group" => "Schedule / CfP Questions", "id" => "schedule", 
			"questions" => array( 
				array("q" => "Where is the schedule? When will the schedule be ready?", "a" => "We hope to release the schedule around December 10, 2020.<br><br>We are planning to host sessions on 17 December and end on 19 December. These dates may change slightly, so do watch for the final schedule."),
				array("q" => "When should I expect to receive an acceptance notification by?", "a" => "We receive a large number of high quality submissions. With the pivot to virtual this year, we have already sent out a first round of acceptance notifications.  We expect to send out acceptances throughout the open CfP, to allow for as much time as possible for our presenters to confirm and prepare their videos by Nov 15."),
				array("q" => "Once I confirm my acceptance and submit my video, can I be assured that my session will be shown?", "a" => "Our track teams will review your video submissions as they come in.  We may, on a case-by-case basis, ask for you to update your video if we find a problem (technical or otherwise).  We will provide guidelines for how to record and submit your video, we'll be adding information to this site in the days ahead.")
			)),

		array("group" => "Registration Questions", "id" => "registration", 
			"questions" => array( 
				array("q" => "How much does it cost to attend DevConf.IN?  Do I need to register?", "a" => "Admission to DevConf.IN is free and only requires that you register. Registration details should be available around December 10, 2020."),
				array("q" => "If the conference is free, why do I have to register?", "a" => "We use registration to manage several logistics issues around DevConf.IN.  We've never planned a virtual conference before!!<br><br>We want to ensure we've chosen the right platform for our sessions, chats, booths, and workshops based on the registration numbers.")
			)),

		array("group" => "Speaker Questions", "id" => "speaker", 
			"questions" => array( 
				array("q" => "Why does the speaker confirmation form ask you for a sched.org email address?", "a" => "We will be publishing our schedule there and having your preferred email address for that service lets us give you some editing rights for your session. Some speakers may use a different address for sched.org so we want to collect that from them. If you don’t have a preference or don’t have one already, just provide any email address you read and we will do the rest."),
				array("q" => "Are there any video recording guidelines?", "a" => "Yes! We have put together steps on how to record an awesome video with the open source software OBS. The steps can be found <a href='https://github.com/devconfcz/virtual-presentations/blob/master/Recording.md'>here</a>."),
				array("q" => "What are the audio & video requirements for the pre-recorded sessions?", "a" => "These are the audio & video requirements: <br><br>Video Format: MP4 <br><br>Video Frame Rate: 30 fps <br><br>Video Frame Size: 960x540 (you can make it higher resolution if you'd like) <br><br>Video Bit Rate: 1000kbps <br><br>Audio Format: AAC <br><br>Audio Channels: 2 <br><br>Audio Sample Rate: 44100 <br><br>Audio Bit Rate: 128kbps <br><br>The talk is more engaging if the audience can see you presenting, so we highly recommend overlaying your video on the slides in the video recording. Checkout out the video recording guidelines for information on how to do this!"),
				array("q" => "How should I submit the pre-recorded video?", "a" => "We recommend uploading the video to YouTube as unlisted. Once you have uploaded your video, go to 'accepted proposals' on the <a href='https://cfp.devconf.info/'>cfp site</a> to submit the link to your recorded video.  <br><br> If you would prefer to not to use YouTube, send the organizers an email at <a href='mailto:info@devconf.IN'>info@devconf.IN</a> and we will work with you to figure out alternate options."),
				array("q" => "What else should I know?", "a" => "We're excited for our first Virtual DevConf.IN.  We hope you'll be patient with us as we work out the details, together. Please email us at <a href='mailto:info@devconf.in'>info@devconf.in</a> with any other questions and especially any ideas you have!"),
			)));
?>
<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Frequently Asked Questions (FAQ)</div>
	</div>
    <div class="row">
       <div class="h3 mx-5 mont-700 position-relative">We are excited to organize our first ever Virtual DevConf.IN with you!</div>
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
