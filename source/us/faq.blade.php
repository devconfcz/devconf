@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.US | Virtual">
<meta property="og:site_name" content="DevConf.US">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-us-social.svg">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-us-social.svg">
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
				array("q" => "Will the workshops be live-streamed or pre-recorded?", "a" => "We are planning to include a day of live, virtual workshops on 23 September 2020. The CfP for workshops closes on 8 July 2020 to allow plenty of time to work out the logistics of the workshops."),
				array("q" => "I have multiple sessions accepted.  Do I have to submit videos for all of them?", "a" => "Only confirm your acceptance for the sessions you will submit videos for.  There is a maximum of 3 videos allowed per speaker.  Once you confirm, we will expect to receive your video by July 27."),
				array("q" => "Can I add a co-speaker to my submission?", "a" => "Yes, please indicate on the CfP submission if you'll be co-presenting.  If you'd like to add a co-speaker to a submission or an accepted session, no worries!  Please email us at <a href='mailto:info@devconf.us'>info@devconf.us</a> with your update."),
				array("q" => "How long is a pre-recorded session?", "a" => "The pre-recorded sessions should be no longer than 35 minutes. There will be 10 minutes of live Q&A after each session. The speakers are required to be present during the whole 45 minutes of their sessions to answer any questions that come up.")

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
				array("q" => "Are there any video recording guidelines?", "a" => "Yes! We have put together steps on how to record an awesome video with the open source software OBS. The steps can be found <a href='https://github.com/devconfcz/virtual-presentations/blob/master/Recording-us.md'>here</a>."),
				array("q" => "What are the audio & video requirements for the pre-recorded sessions?", "a" => "These are the audio & video requirements: <br><br>Video Format: MP4 <br><br>Video Frame Rate: 30 fps <br><br>Video Frame Size: 960x540 (you can make it higher resolution if you'd like) <br><br>Video Bit Rate: 1000kbps <br><br>Audio Format: AAC <br><br>Audio Channels: 2 <br><br>Audio Sample Rate: 44100 <br><br>Audio Bit Rate: 128kbps <br><br>The talk is more engaging if the audience can see you presenting, so we highly recommend overlaying your video on the slides in the video recording. Checkout out the video recording guidelines for information on how to do this!"),
				array("q" => "How should I submit the pre-recorded video?", "a" => "We recommend uploading the video to YouTube as unlisted. Once you have uploaded your video, go to 'accepted proposals' on the <a href='https://cfp.devconf.info/'>cfp site</a> to submit the link to your recorded video.  <br><br> If you would prefer to not to use YouTube, send the organizers an email at <a href='mailto:info@devconf.us'>info@devconf.us</a> and we will work with you to figure out alternate options."),
				array("q" => "Will there be speaker coaching?", "a" => "Yes! When you confirm your session acceptance, you will be asked whether you would like to have a speaker coach and will be matched with one."),
				array("q" => "How does speaker coaching work?", "a" => "The speaker confirmation form invites new speakers to sign up for practicing their talks via a video conference ahead of DevConf.US and invites experienced speakers to coach new speakers through such practice. We hope that participating in this program will improve the experience of new speakers and improve the quality of talks at DevConf.US, and highly encourage experienced speakers to sign up as coaches. We have a <a href='/cz/speakerguide/' target='_blank'>speaker guide</a> and a <a href='/cz/speakercoachingguide/' target='_blank'>speaker coaching guide</a> available to support speakers and coaches. People who sign up, will receive their coaching matches by July 22, with the expectation that they will schedule practice sessions between July 27 and August 14. <br><br>We ask the coaches to take the lead on scheduling the practice session via a video conference (BlueJeans, Talky.io, Jitsi Meet, Zoom, Google Meet, Skype, etc). The speaker can choose to invite other audience members to the practice. In the practice session, the speaker delivers their practice talk, and the coach and other audience members provide feedback on the talk and slide deck. <br><br>Speakers and coaches agree to abide by the <a href='/coc/' target='_blank'>DevConf Code of Conduct</a> both during the conference and in any pre-conference coaching, practice, or other program related activities."),
				array("q" => "What else should I know?", "a" => "We're excited for our first Virtual DevConf.US.  We hope you'll be patient with us as we work out the details, together. Please email us at <a href='mailto:info@devconf.us'>info@devconf.us</a> with any other questions and especially any ideas you have!"),
			)),

		array("group" => "Diversity & Inclusion Questions", "id" => "diversityandinclusion",
			"questions" => array(
				array("q"=>"How is DevConf.US encouraging diversity and inclusion now that the conference is virtual?", "a" => "In past years, we've offered diversity scholarships and coaching for new speakers.  We'll be offering programs for our virtual event, also.  We will pair coaches with new speakers to help with presentation content as well as video production.  This option will be available on the acceptance notification.  More details on this and other efforts will be added to our site in the near future.")
		)),

        array("group" => "Attendee Coaching Questions", "id" => "attendeecoaching",
            "questions" => array(
                array("q" => "Will there be coaching for people who are new or have only attended a few technology or virtual conferences?", "a" => "Yes! When you register for the event, you will be asked whether you would like to be a coach or an apprentice and what topics you have experience in or are interested in. Coaches and apprentices will then receive their matches via email. We always get a lot of interest from people to be coached, and encourage people who have attended more than ten technology conferences to sign up as coaches. If you have attended fewer than three technology conferences, please consider signing up as an apprentice."),
                array("q" => "What are the goals for providing attendee coaching?", "a" => "<ol><li>Ensuring that apprentices have a friendly contact who can orient them to attending an open source technical conference, and particularly one that is virtual. Additionally, introducing apprentices to ideas and skills that will be useful at future in-person conferences, such as how to find and participate in the hallway track.</li><li>Offering apprentices an opportunity to learn more about the topics they are interested in, be introduced to open source projects they might like to get involved in, and possibly receive advice that might be helpful for their career.</li></ol>Because there will not be as many opportunities to physically point out things in real time such as the hallway track, the coaching program will offer practical advice around those areas as a supplement to the main goal of helping new attendees navigate this new virtual event."),
                array("q" => "How does new attendee coaching work?", "a" => "Apprentices will be paired with coaches, with our best efforts being made to pair apprentices with coaches who have experience with one or more of the technical topics apprentices selected a preference for when registering. The coach will contact the apprentice prior to the conference to arrange a virtual meeting prior to attending the conference via a video conference (BlueJeans, Talky.io, Jitsi Meet, Zoom, Google Meet, Skype, etc) or a voice call. This meeting will give you a chance to exchange introductions, answer any questions the apprentice has as they prepare to attend the conference, learn about the apprentice's career goals, review the conference schedule together, and plan to attend some sessions together. During the conference, you will be invited to meet other apprentices and coaches. The coaching includes helping show apprentices how to participate in the virtual conference.")
	)));

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
