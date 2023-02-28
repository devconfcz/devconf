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
				<li class="nav-item active px-3">
					<a href="/us/aroundboston" class="nav-link">Getting around Boston</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/toboston" class="nav-link">Getting to Boston</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/hotels" class="nav-link">Hotels</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/healthandsafety" class="nav-link local">Health & Safety</a>
				</li>
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
				// array("q" => "Are the talks recorded or live-streamed?", "a" => "We give speakers the choice to either speak live or send us a pre-recorded session. Consider what would work best for your session goals.<ul><li>Pre-recorded session and live Q&A - during the session speaker interacts with audience in chat</li><li>Pre-recorded first half, second half live with the audience interaction</li><li>Live session - speaker can recruit their colleagues to help them out with the audience interaction</li></ul>"),
                array("q" => "What is a talk?", "a" => "<strong>A talk</strong> is where you talk using slides and demos to an audience that listens. A talk is  either <strong>25 minutes (including 5 minutes Q&A) or 50 minutes (including 10 minutes Q&A) long</strong>, make sure you reserve time at the end for Q&A. If speakers wish to continue with the <strong>Q&A</strong> after their time slot, there will be a dedicated place for it. A talk has one primary speaker, optionally another (secondary) speaker.</p><p><strong>A talk should be bite-sized and focused</strong> on a certain topic. This means that you should not expect to be able to cover multiple broad areas in one talk. You can submit more than one proposal, to cover a set of topics, but we cannot guarantee their final scheduled order. Therefore, we recommend topics be structured in a way so as to minimize their interdependence so that they do not need to be presented in a specific order."),
                array("q" => "What is a discussion?", "a" => "<strong>A discussion</strong> is a bit where <strong>you lead/moderate a discussion with a group of knowledgeable panelists</strong> where they answer prepared questions or questions from the audience as selected by you for appropriateness to your topic and session’s goal. It is more interactive than a talk because you could engage with the audience during the session. If you are willing to open the discussion to attendees, consider holding a fishbowl discussion where you start with a group of speakers and an empty “seat” which could be filled by active audience members in the course of a discussion.</p><p>A discussion is <strong>55 minutes long</strong>. If speakers wish to continue after the 55-minute slot, there will be a dedicated place for it. A discussion has a dedicated moderator and <strong>up to 5 active speakers</strong>"),
                array("q" => "What is a workshop?", "a" => "<strong>A workshop is a hands-on demo</strong> where you and other workshop leads interact among each other and with audience members, sharing your knowledge and experience on a particular bite-sized topic. The goal of a workshop is to teach or practice a skill. You should not expect the audience following each step of the workshop live, however, they should have all necessary instructions if they wish to. As a result workshops should be actionable and goal oriented.</p><p>We allow <strong>up to 3 active presenters</strong> in a workshop. You must designate one of them to be the primary session leader. Feel free to recruit your colleagues to interact with people in the audience while you are talking."),
                array("q" => "What about booths and meetups?", "a" => "<strong>Meetups and booths</strong> are open to all participants, they serve as a place for open discussions, sharing the latest project developments and interaction with contributors and attendees."),
			)),

		array("group" => "Schedule / CfP Questions", "id" => "schedule", 
			"questions" => array( 
				array("q" => "Where is the schedule? When will the schedule be ready?", "a" => "We hope to release the schedule by June 2023."),
				array("q" => "When should I expect to receive an acceptance notification by?", "a" => "We receive a large number of high quality submissions. We hope to send out acceptances by mid May 2023."),
				array("q" => "How do I write a good proposal?", "a" => "We have put together a <a href='/assets/files/devconfUS-cfp-help.pdf'>document</a> with guidelines on how to write a good proposal. You can ping us on the <b>#cfp-help</b> channel on our <a href='https://discord.gg/devconf'>discord</a> server with further questions."),
			)),

		array("group" => "Registration Questions", "id" => "registration", 
			"questions" => array( 
				array("q" => "How much does it cost to attend DevConf.US?  Do I need to register?", "a" => "Admission to DevConf.US is free and only requires that you register. Registration details will be available by June 2023."),
				array("q" => "If the conference is free, why do I have to register?", "a" => "We use registration to manage several logistics issues around DevConf.US.")
			)),

		array("group" => "Speaker Questions", "id" => "speaker", 
			"questions" => array( 
				array("q" => "Can I add a co-speaker to my submission?", "a" => "Yes, please indicate on the CfP submission if you'll be co-presenting.  If you'd like to add a co-speaker to a submission or an accepted session, no worries!  Please email us at <a href='mailto:info@devconf.us'>info@devconf.us</a> with your update."),
				array("q" => "Why does the speaker confirmation form ask you for a sched.org email address?", "a" => "We will be publishing our schedule there and having your preferred email address for that service lets us give you some editing rights for your session. Some speakers may use a different address for sched.org so we want to collect that from them. If you don’t have a preference or don’t have one already, just provide any email address you read and we will do the rest."),
				// array("q" => "Are there any video recording guidelines?", "a" => "Yes! We have put together steps on how to record an awesome video with the open source software OBS. The steps can be found <a href='https://github.com/devconfcz/virtual-presentations/blob/master/Recording-us.md'>here</a>."),
				// array("q" => "What are the audio & video requirements for the pre-recorded sessions?", "a" => "These are the audio & video requirements: <br><br>Video Format: MP4 <br><br>Video Frame Rate: 30 fps <br><br>Video Frame Size: 960x540 (you can make it higher resolution if you'd like) <br><br>Video Bit Rate: 1000kbps <br><br>Audio Format: AAC <br><br>Audio Channels: 2 <br><br>Audio Sample Rate: 44100 <br><br>Audio Bit Rate: 128kbps <br><br>The talk is more engaging if the audience can see you presenting, so we highly recommend overlaying your video on the slides in the video recording. Checkout out the video recording guidelines for information on how to do this!"),
				// array("q" => "How should I submit the pre-recorded video?", "a" => "We recommend uploading the video to YouTube as unlisted. Once you have uploaded your video, go to 'accepted proposals' on the <a href='https://cfp.devconf.info/'>cfp site</a> to submit the link to your recorded video.  <br><br> If you would prefer to not to use YouTube, send the organizers an email at <a href='mailto:info@devconf.us'>info@devconf.us</a> and we will work with you to figure out alternate options."),
				array("q" => "Will there be speaker coaching?", "a" => "Yes! When you confirm your session acceptance, you will be asked whether you would like to have a speaker coach and will be matched with one."),
				array("q" => "How does speaker coaching work?", "a" => "The speaker confirmation form invites new speakers to sign up for practicing their talks via a video conference ahead of DevConf.US and invites experienced speakers to coach new speakers through such practice. We hope that participating in this program will improve the experience of new speakers and improve the quality of talks at DevConf.US, and highly encourage experienced speakers to sign up as coaches. We have a <a href='/cz/speakerguide/' target='_blank'>speaker guide</a> and a <a href='/cz/speakercoachingguide/' target='_blank'>speaker coaching guide</a> available to support speakers and coaches. People who sign up, will receive their coaching matches by mid June 2023, with the expectation that they will schedule practice sessions between mid June 2023 and early August 2023. <br><br>We ask the coaches to take the lead on scheduling the practice session via a video conference (BlueJeans, Talky.io, Jitsi Meet, Zoom, Google Meet, Skype, etc). The speaker can choose to invite other audience members to the practice. In the practice session, the speaker delivers their practice talk, and the coach and other audience members provide feedback on the talk and slide deck. <br><br>Speakers and coaches agree to abide by the <a href='/coc/' target='_blank'>DevConf Code of Conduct</a> both during the conference and in any pre-conference coaching, practice, or other program related activities."),
				array("q" => "Will my talk be recorded?", "a" => "Yes. Our intention is to record every talk and make it available on YouTube and via a live-stream. If this is a problem, please contact us at <a href='mailto:info@devconf.us'>info@devconf.us</a> as soon as possible so we can determine if we can accommodate your request."),
			)),

		// array("group" => "Diversity & Inclusion Questions", "id" => "diversityandinclusion",
		// 	"questions" => array(
		// 		array("q"=>"How is DevConf.US encouraging diversity and inclusion now that the conference is virtual?", "a" => "In past years, we've offered diversity scholarships and coaching for new speakers.  We'll be offering programs for our virtual event, also.  We will pair coaches with new speakers to help with presentation content as well as video production.  This option will be available on the acceptance notification.  More details on this and other efforts will be added to our site in the near future.")
		// )),

        array("group" => "Attendee Coaching Questions", "id" => "attendeecoaching",
            "questions" => array(
                array("q" => "Will there be coaching for people who are new or have only attended a few technology or virtual conferences?", "a" => "Yes! When you register for the event, you will be asked whether you would like to be a coach or an apprentice and what topics you have experience in or are interested in. Coaches and apprentices will then receive their matches via email. We always get a lot of interest from people to be coached, and encourage people who have attended more than ten technology conferences to sign up as coaches. If you have attended fewer than three technology conferences, please consider signing up as an apprentice."),
                array("q" => "What are the goals for providing attendee coaching?", "a" => "<ol><li>Ensuring that apprentices have a friendly contact who can orient them to attending an open source technical conference. Additionally, introducing apprentices to ideas and skills that will be useful at future in-person conferences, such as how to find and participate in the hallway track.</li><li>Offering apprentices an opportunity to learn more about the topics they are interested in, be introduced to open source projects they might like to get involved in, and possibly receive advice that might be helpful for their career."),
                array("q" => "How does new attendee coaching work?", "a" => "Apprentices will be paired with coaches, with our best efforts being made to pair apprentices with coaches who have experience with one or more of the technical topics apprentices selected a preference for when registering. The coach will contact the apprentice prior to the conference to arrange a virtual meeting prior to attending the conference via a video conference (BlueJeans, Talky.io, Jitsi Meet, Zoom, Google Meet, Skype, etc) or a voice call. This meeting will give you a chance to exchange introductions, answer any questions the apprentice has as they prepare to attend the conference, learn about the apprentice's career goals, review the conference schedule together, and plan to attend some sessions together. During the conference, you will be invited to meet other apprentices and coaches.")
	)));

?>
<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Frequently Asked Questions (FAQ)</div>
	</div>
    <div class="row">
       <div class="h3 mx-5 mont-700 position-relative">We are excited to be back in person with you!</div>
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
