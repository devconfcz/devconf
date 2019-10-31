@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.IN | Bengaluru, India">
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
				<li class="nav-item active px-3">
					<a href="/in/aroundbengaluru" class="nav-link">Getting around Bengaluru</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/in/tobengaluru" class="nav-link">Getting to Bengaluru</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/in/hotels" class="nav-link">Hotels</a>
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
				array("q" => "Are the talks recorded or live-streamed?", "a" => "We intend to record and post as many of the talks as possible. Occasionally a speaker’s talk is not able to be recorded for content or technical reasons. The talks will be posted on our YouTube channel as soon as they are ready.<br><br>We are still working out whether it will be possible to live-stream talks this year."),
				array("q" => "Will I be able to get something to eat at the conference?", "a" => "We have arranged to have food trucks present on site. Many of them are planning to offer vegan or vegetarian options in addition to their regular choices. We are going to have tents near the food trucks so that people have places to eat if it is raining. Please be aware that it is Winter in January/February in Brno and you should check the weather forecast and dress appropriately."),

			)),

		array("group" => "Schedule / CfP Questions", "id" => "schedule", 
			"questions" => array( 
				array("q" => "Where is the schedule? When will the Schedule be ready?", "a" => "We hope to release the schedule around December 9, 2019.<br><br>We are planning to start at 9am on 24 January 2020 and end at 4pm on 26 January 2020. These time may change slightly, so do watch for the final schedule."),
				array("q" => "It’s after the deadline and I haven’t received an acceptance notification. What do I do?", "a" => "We receive an amazingly large number of high quality submissions. Our track teams that review the talks have to work a lot to read and decide on them all. We have expect to send out the first round of acceptances around 18 November 2019."),
				array("q" => "My talk was accepted but I can’t physically come, what can I do?", "a" => "Please email us at <a href='mailto:info@devconf.cz'>info@devconf.cz</a> and explain your situation and what your suggestion is. We can, on a case-by-case basis allow alternative speakers, however this is not guaranteed. We generally do not allow for remote presentations, however you are welcome to email us and explain why you think your talk should be an exception."),
			)),

		array("group" => "Registration Questions", "id" => "registration", 
			"questions" => array( 
				array("q" => "How much does it cost to attend DevConf.CZ?  Do I need to register?", "a" => "Admission to DevConf.CZ is free and only requires that you register for a free ticket. Registration details should be available around December 9, 2019. Capacity is limited!<br><br>Onsite (at venue) registration is possible, even after on-line registration has closed, but it will also be limited capacity. You are strongly encouraged to register online to ensure you have a ticket."),
				array("q" => "If the conference is free, why do I have to register?", "a" => "We use registration to manage several logistics issues around DevConf.CZ, amongst other things. For example, we have to ensure that we do not exceed the maximum number of people allowed in the building by the fire marshall. We also use the data for things like estimating the number of food trucks to invite and planning for various parts of the conference.<br><br>Because we have typically attracted over 1500 people each year, we have learned to do registration to minimize the possibility that someone will show up to the conference and then have to be turned away."),
				array("q" => "Can I register on-site?", "a" => "There are a small number of tickets reserved for on-site registration. On-site registration is identical to internet registration in terms of cost (free!) and in terms of what information is asked for. You are <strong>strongly</strong> encouraged to register online when we open online registration to both save time when you arrive and to prevent you from being turned away because we are at capacity."),
			)),

		array("group" => "Travel Questions", "id" => "travel", 
			"questions" => array( 
				array("q" => "I need a visa invitation letter. Can you help me get one?", "a" => "We provide visa invitation letters, upon request, to speakers and registered attendees of our conference.<br><br>Speakers were emailed instructions for getting one with their acceptance notification.<br><br>Attendees may request a visa letter <strong>after</strong> registering for the conference. Details on how to request the letter are in your registration confirmation in the section at the bottom called 'Additional Information'."),
				array("q" => "Can you pay for my travel costs?", "a" => "We provide some lodging (hotel) costs for speakers at DevConf (see the <a href='#speaker'>Speaker Questions section</a> for details). Additionally, we offer diversity scholarships that can help cover travel costs for speakers and attendees who live in Europe, Middle East, or Africa, do not work for Red Hat, and whose employer is not able to cover their travel costs (see <a href='#diversityandinclusion'>the Diversity Scholarship Questions section</a> for details)."),
			)),

		array("group" => "Speaker Questions", "id" => "speaker", 
			"questions" => array( 
				array("q" => "Why does the speaker confirmation form ask you for a sched.org email address?", "a" => "We will be publishing our schedule there and having your preferred email address for that service lets us give you some editing rights for your session. Some speakers may use a different address for sched.org so we want to collect that from them. If you don’t have a preference or don’t have one already, just provide any email address you read and we will do the rest."),
		//		array("q" => "What do the hoodie Cut Types mean on the speaker acceptance form?", "a" => "A fitted cut used to be referred to as a female cut. It tends to hug the body closely and curve in at the waist.<br><br>A straight cut used to be referred to as a male cut. It is a straight down and fits better on bodies with fewer curves."),
				array("q" => "I need a visa invitation letter. Can you help me get one?", "a" => "We provide visa invitation letters, upon request, to speakers at our conference. Speakers were emailed instructions for getting one with their acceptance notification."),
				array("q" => "Can you pay for my travel costs?", "a" => "We provide some lodging (hotel) costs for speakers at DevConf. For primary speakers, we can provide a hotel room, at a restricted set of hotels, for the three nights of the conference. Details will be sent in the acceptance emails.<br><br>For secondary speakers, who room with a primary speaker, we can cover the extra cost associated with the second person in that double room. Our budget, unfortunately, does not let us buy separate rooms for secondary speakers. If secondary speaker is of a different gender than primary speaker and they require a separate room, we can cover the separate room."),
				array("q" => "As a speaker, can I choose any hotel I want and just get a reimbursement?", "a" => "No. We are not able to reimburse any rate from any hotel that we did not ask you to book into. In order to take advantage of the 3 days of lodging (hotel rooms) we provide speakers you must book in the hotels we asked you to use by following the process we sent you. Bookings through third-party sites or that used other processes, even if they are for the same hotel, will not be paid for or reimbursed."),
				array("q" => "What kind of project/speakers/audio-visual equipment do you provide?", "a" => "Every session room will have a projector that should accept most common display technologies. <strong>If you do not have an HDMI port on your laptop, please bring an adapter to ensure you can connect.</strong>  While we will try to have a full suite of display adapters, new versions seem to appear every day. Please have practiced plugging your laptop into an external display and setting your mirroring/speaker mode as you like it. You know your computer best.<br><br>The university got new projectors (woot!). The resolution of all projectors, except the one in A113 should be 1920x1200. The projector in A113 should be 1920x1080. <strong>All inputs are HDMI.</strong><br><br>We will also have a microphone in all rooms where recording is taking place. Please use the microphone and don’t forget to repeat questions."),
				array("q" => "Will my talk be recorded?", "a" => "Yes. Our intention is to record every talk and make it available on YouTube and possibly via a live-stream. If this is a problem, please contact us at <a href='mailto:info@devconf.cz'>info@devconf.cz</a> as soon as possible so we can determine if we can accommodate your request."),
				array("q" => "What else should I know as a speaker?", "a" => "Your talk is scheduled with the Question and Answer time included. This means, for example, if you have a 30 minute talk, you should plan to leave 5 minutes for Q&A. After your time has expired, even if you only had a short Q&A you will need to leave the room and continue conversations in the hallway to ensure the next speaker has full use of their time.<br><br>Each room will have a room captain to help with timing. They will show you cards when you are getting close to running out of time. They will also assist you with setting up your talk and provide you with a brief introduction, if you wish.<br><br>We need your slides. If you haven’t already given us your presentation, the room captain will ask for a copy on a flash drive before you start your talk."),
		)),

		array("group" => "Diversity & Inclusion Questions", "id" => "diversityandinclusion",
			"questions" => array(
				array("q"=>"Who is eligible for diversity scholarships?", "a" => "In an effort to create a more diverse and inclusive event, Red Hat is delighted to be able to offer <a href='https://forms.gle/bp5PHdyW8V8zhSsW6' target='_blank'>scholarships</a> for attending DevConf.CZ. As DevConf.CZ is the DevConf for the Europe, Middle East, and Africa region, these scholarships are only available to people from these locations. The scholarships are aiming to support students and people relatively new or returning to full-time work in technology, who don't work at Red Hat and whose employer is not able to cover their travel expenses. Applicants who work full-time in technology, need to have worked full-time in technology for less than 10 years since the time they started full-time work in technology or resumed it after a break of six months or more due to studies or personal reasons. Applicants have to be at least 18 years old."),
				array("q"=>"How will diversity scholarships decisions be made?", "a" => "Decisions will be made based on applicants’ experience with Red Hat-supported and other open source technologies and based on being a student or being new or returning to full-time work in technology. People who are accepted as speakers for the conference will be given some preference, but the scholarships are aiming to support both speakers and attendees."),
				array("q"=>"What do diversity scholarships cover?", "a" => "The scholarships can cover requests of up to 1,000 USD for expenses such as travel, hotel, food, and child care. Conference registration is free and will open on December 9, 2019."),
				array("q"=>"How do I apply for a diversity scholarship?", "a" => "Please review full eligibility criteria in the <a href='https://forms.gle/bp5PHdyW8V8zhSsW6' target='_blank'>application form</a> and submit your application by 5pm UTC on Thursday, November 21, 2019. If you proposed a session, but would like to attend the conference regardless of whether it’s accepted, you can fill out the form without waiting for the acceptance decisions. We expect to send out most acceptance decisions before November 21, but speakers whose sessions are accepted after November 21 will still have a chance to apply for diversity scholarships.")
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

@include('_layouts.footerin')
