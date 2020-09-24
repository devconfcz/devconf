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
@endsection

@section('title')
<title>FAQ - DevConf.CZ</title>
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
				<li class="nav-item active underline px-3">
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
	$questions = array(
		array("group" => "General Questions", "id" => "general", 
			"questions" => array( 
				array("q" => "Are the talks recorded or live-streamed?", "a" => "We give speakers choice to speak live or send us a pre-recorded session. Consider what would work best for your session goals.<ul><li>Pre-recorded session and live Q&A - during the session speaker interacts with audience in chat</li><li>Pre-recorded first half, second half live with the audience interaction</li><li>Live session - speaker can recruit their colleagues to help them out with the audience interaction</li></ul>"),
                array("q" => "What is a talk?", "a" => "<strong>A talk</strong> is where you talk using slides and demos to an audience that listens. A talk is  either <strong>20 or 40 minutes long</strong>, make sure you reserve time at the end for Q&A. If speakers wish to continue with the <strong>Q&A</strong> after their time slot, there will be a dedicated place for it.  Feel free to recruit your colleagues to interact with people in chat while you are talking. A talk has one primary speaker, optionally another (secondary) speaker.</p><p><strong>A talk should be bite-sized and focused</strong> on a certain topic. This means that you should not expect to be able to cover multiple broad areas in one talk. You can submit more than one proposal, to cover a set of topics, but we cannot guarantee their final scheduled order. Therefore, we recommend topics be structured in a way so as to minimize their interdependence so that they do not need to be presented in a specific order.</p><p>We give speakers <strong>a choice to speak live or send us a pre-recorded session</strong>. We understand pre-recording your session requires extra time and extra set of skills and we are currently considering ways to make it easier for you. If you choose to pre-record your session, remember it only needs to be as good as you would do live. This is not a Hollywood movie :)"),
                array("q" => "What is a discussion?", "a" => "<strong>A discussion</strong> is a bit where <strong>you lead/moderate a discussion with a group of knowledgeable panelists</strong> where they answer prepared questions or questions from the audience as selected by you for appropriateness to your topic and session’s goal. It is more interactive than a talk because you could engage with the audience during the session. If you are willing to open the discussion to attendees, consider holding a fishbowl discussion where you start with a group of speakers and an empty “seat” which could be filled by active audience members in the course of a discussion.</p><p>A discussion is <strong>40 minutes long</strong>. If speakers wish to continue after the 40-minute slot, there will be a dedicated place for it. A discussion has a dedicated moderator and <strong>up to 5 active speakers</strong>.</p><p>Discussions are <strong>delivered live</strong>. We do not accept pre-recorded discussions."),
                array("q" => "What is a workshop?", "a" => "<strong>A workshop is a hands-on demo</strong> where you and other workshop leads interact among each other and with audience members on chat, sharing your knowledge and experience on a particular bite-sized topic. The goal of a workshop is to teach or practice a skill. You should not expect the audience following each step of the worksop live, however, they should have all necessary instructions if they wish to. As a result workshops should be actionable and goal oriented.</p><p>A workshop is <strong>40 minutes long</strong>, although we will consider exceptions. The number of attendees is not limited like it would be in an in-person event.</p><p>We allow <strong>up to 3 active presenters</strong> in a workshop. You must designate one of them to be the primary session leader. Feel free to recruit your colleagues to interact with people in chat while you are talking.</p><p>All workshops are <strong>conducted live</strong>. We do not accept pre-recorded workshops. However, you may find it <strong>useful to pre-record demo components</strong> of your workshop."),
                array("q" => "What about booths, meetups and contests?", "a" => "<strong>Meetups and booths</strong> are open to all participants, they serve as a place for open discussions, sharing the latest project developments and interaction with contributors and attendees.</p><p>We recognize that adjusting booths and meetups to the virtual environment is very challenging and we are considering steps we can take to ensure high meetup and booth traffick. We are working on a list of suggestions for virtual booths and meetups. We are open to working together with booth staff and meetup organizers in order to find the best possible solution in the virtual environment.</p><p><strong>Contests</strong> are easy to set up, there should be an intro meeting for those who want to join and then they can work on their own. We will provide a chat channel to help and monitor the contest.")
			)),

		array("group" => "Schedule / CfP Questions", "id" => "schedule", 
			"questions" => array( 
				array("q" => "Where is the schedule? When will the Schedule be ready?", "a" => "We hope to release the schedule in January 2021."),
				array("q" => "It’s after the deadline and I haven’t received an acceptance notification. What do I do?", "a" => "We receive an amazingly large number of high quality submissions. Our track teams that review the talks have to work a lot to read and decide on them all. We have expect to send out the first round of acceptances around November 30, 2020."),
			)),

		array("group" => "Registration Questions", "id" => "registration", 
			"questions" => array( 
				array("q" => "How much does it cost to attend DevConf.CZ?  Do I need to register?", "a" => "Admission to DevConf.CZ is free and only requires that you register for a free ticket. Registration details should be available in Januray 2021."),
				array("q" => "If the conference is free, why do I have to register?", "a" => "We use registration to manage several logistics issues around DevConf.CZ, most importantly our virtual platform requires registration."),
			)),

		array("group" => "Speaker Questions", "id" => "speaker", 
			"questions" => array(
                array("q" => "Can I add a co-speaker to my submission?", "a" => "Yes, you can set the co-speaker by yourself in CfP tool until the end of the CfP open window. If you'd like to add a co-speaker to a submission or an accepted session, no worries! Please email us at <a href='mailto:info@devconf.cz'>info@devconf.cz</a> with your update."),
				array("q" => "Why does the speaker confirmation form ask you for a sched.org email address?", "a" => "We will be publishing our schedule there and having your preferred email address for that service lets us give you some editing rights for your session. Some speakers may use a different address for sched.org so we want to collect that from them. If you don’t have a preference or don’t have one already, just provide any email address you read and we will do the rest."),
			//	array("q" => "How does speaker coaching work?", "a" => "The speaker confirmation form invites new speakers to sign up for practicing their talks via a video conference ahead of DevConf.CZ and invites experienced speakers to coach new speakers through such practice. We hope that participating in this program will improve the experience of new speakers and improve the quality of talks at DevConf.CZ, and highly encourage experienced speakers to sign up as coaches. We have a <a href='/cz/speakerguide/' target='_blank'>speaker guide</a> and a <a href='/cz/speakercoachingguide' target='_blank'>speaker coaching guide</a> available to support speakers and coaches. People who sign up, will receive their coaching matches by December 20, with the expectation that they will schedule practice sessions between January 6 and January 17.<br><br>We ask the coaches to take the lead on scheduling the practice session via a video conference (BlueJeans, Talky.io, Jitsi Meet, Zoom, Google Hangouts, Skype, etc). The speaker can choose to invite other audience members to the practice. If the speaker and the coach happen to be in the same location, they can do the practice session in person. In the practice session, the speaker delivers their practice talk, and the coach and other audience members provide feedback on the talk and slide deck. Additionally, we ask that coaches arrange to meet their speaker at DevConf.CZ and attend their talk as a supportive audience member.<br><br>Speakers and coaches agree to abide by the <a href='/coc/' target='_blank'>DevConf Code of Conduct</a> both at the conference and in any pre-conference coaching, practice, or other program related activities.<br><br>This option is a good fit for speakers who do not work at Red Hat or are not based in Brno. As in prior years, group practice sessions will be held in the Brno office for people who work at Red Hat, and information about them will be shared separately on the Brno mailing list. However, Red Hatters from Brno are welcome to select this option too."),
				array("q" => "Will my talk be recorded?", "a" => "Yes. Our intention is to record every talk and make it available on YouTube and via a live-stream. If this is a problem, please contact us at <a href='mailto:info@devconf.cz'>info@devconf.cz</a> as soon as possible so we can determine if we can accommodate your request."),
		)),

        array("group" => "Diversity & Inclusion Questions", "id" => "daiquestions",
            "questions" => array(
                array("q" => "How is DevConf.CZ encouraging diversity and inclusion now that the conference is virtual?", "a" => "In past years, we've offered diversity scholarships and coaching for new speakers. We'll be offering programs for our virtual event as well. We will pair coaches with new speakers to help with presentation content as well as video production. This option will be available on the acceptance notification. More details on this and other efforts will be added to our site in the near future.")
        ))
	);

?>
<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Frequently Asked Questions (FAQ)</div>
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

@include('_layouts.footercz')
