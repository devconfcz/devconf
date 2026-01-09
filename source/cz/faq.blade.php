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
                array("q" => "What is the official chat platform for the conference?", "a" => "We are moving our official chat communication over to Matrix. Matrix offers a more open, federated, and extensible communication ecosystem that aligns better with our goals of fostering collaboration and adhering to open-source principles. We believe this shift will enhance the overall experience and accessibility for our local and remote attendees. We encourage you to join us on Matrix for all chat-related discussions during the event. Telegram and Discord channels will be deprecated."),
                array("q" => "Do you provide visa invitation letters?", "a" => "Yes, we can provide a visa invitation letter to accepted speakers and registered attendees. Please <a href='https://forms.gle/nr62qyM1E44Z8ubg6' target='_blank'>fill out the form</a> to request a visa invitation letter. If you need the visa invitation letter before our acceptance letters are sent out or before registration opens, specify the reason in the 'Additional Information' section of the form."),
                array("q" => "How to get to Brno?", "a" => "You can find travel guidelines <a href='/cz/tobrno/'>here</a>."),
                array("q" => "Are there any recommended hotels to stay in near the venue?", "a" => "Yes, you can find a list of recommended hotels <a href='https://www.devconf.info/cz/hotels/'>here</a>."),
                array("q" => "Do you provide parking at the venue?", "a" => "No, we do not offer any parking, and the venue area is not designed for attendees arriving by car. We highly recommend using public transport instead of arriving by car.<br><br>You can find more details about how to get around Brno <a href='https://www.devconf.info/cz/aroundbrno/'>here</a>.
"),
                array("q" => "What food and drink options are available at the venue?", "a" => "Complimentary water and fruit will be available at the venue. Additionally, we have coffee stands and food trucks on-site, with many of them offering vegan or vegetarian options alongside their regular choices. Make sure to bring your reusable water bottles and coffee cups to avoid unnecessary waste and reduce environmental impact."),
                array("q" => "Is there Wi-Fi available at the venue?", "a" => "Yes, we have a dedicated network for all conference attendees. Credentials will be shared with all registered participants shortly before the event.</p><p>Please be considerate of your fellow attendees and limit your Wi-Fi usage to essential communication. Avoid streaming movies, downloading large files, or other bandwidth-heavy activities, as the network is shared by everyone."),
			)),
			
    array("group" => "CfP Questions", "id" => "cfp", 
			"questions" => array( 
				array("q" => "What is the format of DevConf.cz? Can I speak online?", "a" => "DevConf.cz is a <strong>hybrid event</strong>, with both in-person and virtual presence to ensure that everyone who wishes to participate is able to do so. Please note that <strong>all presentations will be delivered in person</strong> due to venue limitations."),
				array("q" => "What is a talk?", "a" => "A talk is where you present, usually with slides and demos, to an audience. A talk should be bite-sized and focused on a certain topic. This means that you should not expect to be able to cover multiple broad areas in one talk. The default time slot for <strong>each talk and Q&A is 35 minutes</strong> (we recommend 25-minute talk and 10-minute Q&A). <strong>A talk has one primary speaker</strong> and, optionally, a secondary speaker. Consider recruiting your colleagues to interact with people online while you are talking live at the conference.</p><p>Please note that this year <strong>all presentations will be delivered in person</strong>. We plan to stream talks online and make sure in-person as well as online audiences can participate in Q&A and chat."),
                array("q" => "What is a lightning talk?", "a" => "A lightning talk is a short presentation focused on getting people interested in something new. The goal of the lightning talk is to convey key information in a clear and concise manner. Smaller technical topics, project introductions, and research/thesis topic introductions are great topics for lightning talks.</p><p><strong>A lightning talk is 15 minutes long.</strong> A lightning talk has one primary speaker and, optionally, a secondary speaker.</p><p><strong>All lightning talks are delivered in person.</strong> We plan to stream content online and make sure in-person as well as online audiences can participate in chat."),
                array("q" => "What is a workshop?", "a" => "A workshop is a hands-on demo where you and other workshop leads interact with the audience with the goal to share your knowledge and experience on a particular bite-sized topic. The goal of a workshop is to teach or practice a skill. As a result, workshops should be actionable and goal-oriented.</p><p><strong>A workshop is 80 minutes long.</strong> We allow up to <strong>2 active presenters</strong> in a workshop. You must designate one of them to be the primary session leader.</p><p><strong>All workshops are conducted live and are not recorded or streamed by default.</strong> If you want to stream the content online it is up to you to cover both offline and online channels."),
                array("q" => "What is a meetup?", "a" => "Meetups are organized as in-person meetings. They are open to all participants, and they serve as a place for open discussions during the dedicated time, sharing the latest project developments and interaction with contributors and attendees.</p><p><strong>A meetup is 80 minutes long.</strong> We allow up to <strong>2 active presenters</strong> in a meetup. You must designate one of them to be the primary session leader.</p><p><strong>All meetups are conducted live and are not recorded nor streamed by default.</strong> If you want to stream the content online it is up to you to cover both offline and online channels."),
                array("q" => "What is a booth?", "a" => "A booth is a staffed table at the event. Booths are open to all participants at all times, and they serve as a place for conversations about the project and interaction with contributors, users, and attendees.</p><p>There must be <strong>at least one person at the booth at all times</strong> and there must be <strong>at least two staff members registered.</strong> Preference is given to booths that will run all three days."),
                array("q" => "What is an activity?", "a" => "Activities are organized as non-technical meetups. They are open to all participants, and they serve as a great place to engage with other attendees outside of the hallway track and conference sessions. They usually center around various hobbies and interests. We hosted a candy swap session, a coffee lovers meetup, and a yoga session in past.</p><p><strong>An activity is either 35 or 80 minutes long. An activity has one primary lead</strong> and, optionally, a secondary session leader.</p><p><strong>All activities are conducted live and are not recorded nor streamed by default.</strong> If you want to stream the content online it is up to you to cover both offline and online channels."),
				array("q" => "How are decisions made during the CfP review process?", "a" => "Each track/theme has a review committee of 3 - 7 members that are subject-matter experts. The process consists of multiple phases to ensure fair and thorough evaluation:</p><ol><li><strong>Blind Review</strong>: Reviewers assess anonymized proposals based solely on content.</li><li><strong>Full-view Review</strong>: Speaker details are revealed to ensure diversity and track balance.</li><li><strong>Captain Review</strong>: Track captains prioritize talks, ensuring a mix of topics and experience levels.</li><li><strong>Final Selection</strong>: The CfP Committee makes final decisions, prioritizing sessions across all tracks holistically, and preparing speaker notifications.</li></ol><p>Decisions are based on content quality, alignment with track themes, diversity in difficulty levels, and speaker experience. Since DevConf events are organized globally, we prioritize speakers from the same region as the event. For DevConf.CZ, that includes Europe, the Middle East, and Africa.</p><p>During the review process, track captains may move your session to another track without prior notification. They can also contact you and suggest changing the session format, combining talks, or identifying potential keynotes.</p><p>The acceptance rate for talks is around <strong>25%</strong>, with a limit of <strong>one 35-minutes talk per speaker</strong>. However, speakers may have other session formats accepted, and in some cases, we may fill last-minute gaps with additional talks from speakers who are already present."),
			),
    			array("q" => "What is the maximum number of submissions one person can submit?", "a" => "To ensure high-quality proposals and efficiently streamline the review process for our CfP Review Committee, each individual is limited to submitting up to <strong>three proposals in total</strong>. This limit includes all submission types (talks, lightning talks, workshops, meetups, activities, and booths). If you are listed as a co-speaker on any submission, it will count toward your individual limit."),
				array("q" => "What is the maximum number of speakers allowed per session?", "a" => "To ensure a high-quality schedule featuring a broad range of topics and speakers, we are setting a limit of <strong>two speakers per submission</strong>. This limit includes all submission types (talks, lightning talks, workshops, meetups, activities). <strong>For booths</strong>, you can only submit up to two contact people in your proposal. However, it is allowed and expected that there is a larger number of staffers onsite. Exceptions may be considered for panel discussions or other collaborative formats. If you require more than two speakers, please provide the reason in the \"Notes\" section of your proposal."),
				),

		array("group" => "Registration Questions", "id" => "registration", 
			"questions" => array( 
				array("q" => "How much does it cost to attend DevConf.CZ?  Do I need to register?", "a" => "Admission to DevConf.CZ is free and only requires that you register for a free ticket."),
				array("q" => "If the conference is free, why do I have to register?", "a" => "We use registration to manage several logistics issues around DevConf.CZ."),
				array("q" => "Can I register on-site?", "a" => "There are a small number of tickets reserved for on-site registration. On-site registration is identical to internet registration in terms of cost (free!) and in terms of what information is asked for. You are <strong>strongly</strong> encouraged to register online when we open online registration to both save time when you arrive and to prevent you from being turned away because we are at capacity."),
			)),

		array("group" => "Speaker Questions", "id" => "speaker", 
			"questions" => array(
                array("q" => "Why doesn’t my Pretalx account work even though I spoke at DevConf events in 2024?", "a" => "Starting in 2025, we are using a self-hosted instance of Pretalx. In 2024, we tested the platform using a paid version, but we have since switched to self-hosting. If you're a returning speaker, you'll need to create a new account. You can access all DevConf CfPs at <a href=\"https://pretalx.devconf.info\" target=\"_blank\">pretalx.devconf.info</a>."),
				array("q" => "Will there be speaker coaching?", "a" => "Yes! When you confirm your session acceptance, you will be asked whether you would like to have a speaker coach and will be matched with one."),
				array("q" => "How does speaker coaching work?", "a" => "The speaker confirmation form invites new speakers to sign up for practicing their talks via a video conference ahead of DevConf.CZ and invites experienced speakers to coach new speakers through such practice. We hope that participating in this program will improve the experience of new speakers and improve the quality of talks at DevConf.CZ, and highly encourage experienced speakers to sign up as coaches. We have a <a href='/cz/speakerguide/' target='_blank'>speaker guide</a> and a <a href='/cz/speakercoachingguide' target='_blank'>speaker coaching guide</a> available to support speakers and coaches. People who sign up, will receive their coaching matches by May 22, with the expectation that they will schedule practice sessions between May 23 and June 7.<br><br>We ask the coaches to take the lead on scheduling the practice session via a video conference (BlueJeans, Talky.io, Jitsi Meet, Zoom, Google Meet, Skype, etc). The speaker can choose to invite other audience members to the practice. In the practice session, the speaker delivers their practice talk, and the coach and other audience members provide feedback on the talk and slide deck.<br><br>Speakers and coaches agree to abide by the <a href='/coc/' target='_blank'>DevConf Code of Conduct</a> both during the conference and in any pre-conference coaching, practice, or other program related activities."),
				array("q" => "Will my talk be recorded?", "a" => "Yes. Our intention is to record every talk (not workshops) and make it available on YouTube and via a live-stream. If this is a problem, please contact us at <a href='mailto:info@devconf.cz'>info@devconf.cz</a> as soon as possible so we can determine if we can accommodate your request."),
				array("q" => "Is there a recommended slide deck I can use?", "a" => "You can use any presentation slide deck you wish. We also put together a DevConf.CZ slide deck template in 16:9 format (<a href=\"/assets/files/devconf-cz-template-16-9.odp\">odp</a> | <a href=\"https://docs.google.com/presentation/d/1iIiFKP1H8VO8oRbliBa9Fa9FzvyJAnZx-bzsgwp1TkI/edit?usp=sharing\">Google Slides</a>) for your convenience."),
				array("q" => "Are there any tips and tricks for composing and delivering a successful talk at DevConf.CZ?", "a" => "To assist you with producing your talk, we are collecting a list of suggestions for both virtual and in-person speakers in the <a href='/cz/speakerguide/' target='_blank'>speaker guide</a>."),
				array("q" => "What kind of project/speakers/audio-visual equipment do you provide?", "a" => "Every session room will have a projector that should accept most common display technologies. <strong>If you do not have an HDMI port on your laptop, please bring an adapter to ensure you can connect.</strong>  While we will try to have a full suite of display adapters, new versions seem to appear every day. Please have practiced plugging your laptop into an external display and setting your mirroring/speaker mode as you like it. You know your computer best.<br><br>We will also have a microphone in all rooms where recording is taking place. Please use the microphone and don't forget to repeat questions."),
				array("q" => "What else should I know as a speaker?", "a" => "Your talk is scheduled with the Question and Answer time included. This means, for example, if you have a 35 minute talk, you should plan to leave 5 minutes for Q&A. After your time has expired, even if you only had a short Q&A you will need to leave the room and continue conversations in the hallway to ensure the next speaker has full use of their time.<br><br>Each room will have a session chair to help with timing. They will show you cards when you are getting close to running out of time. They will also assist you with setting up your talk and provide you with a brief introduction, if you wish."),
				array("q" => "What should I know if I lead a workshop?", "a" => "Bandwidth is shared by everyone and we occasionally experience issues with wifi due to overload which is beyond our power to fix. Please, prepare to switch from workshop to hands-on or guided tour in this case, meaning you solely will have access to the internet."),
				array("q" => "Is there any financial support for speakers?", "a" => "No. We do not cover travel expenses, and starting in 2025, we will no longer sponsor accommodation costs for speakers."),
		)),

        array("group" => "Matrix questions", "id" => "matrix", 
			"questions" => array( 
				array("q" => "What is Matrix?", "a" => "A Matrix server is a communication platform. It supports many methods of communication, including text, voice, and video streaming. Matrix is an open standard for interoperable, decentralized, real-time communication over IP. Learn more at <a href='https://matrix.org/faq/' target='_blank'>https://matrix.org/faq/</a>."),
                array("q" => "What is the DevConf.cz Matrix server for?", "a" => "We're using Matrix at DevConf.CZ 2025 to enhance communication and collaboration during the conference. It provides virtual rooms that correspond to each physical room at the event. These rooms:</p><ul><li>Facilitate seamless communication for local and remote attendees.It provides virtual rooms that correspond to each physical room at the event.</li><li>
Allow attendees to actively participate in Q&A by submitting and upvoting questions.</li><li>Keep attendees informed with important announcements and updates related to the conference.</li></ul><p>It's hosted by the Red Hat OSPO (Open Source Program Office) team.</p><p>By leveraging the DevConf.CZ Matrix server, we aim to create an interactive and inclusive conference experience for all participants."),
                array("q" => "How do I join?", "a" => "Open <a href='https://matrix.to/#/#2025:devconf.cz' target='_blank'>https://matrix.to/#/#2025:devconf.cz</a> to get started."),
                array("q" => "I don't have a Matrix account.", "a" => "Matrix servers are all federated. This means you can use another Matrix server account on the DevConf.CZ server. For this reason we don’t offer direct user registration.</p><p>Many online and open source communities host Matrix servers and offer accounts. You can also self-host. Here are some places to get an account:</p><ul><li>matrix.org - A server provided by the Matrix Foundation</li><li>Your community's server if you plan to use the account as a contributor, not just during DevConf.cz (e.g. Fedora, Mozilla etc.)</li><li>You can also find a potentially helpful list of public servers at <a href='https://joinmatrix.org/servers/' target='_blank'>https://joinmatrix.org/servers/</a></li><li>Another option is to host or self-host your own server. For more information, visit <a href='https://matrix.org/hosting/' target='_blank'>https://matrix.org/hosting/</a> or <a href='https://github.com/spantaleev/matrix-docker-ansible-deploy' target='_blank'>https://github.com/spantaleev/matrix-docker-ansible-deploy</a></li></ul><p>While creating an account, you will be asked to choose a client and you can choose the client based on your preferences. We recommend using <a href='https://element.io/download' target='_blank'>Element</a> because it supports all features we use at DevConf.cz, such as  “spaces”, “threads” and “pinned events”."),
                array("q" => "Can I use my existing Matrix account?", "a" => "Absolutely! #2025:devconf.cz rooms are public and <a href='https://matrix.org/faq/#what-does-federated-mean%3F' target='_blank'>federated</a>, which means you can use your existing account to join. Open <a href='https://matrix.to/#/#2025:devconf.cz' target='_blank'>https://matrix.to/#/#2025:devconf.cz</a> to get started."),
                array("q" => "Will the server stay online indefinitely, or just for the duration of the conference?", "a" => "The server will be online for the duration of the conference. We believe Matrix offers the best possible solution for mixing local and remote attendees, and we have already invested significant effort into its implementation. While we cannot guarantee its continued availability beyond the conference, we are committed to exploring Matrix as a long-term communication solution. Your feedback and experience will be valuable in shaping our future decisions.</p><p>Because Matrix is decentralized and users registered on other servers, you’ll remain able to connect with each other via direct messages and other chat rooms even if our server is taken offline."),
                array("q" => "What Matrix client(s) can I use?", "a" => "In theory, any client should allow you to join the devconf.cz rooms. However, not all clients support all features, #2025:devconf.cz for example takes advantage of “spaces”, “threads” or “pinned events”. If your client does not support these features, you may not have the optimal experience. We recommend using <a href='https://element.io/download' target='_blank'>Element</a>, because it supports all features we use."),
                array("q" => "I can't see any rooms.", "a" => "When using the <a href='https://element.io/download' target='_blank'>Element</a> client to access #2025:devconf.cz, you should see three sub-spaces: ‘General', ‘Sessions' and ‘Workshops & Meetups'. If your client does not display the spaces correctly, you should still be able to see the “Main Chat” room and all the “Sessions” and “Workshops & Meetups“ rooms when using the ‘explore’ feature. If you still can’t find any DevConf room, make sure you’re searching within the devconf.cz server."),
                array("q" => "How can I access the streamed content on Matrix?", "a" => "We plan to stream sessions such as talks, discussions, and lightning talks on Matrix. However, please note that workshops and meetups will not be streamed as they are not suitable for virtual viewing.</p><p>For the session rooms, we will provide widgets with YouTube streams. You will be able to join the session room and watch the live stream directly from the platform.</p><p>It's important to remember that workshop rooms will primarily serve as spaces for attendees and workshop organizers to communicate and share important information during the workshop. Streaming will not be available in workshop rooms."),
			)),
			
			array("group" => "MotoGP Czechia 2026 Colocation", "id" => "motogp", 
			"questions" => array( 
				array("q" => "Why was DevConf.CZ 2026 shortened from three days to two?", "a" => "Our primary goal is to host an inclusive, accessible, and safe event. For 2026, our dates coincide with a major sporting event in Brno: MotoGP. After careful consideration of the logistics, we have moved to a two-day schedule (June 18 - 19) for the following reasons:<ul><li>Accommodation Affordability: During MotoGP, hotel rates in Brno often triple or quadruple. By shifting away from Saturday, we reduce the number of nights attendees need to stay during peak pricing, making it significantly more affordable for our international audience to join us.</li><li>Better Availability: Hotel and short-term rental inventory is extremely limited during this period. Shortening the core event increases the likelihood that our speakers and attendees can secure a place to stay within the city.</li><li>Attendee Safety and Experience: MotoGP attracts tens of thousands of additional visitors to Brno. By concluding the main event on Friday, we hope to provide a more comfortable experience for our attendees, avoiding the most crowded periods and the logistical strain on the city’s public transport and evening venues.</li></ul>"),
			    array("q" => "Will there be any content on Saturday, June 20?", "a" => "While the \"main\" conference schedule - including our primary tracks and keynotes - will take place on Thursday and Friday, we are not abandoning Saturday entirely. We are currently reviewing the possibility of hosting more focused community meetups, workshops, or hacking sessions on Saturday for local attendees or those who choose to stay. Keep an eye on the schedule for updates."),
			    array("q" => "Will the MotoGP event impact my attendance or experience at DevConf.CZ 2026?", "a" => "Yes, primarily regarding accommodation. The MotoGP Czechia event (June 19 - 21) coincides with our conference dates. While the events are in different locations, you should anticipate significantly reduced hotel availability and increased pricing in the Brno area during the conference week."),
				array("q" => "How much higher should I expect accommodation prices to be?", "a" => "We strongly advise budgeting for higher costs. Prices are expected to be approximately 100% higher than normal rates for the area due to the large influx of MotoGP visitors. We recommend booking your accommodation as soon as possible."),
				array("q" => "When should I book my hotel room?", "a" => "We highly recommend booking your accommodation immediately upon confirming your attendance. While some hotels may open their booking windows later (expected in early Spring 2026), booking early is the only way to secure a room at a potentially better rate."),
				array("q" => "Is DevConf.CZ securing rooms for attendees?", "a" => "We are actively working to secure a limited number of room blocks in different hotels. However, we must prioritize these rooms for our accepted speakers over general attendees. We encourage all attendees to book their own lodging as soon as possible."),
				array("q" => "Why was the event scheduled during the MotoGP weekend?", "a" => "Due to the strict academic schedule and venue availability at the Faculty of Information Technology at Brno University of Technology, we were unable to select an alternative date. Our hands were tied regarding the timing of the conference."),
		)),	
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
