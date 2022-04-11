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
                <li class="nav-item active px-3">
                    <a href="/cz/blog" class="nav-link">Blog</a>
                </li>
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
                array("q"=>"What is DevConf.cz Mini?", "a"=>"DevConf.cz Mini is a bi-annual, more focused, local, in-person version of DevConf.cz. It offers an opportunity to return to conference themes in a smaller setting and establishes a platform for the Czech Republic and EMEA based community to sync, share and hack on upstream projects together."),
                array("q"=>"What will happen to the main event? Is it going to take place in January 2023?", "a"=>"We plan to organize the DevConf.CZ main event every year. The dates will be announced later this year."),
                array("q"=>"Is there a Call for Proposals for DevConf.cz Mini?", "a"=>"No. We're working with the pool of speakers who were not able to present their talk at DevConf.cz main event in January."),
                array("q"=>"When will you publish the schedule for DevConf.cz Mini?", "a"=>"We're working hard on creating a list of engaging talks. The schedule will be published in May."),
                array("q"=>"When will you open registration for DevConf.cz Mini?", "a"=>"We plan to open registration in May."),
                array("q"=>"Will you be streaming DevConf.cz Mini content live?", "a"=>"No, however, we will record the content and publish it on our YouTube channel afterwards."),
/*				array("q" => "Are the talks recorded or live-streamed?", "a" => "We give speakers choice to speak live or send us a pre-recorded session. Consider what would work best for your session goals.<ul><li>Pre-recorded session and live Q&A - during the session speaker interacts with audience in chat</li><li>Pre-recorded first half, second half live with the audience interaction</li><li>Live session - speaker can recruit their colleagues to help them out with the audience interaction</li></ul>"),
                array("q" => "What does a hybrid format mean? What is my experience going to be in-person? What about virtually?", "a" => "DevConf.CZ 2022 is going to be held on Jan 28-29, 2022 as a hybrid event with a shared in-person and virtual component during Central European Time. This way we can ensure that everyone who wishes to participate is able to do so. Obviously, this decision will continue to be evaluated as travel conditions change.</p><p>The virtual component of the conference will be hosted on our event platform: <a href=”https://hopin.com/” target=”_blank”>https://hopin.com/</a></p><p>The in-person component of the conference will be held at FIT VUT in Brno, Czech Republic: <a href=”https://www.fit.vut.cz/” target=”_blank”>https://www.fit.vut.cz/</a>."),
                array("q" => "Will you switch to in-person only or virtual only?", "a" => "Since event and travel conditions keep changing locally, we reserve the right to cancel the in-person component of the event due to Covid-related issues. We plan to make the final reevaluation of the hybrid format on December 22. We advise against non-refundable travel purchases before this date."),*/
                array("q" => "What are the in-person attendance guidelines?", "a" => "We have to comply with the appropriate government regulations in this area. You can find the latest Covid regulations here: <a href='https://covid.gov.cz/en/' target='_blank'>https://covid.gov.cz/en/</a>."), 
                array("q" => "Do I need proof of vaccination or a negative test in order to attend in person?", "a" => "You should be prepared to meet all appropriate government regulations for the duration of your visit to Brno."),
                array("q" => "Will you provide masks or tests?", "a" => "No. You should be prepared to meet all appropriate government regulations for the duration of your visit to Brno."),
//                array("q" => "What if I don’t want to wear a mask or provide proof I am COVID free?", "a" => "We have to comply with the appropriate government regulations in this area and do not get to decide arbitrarily. Therefore we are unable to accommodate your request. Plan to attend virtually."),
                array("q" => "Where can I find the latest information regarding travel conditions to the Czech Republic?", "a" => "You can find the latest Covid regulations here: <a href='https://covid.gov.cz/en/' target='_blank'>https://covid.gov.cz/en/</a>.")
/*                array("q" => "This conference was announced as a hybrid event. Why did you switch to virtual?", "a" => "We decided to cancel the in-person component of the conference in light of the current situation in the Czech Republic. Taking into account the level of lockdowns and the new covid-19 variant, we believe it is the safest option to organize the conference.")
			)),
			
		array("group" => "Schedule / CfP Questions", "id" => "schedule", 
			"questions" => array( 
				array("q" => "Where is the schedule? When will the Schedule be ready?", "a" => "We hope to release the schedule in December 2021."),
				array("q" => "What is a talk?", "a" => "A talk is where you present with slides and demos to an audience. A talk is 25 minutes long (We know from past conferences and virtual events that attention and audience drops the most after 25 minutes). We recommend reserving some time at the end for Q&A, e.g. 20-minute talk and 5-minute Q&A. If speakers wish to continue with the Q&A after their time slot, there will be a dedicated place for it. Feel free to recruit your colleagues to interact with people in chat while you are talking. A talk has one primary speaker, optionally another (secondary) speaker.</p><p>A talk should be bite-sized and focused on a certain topic. This means that you should not expect to be able to cover multiple broad areas in one talk. You can submit more than one proposal, to cover a set of topics, but we cannot guarantee their final scheduled order. Therefore, we recommend topics be independent so that they do not need to be presented in a specific order.</p><p>We give speakers a choice to speak in-person or virtually - live (preferred) or pre-recorded. Consider what would work best for your session goals and availability.</p><p>We plan to stream in-person talks online and screen virtual talks at the venue."),
                array("q" => "What is a deep dive talk?", "a" => "A deep dive talk is the same as talk, but this is considered as two-part session (two 25 minute time slots) where we guarantee the order in the schedule. You should consider that different audiences may join each part and tailor the content accordingly. This option is recommended for deep technical dives that include a demo.</p><p>We give speakers a choice to speak in-person or virtually - live (preferred) or pre-recorded. Consider what would work best for your session goals and availability.</p><p>We plan to stream in-person talks online and screen virtual talks at the venue."),
                array("q" => "What is a discussion?", "a" => "A discussion is where you lead/moderate a conversation with a group of knowledgeable panelists who answer prepared questions or questions from the audience as selected by you for appropriateness to your topic and session goal. It is an interactive session and you’re asked to engage with the audience during the session. If you are willing to open the discussion to attendees, consider holding a fishbowl discussion where you start with a group of speakers and an empty “seat” which could be filled by active audience members in the course of a discussion.</p><p>A discussion is 50 minutes long. If speakers wish to continue after their slot, there will be a dedicated place for it. A discussion has a dedicated moderator and up to 5 active speakers.</p><p>We give speakers a choice to speak in-person or virtually. Consider what would work best for your session goals and availability. We do not accept pre-recorded discussions.</p><p>We plan to stream in-person discussions online and screen virtual discussions at the venue."),
                array("q" => "What is a lightning talk?", "a" => "A lightning talk is a short presentation focused on getting people interested in something new. The goal of the lightning talk is to convey key information in a clear and concise manner. You can talk about things that excite you, challenges you overcome and insights to your work that you wish you knew before you started.</p><p>A lightning talk is 5 minutes long.We give speakers a choice to speak in-person or virtually (all virtual lighting talks are pre-recorded). Consider what would work best for your session goals and availability.</p><p>We plan to stream in-person lightning talks online and screen virtual lightning talks at the venue."),
                array("q" => "What is a workshop?", "a" => "A workshop is a hands-on demo where you and other workshop leads interact among each other and with audience members on chat, sharing your knowledge and experience on a particular bite-sized topic. The goal of a workshop is to teach or practice a skill. You should not expect the audience following each step of the workshop live, however, they should have all necessary instructions if they wish to. As a result workshops should be actionable and goal oriented.</p><p>A workshop is 60 minutes long, although we will consider exceptions. We allow up to 3 active presenters in a workshop. You must designate one of them to be the primary session leader. We give in-person workshop leads a choice to decide whether they want to stream the content online. If yes, it is up to you to cover both channels. It is recommended to recruit your colleagues to interact with people in chat while you are talking.</p><p>All workshops are conducted live. We do not accept pre-recorded workshops. However, you may find it useful to pre-record demo components of your workshop."),
//				array("q" => "It’s after the deadline and I haven’t received an acceptance notification. What do I do?", "a" => "We receive an amazingly large number of high quality submissions. Our track teams that review the talks have to work a lot to read and decide on them all. We have expect to send out the first round of acceptances around November 30, 2020."),
			)),

		array("group" => "Registration Questions", "id" => "registration", 
			"questions" => array( 
				array("q" => "How much does it cost to attend DevConf.CZ?  Do I need to register?", "a" => "Admission to DevConf.CZ is free and only requires that you register for a free ticket. Registration details should be available in December 2021."),
				array("q" => "If the conference is free, why do I have to register?", "a" => "We use registration to manage several logistics issues around DevConf.CZ."),
			)),

		array("group" => "Speaker Questions", "id" => "speaker", 
			"questions" => array(
                //array("q" => "Can I add a co-speaker to my submission?", "a" => "Yes, you can set the co-speaker by yourself in CfP tool until the end of the CfP open window. If you'd like to add a co-speaker to a submission or an accepted session, no worries! Please email us at <a href='mailto:info@devconf.cz'>info@devconf.cz</a> with your update."),
				//array("q" => "Why does the speaker confirmation form ask you for a sched.org email address?", "a" => "We will be publishing our schedule there and having your preferred email address for that service lets us give you some editing rights for your session. Some speakers may use a different address for sched.org so we want to collect that from them. If you don’t have a preference or don’t have one already, just provide any email address you read and we will do the rest."),
                array("q" => "Are the talks recorded or live-streamed?", "a" => "We give speakers choice to speak live or send us a pre-recorded session. Consider what would work best for your session goals.<ul><li>Pre-recorded session and live Q&A - during the session speaker interacts with audience in chat</li><li>Pre-recorded first half, second half live with the audience interaction</li><li>Live session - speaker can recruit their colleagues to help them out with the audience interaction</li></ul></p><p>If you choose to pre-record your session, remember it only needs to be as good as you would do live. This is not a Hollywood movie :)"),
                array("q" => "Are there any video recording guidelines?", "a" => "Yes! We are putting together steps on how to record an awesome video with the open source software OBS. The steps can be found <a href='https://github.com/devconfcz/virtual-presentations/blob/master/Recording.md' target='_blank'>here</a>. If you're struggeling with OBS software, you can reach to us at <a hrefr='mailto:speakers@devconf.cz'>speakers@devconf.cz</a> mailing list. "),
                array("q" => "How should I submit the pre-recorded video?", "a" => "We recommend uploading the video to YouTube as unlisted. Once you have uploaded your video, go to 'accepted proposals' on the <a href='https://cfp.devconf.info/acceptedproposals/37'>CfP site</a> to submit the link to your recorded video.<br><br> If you would prefer to not to use YouTube, send the organizers an email at <a href='mailto:speakers@devconf.cz'>speakers@devconf.cz</a> and we will work with you to figure out alternate options."),
                array("q" => "What is the DevConf.CZ virtual platform?", "a" => "We’re hosting the event on hopin.com."),
                array("q" => "Can I test the virtual environment in advance?", "a" => "We will be hosting a test event one week before the conference on our event platform, hopin.com. Speakers are encouraged to join the test event to test out their audio, video, and screen sharing setup. We will share further details with speakers directly."),
   				array("q" => "Will there be speaker coaching?", "a" => "Yes! When you confirm your session acceptance, you will be asked whether you would like to have a speaker coach and will be matched with one."),
				array("q" => "How does speaker coaching work?", "a" => "The speaker confirmation form invites new speakers to sign up for practicing their talks via a video conference ahead of DevConf.CZ and invites experienced speakers to coach new speakers through such practice. We hope that participating in this program will improve the experience of new speakers and improve the quality of talks at DevConf.CZ, and highly encourage experienced speakers to sign up as coaches. We have a <a href='/cz/speakerguide/' target='_blank'>speaker guide</a> and a <a href='/cz/speakercoachingguide' target='_blank'>speaker coaching guide</a> available to support speakers and coaches. People who sign up, will receive their coaching matches by December 15, with the expectation that they will schedule practice sessions between January 3 and January 21.<br><br>We ask the coaches to take the lead on scheduling the practice session via a video conference (BlueJeans, Talky.io, Jitsi Meet, Zoom, Google Meet, Skype, etc). The speaker can choose to invite other audience members to the practice. In the practice session, the speaker delivers their practice talk, and the coach and other audience members provide feedback on the talk and slide deck.<br><br>Speakers and coaches agree to abide by the <a href='/coc/' target='_blank'>DevConf Code of Conduct</a> both during the conference and in any pre-conference coaching, practice, or other program related activities."),
				array("q" => "Will my talk be recorded?", "a" => "Yes. Our intention is to record every talk and make it available on YouTube and via a live-stream. If this is a problem, please contact us at <a href='mailto:info@devconf.cz'>info@devconf.cz</a> as soon as possible so we can determine if we can accommodate your request."),
				array("q" => "Is there a recommended slide deck I can use?", "a" => "You can use any presentation slide deck you wish. We also put together a <a href=\"/assets/files/devconf-cz-template.odp\">DevConf.CZ slide deck template</a> for your convenience."),
				array("q" => "Are there any tips and tricks for composing and delivering a successful talk at DevConf.CZ?", "a" => "To assist you with producing your talk, we are collecting a list of suggestions for both virtual and in-person speakers in the <a href='/cz/speakerguide/' target='_blank'>speaker guide</a>."),
		)),

/*        array("group" => "Attendee Questions", "id" => "attendee", 
			"questions" => array( 
				array("q" => "Will there be coaching for people who are new or have only attended a few technology conferences?", "a" => "Yes! When you register for the event, you will be asked whether you would like to be a coach or an apprentice and what topics you have experience in or are interested in. Coaches and apprentices will then receive their matches via email. We always get a lot of interest from people to be coached, and encourage people who have attended more than ten technology conferences to sign up as coaches. If you have attended fewer than three technology conferences, please consider signing up as an apprentice."),
//				array("q" => "What are the goals for providing attendee coaching?", "a" => "<ol><li>Ensuring that apprentices have a friendly contact who can orient them to attending an open source technical conference, and particularly one that is virtual. Additionally, introducing apprentices to ideas and skills that will be useful at future in-person conferences, such as how to find and participate in the hallway track.</li><li>Offering apprentices an opportunity to learn more about the topics they are interested in, be introduced to open source projects they might like to get involved in, and possibly receive advice that might be helpful for their career.</li></ol></p><p>Because there will not be as many opportunities to physically point out things in real time such as the hallway track, the coaching program will offer practical advice around those areas as a supplement to the main goal of helping new attendees navigate this new virtual event."),
//                array("q" => "How does new attendee coaching work?", "a" => "Apprentices will be paired with coaches, with our best efforts being made to pair apprentices with coaches who have experience with one or more of the technical topics apprentices selected a preference for when registering. The coach will contact the apprentice prior to the conference to arrange a virtual meeting prior to attending the conference via a video conference (BlueJeans, Talky.io, Jitsi Meet, Zoom, Google Meet, Skype, etc) or a voice call. This meeting will give you a chance to exchange introductions, answer any questions the apprentice has as they prepare to attend the conference, learn about the apprentice's career goals, review the conference schedule together, and plan to attend some sessions together. During the conference, you will be invited to meet other apprentices and coaches. The coaching includes helping show apprentices how to participate in the virtual conference."),
			)),*/

/*        array("group" => "Diversity & Inclusion Questions", "id" => "daiquestions",
            "questions" => array(
                array("q" => "How is DevConf.CZ encouraging diversity and inclusion now that the conference is virtual?", "a" => "In past years, we've offered diversity scholarships and coaching for new speakers. We'll be offering programs for our virtual event as well. We will pair coaches with new speakers to help with presentation content as well as video production. This option will be available on the acceptance notification. More details on this and other efforts will be added to our site in the near future.")
        )) */
	)));

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
						<p><?php echo $value['a']; ?></p>
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
